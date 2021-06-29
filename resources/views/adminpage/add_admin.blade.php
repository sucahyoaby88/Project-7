@extends('adminpage.main')

@section('title', 'Add Admin')

@section('content')
<div class="panel">
<div class="panel-heading">
		<h3 class="panel-title">Add Admin</h3>
		<div class="right">
		<a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
		</div>
	</div>
	<div class="panel-body">
        <form action="{{ url('userdb/add_admin/add') }}" method="post">
            @csrf
            <div class="form-group"> 
                <label for="email" class="controllabel">Email</label> 
                <input name="email" type="email" class="form-control"> 
            </div>
			<div class="form-group"> 
                <label for="phone" class="controllabel">Phone Number</label> 
                <input name="phone" type="text" class="form-control"> 
            </div>
			<div class="form-group"> 
                <label for="username" class="controllabel">Username</label> 
                <input name="username" type="text" class="form-control"> 
            </div>
			<div class="form-group"> 
                <label for="password" class="controllabel">Password</label> 
                <input name="password" type="password" class="form-control"> 
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">ADD</button>
            </div>
        </form>
    </div>
</div>

@endsection