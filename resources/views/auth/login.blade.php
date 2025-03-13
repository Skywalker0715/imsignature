<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Im-signature</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
      background-color: #f8f9fa;
    }

    .left-half {
      position: absolute;
      left: 0;
      width: 50%;
      height: 100%;
      background-image: url('images/dg.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .right-half {
      position: absolute;
      right: 0;
      width: 50%;
      height: 100%;
      background-image: url('images/ls.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
    }

    .container {
      max-width: 450px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      animation: fadeIn 1.5s;
      z-index: 2;
    }

    .logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .logo img {
      max-width: 300px;
      width: 100%;
    }

    .form-container {
      padding: 20px;
    }

    .form-container h1 {
      color: #333;
      margin-bottom: 20px;
      text-align: center;
      font-size: 24px;
    }

    .form-group label {
      font-weight: bold;
      color: #333;
    }

    .btn-login {
      width: 100%;
      background-color: #1D3F7E;
      border-color: #1D3F7E;
      color: #fff;
      margin-top: 20px;
    }

    .btn-login:hover {
      background-color: #152B54;
      border-color: #152B54;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
  </style>
</head>
<body>
  <div class="left-half"></div>
  <div class="right-half"></div>
  <div class="container">
    <div class="logo">
      <img src="images/logo.png" alt="Logo">
    </div>
    <div class="form-container">
      <h1>Im-signature</h1>
      <p style="color: #555; text-align: center;">Welcome! Please login to continue.</p>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Login</button>
      </form>
    </div>
  </div>
</body>
</html>
