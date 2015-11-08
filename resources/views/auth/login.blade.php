@extends('auth') 

@section('title')
<title>cardSORTER | Log in</title>
@endsection

@section('authcontent')
<div class="login-box">
	<div class="greenback titletext ">
		Login.
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br>
			<br>
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li> @endforeach
			</ul>
		</div>
		@endif
		<form action="" method="POST" name="loginform" role="form"  action="{{ url('/auth/login') }}">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group has-feedback">
				<input name="email" type="email" class="form-control"
					placeholder="email address"> <span
					class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input name="password" type="password" class="form-control"
					placeholder="Password"> <span
					class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="row">
				<div class="col-xs-8">
					<div class="checkbox icheck">
						<label> <input type="checkbox"> Remember Me
						</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-xs-4">
					<button type="submit"
						class="btn btn-primary btn-success btn-block btn-flat">Sign In</button>
				</div>
				<!-- /.col -->
			</div>
		</form>



		<a href="{{ url('/password/email') }}">I forgot my password</a><br> 
		<a href="{{ url('/auth/register') }}"
			class="text-center">Register a new membership</a>
		<div>
			<hr />
		</div>
		<div>Test credentials : demo@gmail.com , demodemo</div>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
