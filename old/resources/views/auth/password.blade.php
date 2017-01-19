@extends('auth') @section('title')
<title>cardSORTER | Reset Password</title>
@endsection @section('authcontent')
<div class="login-box">
	<div class="greenback titletext ">Reset Password</div>
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
		<form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Send Password Reset Link
								</button>
							</div>
						</div>
					</form>
		<div>
			<hr />
		</div>
		<div> </div>

	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection

 