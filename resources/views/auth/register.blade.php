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
						<p class="auth-box-msg">Sign Up for New Account</p>
						<div class="form-wrp">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback text-left" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
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
                                <div class="form-group">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="form-group text-center">
									If already have an acount so please: <a class="text-white" href="{{ route('login') }}">Login</a>
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
