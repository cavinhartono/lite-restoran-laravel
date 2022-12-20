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
        @can('view-user')
        <li class="list"><a href="/user" class="link">User</a></li>
        @endcan
        <li class="list active"><a href="/" class="link">Home</a></li>
        @can('view-role')
        <li class="list"><a href="/roles" class="link">Roles</a></li>
        @endcan
        <li class="list"><a href="/menu" class="link">Menu</a></li>
        <li class="list"><a href="/auth/logout" class="link">Logout</a></li>
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

    window.addEventListener('scroll', function() {
      return this.scrollY >= 50 ?
        document.querySelector('header').classList.add("scroller") :
        document.querySelector('header').classList.remove("scroller");
    });
  </script>
</body>

</html>