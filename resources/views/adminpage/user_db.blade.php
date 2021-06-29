@extends('adminpage.main')

@section('title', 'User Database')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Database User</h3>
		<div class="right">
		<a class="btn btn-primary"  href="userdb/add_admin/">Add Admin</a>
		</div>
	</div>
	<div class="panel-body">
	@if (!empty($user_list))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Level</th>
					<th>Username</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@php $i=1 @endphp
			@foreach($user_list as $user)
				<tr>
				<th>{{ $i++ }}</th>
				<td>{{ $user->email }}</td>
				<td>{{ $user->phone }}</td>
				<td>{{ $user->level }}</td>
				<td>{{ $user->username }}</td>
				<td><a class="btn btn-success"  href="{{ url('userdb/' . $user->id . '/edit') }}">Edit</a>
					<a class="btn btn-danger" href="{{ url('userdb/' . $user->id . '/delete') }}">Delete</a>
					@if($user->level == 'premium')
						<a class="btn btn-warning"  href="{{ url('userdb/' . $user->id . '/downgrade') }}">Downgrade</a>
					@endif
					
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p>Tidak ada data user.</p>
		@endif

		<div class="table-bottom">
			<div class="pull-left">
				<strong> User Count : {{ $user_count }}</strong>
			</div>
			<div class="pull-right">
				{{ $user_list->links() }}
			</div>
		</div>
</div>
@endsection