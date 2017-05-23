@extends('layouts.app')

@section('title','Reset password')

@section('p1')
	<div class="panel-heading"><h1 class="center" style="padding-left: 5vw;">Reset Password</h1></div>

	<div class="panel-body">
		@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
		@endif

		<form class="form-horizontal" style="display:flex;justify-content:center;" role="form" method="POST" action="{{ route('password.request') }}">
			{{ csrf_field() }}

			<input type="hidden" name="token" value="{{ $token }}">

			<table border="0">

			<tr>
				<td>
					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<label for="email" class="col-md-4 control-label">Email Address</label>
				</td>
				<td>
					<input id="email" type="email" class="registerInput" name="email" value="{{ $email or old('email') }}" required autofocus>
				</td>
			</tr>

			<tr>
				<td>
					@if ($errors->has('email'))
						<span class="help-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					</div>
				</td>
			</tr>

			<tr>
				<td>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Password</label>
				</td>
				<td>
					<input id="password" type="password" class="registerInput" name="password" required>
				</td>

				<tr>
					<td colspan="2">
						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
						</div>
					</td>
				</tr>

				<tr>
					<td>
						<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
							<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
					</td>
					<td>
						<input id="password-confirm" type="password" class="registerInput" name="password_confirmation" required>
					</td>
				</tr>

				<tr>
					<td colspan="2">
						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
						</div>
					</td>
				</tr>

				<tr>
					<td></td>
					<td>
						<button type="submit" class="registerSubmit">
							Reset Password
						</button>
					</td>
				</tr>

			</table>
		</form>
	</div>
@endsection
