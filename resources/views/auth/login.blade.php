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
						<p class="auth-box-msg">SignIn to your account</p>
						<div class="form-wrp">
							<form method="POST" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<label>User Email <span class="required">*</span></label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
									@error('email')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label for="password">{{ __('Password') }}</label>
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
									@error('password')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<label class="control control--checkbox">
										{{ __('Remember Me') }}
										<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
										<div class="control__indicator"></div>
									</label>
								</div>
								<div class="form-group">                        
									<button type="submit" class="btn btn-primary btn-block">
									{{ __('Login') }}
									</button>
								</div>
								@if (Route::has('password.request'))
								<div class="form-group mb-0 text-center">
									<a class="text-white" href="{{ route('password.request') }}">Forgot password?</a>
								</div>
								<div class="form-group text-center">
									<a class="text-white" href="{{ route('register') }}">Sign up for inventory management system</a>
								</div>
								@endif
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
