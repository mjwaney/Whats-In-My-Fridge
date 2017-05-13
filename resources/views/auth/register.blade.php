@extends('layouts.app')

@section('title','Register')

@section('left')
	&nbsp
@endsection

@section('p1')
<h1 class="center" style="padding-left:5vw;">Register</h1>
<form class="" style="display:flex;justify-content:center;" role="form" method="POST" action="">
	<table border="0">
	{{ csrf_field() }}

		<tr>
			<td>
				<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
					<label for="name" class="col-md-4 control-label">Username:</label>
				</div>
			</td>
			<td>
				<input id="name" type="text" class="registerInput" name="name" value="{{ old('name') }}" required autofocus> *
					@if ($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
					@endif				
			</td>
		</tr>

		<tr>
			<td>
				<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
					<label for="email" class="col-md-4 control-label"><span>Email Address:</span></label>
			</td>
			<td>
					<input id="email" type="email" class="registerInput" name="email" value="{{ old('email') }}" required> *
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
					<label for="password" class="col-md-4 control-label">Password:</label>
			</td>
			<td>
					<input id="password" type="password" class="registerInput" name="password" required> *
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
				<div class="form-group">
					<label for="password-confirm" class="col-md-4 control-label">Confirm Password:</label>
			</td>
			<td>
					<input id="password-confirm" type="password" class="registerInput" name="password_confirmation" required> *
				</div>
			</td>
		</tr>

		<tr>
			<td colspan="2"><hr /></td>
		</tr>

		<tr>
			<td>
				<div class="">
					<label for="full_name" class="">Full name:</label>
			</td>
			<td>
				<input id="" type="text" class="registerInput" name="full_name" placeholder="Not visible to others">
				</div>
			</td>
		</tr>

		<tr>
			<td>
				<div class="">
					<label for="taste" class="">Tell us something<br>about your taste:</label>
			</td>
			<td>
					<textarea cols="15" rows="5" class="registerInput" name="taste"></textarea>
				</div>
			</td>
		</tr>

		<tr>
			<td colspan="2"><hr /></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<button type="submit" class="registerSubmit">
					Register
				</button>
			</td>
		</tr>
	</table>
</form>
<p style="float:right;padding-top:10px;">Fields marked with * are required.</p>
@endsection

@section('right')
	&nbsp
@endsection
