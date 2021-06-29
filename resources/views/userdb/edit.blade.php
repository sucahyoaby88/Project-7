@extends('adminpage.main')

@section('title', 'Edit User')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Edit Data User</h3>
		<div class="right">
		<a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
		</div>
	</div>
	<div class="panel-body">
        <form action="{{ url('userdb/' . $user->id . '/update') }}" method="post">
            @csrf
            <div class="form-group">
				<input name="email" type="email"  class="form-control" placeholder="Email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
				<input name="phone" type="text"  class="form-control" placeholder="Phone" value="{{$user->phone}}" required>
            </div>
			<div class="form-group">
				<input name="username" type="text"  class="form-control" placeholder="Username" value="{{$user->username}}" required>
			</div>
			<div class="form-group">
				<input name="password" type="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
        </form>
    </div>
</div>

@endsection