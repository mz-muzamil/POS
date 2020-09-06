@extends('layouts.main')

@section('content')
<div class="container-fluid h-100">
	<div class="row justify-content-center align-items-center h-100">
		<div class="col col-sm-9 col-md-9 col-lg-9 col-xl-9 text-center">
			<div class="auth-box">
				<div class="card text-white">
					<div class="card-body auth-card-body">
						<div class="auth-logo">
							<a href="{{ route('login') }}">
							<img class="img-fluid" src="{{asset('assets/img/logo.png')}}">
							</a>
						</div>
						<p class="auth-box-msg">{{ __('Reset Password') }}</p>
						<div class="form-wrp">
							<form method="POST" action="{{ route('password.update') }}">
								@csrf
								<input type="hidden" name="token" value="{{ $token }}">
								<div class="form-group">
									<label>{{ __('Email Address') }}</label>
									<input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}">
									@error('email')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label>{{ __('Password') }}</label>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
									@error('password')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group row">
									<label>{{ __('Confirm Password') }}</label>
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">
									{{ __('Reset Password') }}
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
