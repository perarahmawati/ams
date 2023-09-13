@extends('logins.layout')

@section('content')
    
<form action="{{ route('actionlogin') }}" method="post">

    @csrf

  <div id='visit'></div>
    <div class="input-group mb-3">
        {{-- <label>Email</label> --}}
        <input type="email" name="email" class="form-control" placeholder="Email" required="">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
    </div>

    <div class="input-group mb-3">
        {{-- <label>Password</label> --}}
        <input type="password" name="password" class="form-control" placeholder="Password" required="">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-8">
        <div class="icheck-primary">
          <input type="checkbox" id="remember" value="1">
          <label for="remember">
            Remember Me
          </label>
        </div>
      </div>
  
      <div class="col-4">
        <button type="submit" class="btn btn-primary btn-block">Log In</button>
      </div>

    </div>

  <p class="mb-1">
    <a href="{{ route('forget.password.get') }}">I forgot my password</a>
  </p>
  
@endsection