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

		<form class="form-horizontal" style="display:flex;justify-content:center;" role="form" method="POST" action="{{ route('password.email') }}">
			{{ csrf_field() }}

			<table border="0">

				<tr>
					<td>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">Email Address</label>
					</td>
					<td>
						<input id="email" type="email" class="registerInput" name="email" value="{{ old('email') }}" required autofocus> *
					</td>
				</tr>

				<tr>
					<td colspan="2">
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
						</div>
					</td>
				</tr>

				<tr>
					<td colspan="2"><hr /></td>
				</tr>

				<tr>
					<td></td>
					<td>
						<button type="submit" class="registerSubmit" style="margin-left: 30px;">
							Send Password Reset Link
						</button>
					</td>
				</tr>

			</table>
		</form>
	</div>
@endsection
