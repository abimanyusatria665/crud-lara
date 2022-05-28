@extends('layouts.main')

@section('content')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('loginError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<main class="form-signin w-100 m-auto mt-5 card">
    <form action="/login" method="post">
        @csrf
      <h1 class=" mb-3 fw-normal"> Login</h1>
  
      <div class="form-floating my-3">
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error('email')
         <div class="invalid-feedback">
            {{ $message }}
         </div>
         @enderror
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword">Password</label>
      </div>
  
      <div class="checkbox mb-3">
        <label>
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Login</button>
    </form>
    <small class="mt-3">
        Belum registrasi ? <a href="/register">Registrasi sekarang</a>
    </small>
  </main>
@endsection