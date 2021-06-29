@extends('adminpage.main')

@section('title', 'Profile')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Profile</h3>
		<div class="right">
		<a class="btn btn-primary" href="{{ url('profile/edit') }}">Edit Profile</a>
		</div>
	</div>
	<div class="panel-body">
	
		<div class="text-center">
			<img src="{{asset('photo/user.png')}}" height="100px" width="100px">
		</div>


	<div class="col-md-6">
		<h3><b>Username</b></h3>
		{{$user->username}}

		<h3><b>Email</b></h3>
		{{$user->email}}

	</div>

	<div class="col-md-6">
		<h3><b>level</b></h3>
		{{$user->level}}

		<h3><b>Phone Number</b></h3>
		{{$user->phone}}

	</div>


    </div>

	</div>

@endsection