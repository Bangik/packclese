@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header"> <h4>Register</h4> </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="phonenumber">{{ __('Phone Number') }}</label>
            <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}" required autocomplete="phonenumber" autofocus>
            @error('phonenumber')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

          <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                {{ __('Register') }}
            </button>
          </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
  Have an account? <a href="{{route('login')}}">Login Here</a>
</div>
<div class="simple-footer">
  Copyright &copy; Packclese 2021
</div>
@endsection
