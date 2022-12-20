<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/auth.css')}}" />
  <title>Akun | Inagri</title>
</head>

<body>
  <div class="container">
    <div class="blueBg">
      <div class="box signin">
        <h2>Sudah Mempunyai Akun</h2>
        <button class="signinBtn" style="font-size: 12px;">Login</button>
      </div>
      <div class="box signup">
        <h2>Tidak Mempunyai Akun</h2>
        <button class="signupBtn" style="font-size: 12px;">Register</button>
      </div>
    </div>
    <div class="formBx">
      <div class="form signinForm">
        <form action="/auth/login" method="POST">
          @csrf
          <h3>Masuk Akun</h3>
          <div class="field">
            <div class="input">
              <label for="email">Email<sup>*</sup></label>
              <input type="text" placeholder="johndoe@gmail.com" name="email" id="email" value="{{ Session::get('email') }}" required>
            </div>
          </div>
          <div class="field">
            <div class="input">
              <label for="password">Password<sup>*</sup></label>
              <input type="password" placeholder="Enter your password" name="password" id="password" value="{{ Session::get('password') }}" required>
            </div>
          </div>
          <div class="field">
            <div class="input">
              <input type="submit" value="Masuk" name="submit">
            </div>
          </div>
          <a href="#" class="forget">Lupa Password</a>
        </form>
      </div>
      <div class="form signup">
        <form action="/auth/register" method="POST">
          @csrf
          <h3>Daftar Akun</h3>
          <div class="field">
            <div class="input">
              <label for="name">Nama<sup>*</sup></label>
              <input type="text" id="name" placeholder="John Doe" name="name" required>
            </div>
          </div>
          <div class="field">
            <div class="input">
              <label for="email">Email<sup>*</sup></label>
              <input type="text" id="email" placeholder="johndoe@gmail.com" name="email" required>
            </div>
          </div>
          <div class="field">
            <div class="input">
              <label for="password">Password<sup>*</sup></label>
              <input type="password" id="password" placeholder="Enter your password" name="password" required>
            </div>
          </div>
          <div class="field">
            <div class="input">
              <input type="submit" value="Buat" name="submit">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const signinBtn = document.querySelector('.signinBtn');
    const signupBtn = document.querySelector('.signupBtn');
    const body = document.querySelector('body');
    const formBx = document.querySelector('.formBx');

    signupBtn.onclick = function() {
      body.classList.add('aktif');
      formBx.classList.add('aktif');
    }

    signinBtn.onclick = function() {
      body.classList.remove('aktif');
      formBx.classList.remove('aktif');
    }
  </script>
</body>

</html>