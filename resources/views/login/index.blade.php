@extends('layouts.main')

@section('container')
<main class="form-signin w-100 m-auto">

  @if(session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif

  @if(session()->has('gagalLogin'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('gagalLogin') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      </button>
    </div>
    @endif

  <div class="container bg-light rounded shadow">

    <form action="/login" method="post">
      @csrf
      <div class="text-center">
          <img class="mb-3 mt-4" src="images/logo.png" alt="" width="100">
      </div>

      <!-- Username Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control" type="text" name="username" id="username" placeholder="Username" autofocus required>
        </div>
      </div>
      <!-- Username End -->

      <!-- Password Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
        </div>
      </div>
      <!-- Password End -->

      <!-- Remember me Start -->
      <div class="container-fluid mb-3">
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember me</label>
      </div>
      <!-- Remember me End -->

      <input class="w-100 mb-3 btn" style="background-color: #ff6000; color: white" type="submit" value="Login" name="login"></input>

      <p class="text-center pb-3 border-bottom">Not registered? <a href="/register" style="color: #ff6000" class="beranda b">Register Now!</a></p>
      <p class="text-center pb-4">Back to <a href="/" style="color: #ff6000" class="beranda b">Home</a> </p>
    </form>
  </div>
</main>

@endsection