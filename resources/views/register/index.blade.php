@extends('layouts.main')

@section('container')
<main class="form-signin w-100 m-auto">
  <div class="container bg-light rounded shadow">
    <form action="/register" method="post">
      @csrf
      <div class="text-center">
        <img class="mb-3 mt-4" src="images/logo.png" alt="" width="100">
      </div>

      <!-- Name Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control @error('name')is-invalid @enderror" type="text" name="name" id="name" placeholder="Name" required value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <!-- Name End -->

      <!-- Username Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control @error('username')is-invalid @enderror" type="text" name="username" id="username" placeholder="Username" required value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <!-- Username End -->

      <!-- Email Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control @error('email')is-invalid @enderror" type="email" name="email" id="email" placeholder="Email" required value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <!-- Email End -->

      <!-- Password Start -->
      <div class="col-16 mb-3">
        <div class="input-group">
          <input class="form-control @error('password')is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
        </div>
      </div>
      <!-- Password End -->

      <input class="w-100 mb-3 btn" style="background-color: #ff6000; color: white" type="submit" value="Register" name="register"></input>

      <p class="text-center pb-3 border-bottom">Already registered? <a href="/login" style="color: #ff6000" class="beranda b">Login</a></p>
      <p class="text-center pb-4">Back to <a href="/" style="color: #ff6000" class="beranda b">Home</a> </p>


    </form>
  </div>
</main>

@endsection