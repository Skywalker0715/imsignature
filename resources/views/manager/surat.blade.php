@if ($surat)
<div style="width: 21cm; padding: 2cm; background-color: white; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); position: relative; margin: 0 auto; display: flex; flex-direction: column; align-items: stretch; overflow: hidden;">
    <div style="text-align: left; margin-bottom: 1cm;">
        <img src="{{ $logoPath }}" alt="Logo" style="max-width: 60%; height: auto;">
    </div>
    <div style="text-align: left; margin-bottom: 0.5cm;">
        <h4 style="margin: 0;">MEMO INTERNAL</h4>
    </div>
    <hr style="border: 2px solid #000000; width: 100%; margin-left: 0; margin-bottom: 1cm;">
    <table style="line-height: 1.5; margin-bottom: 1cm; width: 100%;">
        <tr>
            <td style="padding-right: 10px;">No</td>
            <td>: {{ $surat->nomor_surat }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Tanggal</td>
            <td>: {{ $surat->tanggal_kirim }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Kepada</td>
            <td>: {{ $surat->kepada }}</td>
        </tr>
        <tr>
            <td style="padding-right: 10px;">Perihal</td>
            <td>: {{ $surat->perihal }}</td>
        </tr>
    </table>
    <hr style="border: 2px solid #000000; width: 100%; margin-left: 0; margin-bottom: 1cm;">
    <div style="line-height: 1.5;">
        <p style="margin: 0;">Dengan hormat;</p>
        <br>
        <div style="line-height: 1.5; text-align: justify;">
            {!! nl2br(html_entity_decode(strip_tags($surat->isi_surat))) !!}
        </div>
        <br>
        <p style="margin: 0;">Demikianlah surat permohonan ini kami buat, atas perhatiannya kami ucapkan terimakasih.</p>
    </div>
    <table style="margin-top: 2cm; width: 100%;"> 
        <tr>
            <td style="text-align: left; width: 50%;">
                <p>Diajukan oleh,</p>
                <div style="height: 90px;">&nbsp;</div>
                <p>Admin</p>
            </td>
            <td style="text-align: left; width: 50%;">
                <p>Diketahui,</p>
                <div style="height: 40px;">&nbsp;</div>
                @if ($ttdManagerPath)
                    <img src="{{ $ttdManagerPath }}" alt="Tanda Tangan Manager" style="max-width: 100px; height: auto;">
                @endif
                <p>Manager</p>
            </td>            
        </tr>
    </table>
</div>
@else
<p>Tidak ada surat yang tersedia.</p>
@endif
