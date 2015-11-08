@extends('auth') @section('title')
<title>cardSORTER | Register</title>
@endsection @section('authcontent')
<div class="login-box">
	<div class="greenback titletext ">Register</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
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
		<form class="form-horizontal" role="form" method="POST"
			action="{{ url('/auth/register') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group">
				<label class="col-md-4 control-label">Name</label>
				<div class="col-md-6">
					<input type="text" class="form-control" name="name"
						value="{{ old('name') }}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">E-Mail Address</label>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email"
						value="{{ old('email') }}">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control" name="password">
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-4 control-label">Confirm Password</label>
				<div class="col-md-6">
					<input type="password" class="form-control"
						name="password_confirmation">
				</div>
			</div>

			<div class="form-group">
				<div class="col-md-6 col-md-offset-4">
					<button type="submit"
						class="btn btn-primary btn-success btn-block btn-flat">Register</button>
				</div>
			</div>
		</form>




		<div>
			<hr />
		</div>
		<div>Welcome to the family!</div>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
