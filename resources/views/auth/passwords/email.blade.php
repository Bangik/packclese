@extends('layouts.auth.app')

@section('content')
<div class="card card-primary">
    <div class="card-header"> <h4>{{ __('Reset Password') }}</h4> </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <p class="text-muted">We will send a link to reset your password</p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
              <label for="email">{{ __('E-Mail Address') }}</label>

              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block">
                  {{ __('Send Password Reset Link') }}
              </button>
            </div>
        </form>
    </div>
</div>
@endsection
