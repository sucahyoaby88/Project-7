@extends('adminpage.main')

@section('title', 'Message Database')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Database Message</h3>
	</div>
	<div class="panel-body">
	@if (!empty($message_list))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Text</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@php $i=1 @endphp
			@foreach($message_list as $message)
				<tr>
				<th>{{ $i++ }}</th>
				<td>{{ !empty($message->users->username) ?
						$message->users->username : '-' }}</td>
				<td>{{ $message->text }}</td>
				<td>{{ date("d F Y", strtotime($message->date_message)) }}</td>
				<td><a class="btn btn-danger" href="{{ url('messagedb/' . $message->id . '/delete') }}">Delete</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p>Tidak ada data message.</p>
		@endif

		<div class="table-bottom">
			<div class="pull-left">
				<strong> Message Count : {{ $message_count }}</strong>
			</div>
			<div class="pull-right">
				{{ $message_list->links() }}
			</div>
		</div>
 </div>
@endsection