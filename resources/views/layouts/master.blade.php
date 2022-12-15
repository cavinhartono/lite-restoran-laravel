<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/master.css') }}">
  @stack('style')
  <title>@stack('title') | Inagri</title>
</head>

<body>
  <section class="container">
    <header class="header">
      <div class="header_logo">
        <span class="icon"></span>
        <a href="#" class="link">Ingri</a>
      </div>
      <ul class="nav">
        <li class="list"><a href="/user" class="link">User</a></li>
        <li class="list active"><a href="/" class="link">Home</a></li>
        <li class="list"><a href="/roles" class="link">Roles</a></li>
        <li class="list"><a href="/menu" class="link">Menu</a></li>
        <li class="list"><a href="/auth/logout" class="link">Logout</a></li>
        <!-- <div class="profile">
          <li class="list">
            <span class="photo"></span>
          </li>
        </div> -->
      </ul>
    </header>
    @yield('content')
  </section>
  <script>
    var list = document.querySelectorAll('.header .nav .list');

    function getList() {
      list.forEach((item) => item.classList.remove('active'));
      this.classList.add('active');
    }

    list.forEach((item) => item.addEventListener('click', getList));
  </script>
</body>

</html>