<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\User;
use App\Http\Requests\StoreSuratRequest;
use App\Http\Requests\UpdateSuratRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Carbon\Carbon;
use App\Mail\SuratNotifikasi;
use App\Mail\SuratMasukNotification;
use Illuminate\Support\Facades\Mail;


class SuratController extends Controller {
    public function buatSurat(Surat $surat = null)
    {
       $surats = Surat::all(); 
        return view('admin.buatSurat', compact('surat', 'surats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_kirim' => 'required',
            'kepada' => 'required',
            'perihal' => 'required',
            'isi_surat' => 'required',
        ]);
           $surat = new Surat();
           $surat->nomor_surat = $request->input('nomor_surat');
           $surat->tanggal_kirim = $request->input('tanggal_kirim');
           $surat->kepada = $request->input('kepada');
           $surat->perihal = $request->input('perihal');
           $surat->users_id = Auth::id();  
           $surat->isi_surat = $request->input('isi_surat');
           $surat->status = 0; // Status default
           $surat->save();
   
           return redirect()->route('buatSurat')->with('success', 'Surat berhasil dibuat');
       
    }
    
       public function viewSurat()
   {
      // Ambil surat berdasarkan statusnya yang masih 0
       $surats = Surat::where('status', 0)->get();
       return view('admin.view', compact('surats'));
   }


    public function pratinjauSurat()
    {
        $surats = Surat::where('status', 0)->get();


        return view('admin.pratinjauSurat', compact('surats'));
        }

 
     public function kirimSurat($suratId) {
       // Logika untuk mengubah status surat menjadi 'Dikirim' (1)
       $surat = Surat::find($suratId);
       $surat->status = 1; // Ubah status menjadi 'Dikirim'
       $surat->save();

       return redirect()->route('pratinjauSurat')->with('success', 'Surat berhasil dikirim.');
    }

      public function setujuiSurat($suratId) {
       // Logika untuk mengubah status surat menjadi 'Diterima' (2)
       $surat = Surat::find($suratId);
       $surat->status = 2; // Ubah status menjadi 'Diterima'
       $surat->save();

        // Path gambar logo
       $logoPath = public_path('images/logo.png'); // Sesuaikan dengan path gambar logo Anda

       //$ttdManagerPath = public_path('images/ttd.jpg'); 

        // Ambil path gambar tanda tangan Manager dari database
        $manager = User::where('role', 'manager')->first();
        $ttdManagerPath = $manager->ttd_digital;

       // Membuat PDF dari view surat
       $pdf = Pdf::loadView('manager.surat', compact('surat', 'logoPath', 'ttdManagerPath')); // Kirim path gambar logo dan tanda tangan Manager ke view
       $pdf->download('surat.pdf');

       // Dapatkan tanggal dan waktu saat ini
       $now = Carbon::now()->format('Y-m-d_H-i-s');

       // Nama file PDF dengan tanggal dan waktu
       $pdfFileName = 'surat_' .     $now . '.pdf';
       $filePath = 'storage/generate/' .     $pdfFileName;

       // Simpan file PDF di storage
       $content =     $pdf->download()->getOriginalContent();
       Storage::put('public/generate/' .     $pdfFileName,     $content);

        // Update kolom "generate_surat" pada tabel "surat" dengan path file
       $surat->generate_surat = $filePath;
       $surat->save();

       Mail::to('skywalker123saputra@gmail.com')->send(new SuratMasukNotification($surat));

       return redirect()->route('tinjauSurat')->with('success', 'Surat berhasil disetujui.');
         
    }

      public function tolakSurat($suratId) {
       // Logika untuk mengubah status surat menjadi 'Ditolak' (3)
       $surat = Surat::find($suratId);
       $surat->status = 3; // Ubah status menjadi 'Ditolak'
    
        $surat->save();

       Mail::to('skywalker123saputra@gmail.com')->send(new SuratMasukNotification($surat));

       return redirect()->route('tinjauSurat')->with('success', 'Surat berhasil ditolak.');
   }

    public function riwayat(){

       $riwayat= Surat::whereIn('status', [0, 1, 2, 3, 4])->whereNotNull('status')->get();

       return view('admin.riwayat', compact('riwayat'));
    }

    public function suratMasuk() {
      //Mengambil data surat berdasarkan status dari database
      $suratMasuk = Surat::whereIn('status', [2, 3])->whereNotNull('status')->get();

      //Mengirim data surat ke view 'admin.suratMasuk' untuk ditampilkan
      return $view = view('admin.suratMasuk', compact('suratMasuk'));

    }


    public function lihatHasilSurat($suratId, $status) {
       $surat = Surat::findOrFail($suratId);

   if ($surat->generate_surat) {
       $filePath = public_path($surat->generate_surat);

       if ($status == 'diterima') {
           return response()->file($filePath);
       } elseif ($status == 'ditolak') {
           return view('admin.suratTolak', compact('surat'));
       }
   } else {
       return redirect()->back()->with('error', 'Surat belum disetujui atau belum di-generate.');
   }
   }

   public function kirimSuratNotifikasi($suratId) {
       try {
           $surat = Surat::find($suratId);
           $surat->status = 1; // Ubah status menjadi 'Dikirim'
           $surat->save(); // Simpan perubahan ke database
   
           // Mengambil data surat yang diperlukan
           $data = [
               'nomor_surat' => $surat->nomor_surat,
               'tanggal_kirim' => $surat->tanggal_kirim,
               'kepada' => $surat->kepada,
               'perihal' => $surat->perihal,
               'isi_surat' => $surat->isi_surat,
               'link_aplikasi' => config('app.url') // URL untuk halaman login aplikasi Anda
           ];
   
           // Mengirim email hanya jika penyimpanan surat berhasil
           Mail::to('skywalker123saputra@gmail.com')->send(new SuratNotifikasi($data));
   
           // Mengembalikan respons atau redirect jika diperlukan
           return redirect()->route('buatSurat')->with('success', 'Surat berhasil dikirim dan notifikasi telah terkirim ke manager.');
       } catch (\Exception $e) {
           // Tangani jika terjadi kesalahan saat menyimpan surat
           return redirect()->back()->with('error', 'Gagal mengirim surat dan notifikasi. Error: ' . $e->getMessage());
       }
   }

    public function tinjauSurat()
   {
       $surat = Surat::where('status', 1)->get(); // Ambil hanya surat yang  dikirim
       return view('manager.tinjau', compact('surat'));
   }

   public function prosesTinjau($id) {
       // Lakukan logika tinjau surat di sini, misalnya dengan mengambil data surat berdasarkan ID
       $surat = Surat::findOrFail($id);
   
       // Kemudian, Anda dapat melakukan proses apa pun yang diperlukan, seperti menandai surat telah dilihat atau menampilkan detail surat
       return view('manager.prosesTinjau', compact('surat'));
   }
   
   public function lihatSurat($id) {
       $surat = Surat::findOrFail($id);

       return view('manager.prosesTinjau', compact('surat'));
   }


    public function history(){
      // Mengambil data surat berdasarkan status 'Diterima' (2) dan 'Ditolak' (3)
      $riwayatSurat = Surat::whereIn('status', [2, 3])->get();

      return view('manager.history', compact('riwayatSurat'));
   }
   
   public function update(UpdateSuratRequest $request, Surat $surat)
   {
       //tempat  untuk kirim 1= dikirim, 2 diterima, 3=ditolak 0=baru masuk
   }

   
   public function destroy($suratId)
{
   $surat = Surat::findOrFail($suratId);
   if (!empty($surat->file_surat)) {
       Storage::delete($surat->file_surat);
   }
   $surat->delete();

   // Ambil nilai redirect_to dari request
   $redirectTo = request()->input('redirect_to', route('buatSurat'));

   // Redirect ke halaman yang sesuai dengan pesan sukses
   return redirect($redirectTo)->with('success', 'Surat berhasil dihapus');
}

}