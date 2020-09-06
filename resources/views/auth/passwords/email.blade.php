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
							@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
							@endif
							<form method="POST" action="{{ route('password.email') }}">
								@csrf
								<div class="form-group">
									<label>{{ __('Email Address') }}</label>
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
									@error('email')
									<span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
									@enderror
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">
									{{ __('Send Password Reset Link') }}
									</button>
                                </div>
                                <div class="form-group text-center">
									Back to: <a class="text-white" href="{{ route('login') }}">Login</a>
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
