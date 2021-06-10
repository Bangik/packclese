@extends('layouts.app')

@section('content')
<div class="card card-primary">
  <div class="card-header"><h4>Login</h4></div>

  <div class="card-body">
    <form method="POST" action="{{ route('login') }}" class="needs-validation">
      @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group">
        <div class="d-block">
        	<label for="password" class="control-label">Password</label>
          <div class="float-right">
            <a href="{{ route('password.request') }}" class="text-small">
              Forgot Password?
            </a>
          </div>
        </div>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>

      <div class="form-group">
        <div class="custom-control custom-checkbox small">
          <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

          <label class="custom-control-label" for="remember">
              {{ __('Remember Me') }}
          </label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
          Login
        </button>
      </div>
    </form>
  </div>
</div>
<div class="mt-5 text-muted text-center">
  Don't have an account? <a href="{{route('register')}}">Create One</a>
</div>
<div class="simple-footer">
  Copyright &copy; Packclese 2021
</div>
@endsection
