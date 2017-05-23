@extends('layouts.app')

@section('title','Login')

@section('p1')
<h1 class="center">Login</h1>
<form class="" style="display:flex;justify-content:center;" role="form" method="POST" action="">
<!-- {!! Form::open(array('route' => 'login', 'class' => 'form', 'method' => 'post')) !!} -->
	{{ csrf_field() }}
	<table border="0">


		<tr>
			<td>
				<input class="registerInput" id="email" type="email" name="email" value="{{ old('email') }}" placeholder="E-Mail Address" required autofocus>
			</td>
		</tr>
		<tr>
			<td>
				@if ($errors->has('email'))
					<span class="">
						<strong>{{ $errors->first('email') }}</strong>
					</span>
				@endif
			</td>
		</tr>

		<tr>
			<td>
				<input class="registerInput" id="password" type="password" name="password" placeholder="Password" required>
			</td>
		</tr>
		<tr>
			<td>
				@if ($errors->has('password'))
					<span class="">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</td>
		</tr>

		<tr>
			<td>
				<button type="submit" class="registerSubmit">
					Login
				</button>
			</td>
		</tr>

		<tr>
			<td>
				@if ($errors->has('password'))
					<span class="">
						<strong>{{ $errors->first('password') }}</strong>
					</span>
				@endif
			</td>
		</tr>

		<tr>
			<td>&nbsp</td>
		</tr>

		<tr>
			<td>
				<div style="display:flex;justify-content:center;" class="">
					<label>
						<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
					</label>
				</div>
			</td>
		</tr>

		<tr>
			<td>&nbsp</td>
		</tr>

		<tr>
			<td>
				<a style="display:flex;justify-content:center;" class="" href="{{ route('password.request') }}">
					Forgot Your Password?
				</a>
			</td>
		</tr>

		<tr>
			<td>
				<a style="display:flex;justify-content:center;" class="" href="/register">
					Don't have an account yet?
				</a>
			</td>
		</tr>
		
	</table>
</form>
@endsection


