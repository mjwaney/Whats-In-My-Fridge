@extends('layouts.app')

@section('title','Profile')

@section('left')
	&nbsp;
@endsection

@section('p1')
	<h1 class="center">Profile</h1>
	<table border="0" style="padding-left: 50px;">
		<tr>
			<td>Username:</td>
			<td>{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}</td>
		</tr>
		<tr>
			<td>Email:</td>
			<td>{{ isset(Auth::user()->name) ? Auth::user()->email : Auth::user()->email }}</td>
		</tr>
		<tr>
			<td>Member since:&nbsp;</td>
			<td>{{ isset(Auth::user()->name) ? Auth::user()->created_at : Auth::user()->email }}</td>
		</tr>
	</table>
	<?php
	$user = Auth::user();
	echo '<pre>';
	print_r($user);
	echo '</pre>';
	// echo $user[0];
	?>
@endsection

@section('right')
	&nbsp;
@endsection