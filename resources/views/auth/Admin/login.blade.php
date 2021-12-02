<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login Admin</title>




    <!-- Bootstrap core CSS -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="">

<main class="form-signin">
  <form action="{{ route('admin.login') }}" method="POST">
      @csrf
    {{-- <img class="mb-4" src="" alt="" width="72" height="57"> --}}
    <h1 class="h3 mb-5 fw-normal">Login</h1>
    @if(Session::has('error'))
    {{ Session::get('error') }}
    @endif
    <div class="form-group">
      <label for="">Email address</label>
      <input type="email" name="email" class="form-control" id="" placeholder="name@example.com" >
      @error('email')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group">
      <label for="">Password</label>
      <input type="password" name="password" class="form-control" id="" placeholder="Password" >
      @error('password')
          <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; My Website</p>
  </form>
</main>



  </body>
</html>

