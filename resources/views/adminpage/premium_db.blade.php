@extends('adminpage.main')

@section('title', 'Request Premium Database')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Database Request Premium</h3>
	</div>
	<div class="panel-body">
	@if (!empty($premium_list))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Message</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@php $i=1 @endphp
			@foreach($premium_list as $premium)
				<tr>
				<th>{{ $i++ }}</th>
				<td>{{ !empty($premium->users->username) ?
						$premium->users->username : '-' }}</td>
				<td>{{ $premium->message }}</td>
				<td><a class="btn btn-success"  href="{{ url('premiumdb/' . $premium->user_id . '/accept') }}">Accept</a>
					<a class="btn btn-danger" href="{{ url('premiumdb/' . $premium->user_id . '/refuse') }}">Refuse</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p>Tidak ada data request premium.</p>
		@endif

		<div class="table-bottom">
			<div class="pull-left">
				<strong> Request Count : {{ $premium_count }}</strong>
			</div>
			<div class="pull-right">
				{{ $premium_list->links() }}
			</div>
		</div>
</div>
@endsection