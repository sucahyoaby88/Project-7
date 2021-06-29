@extends('memberpage.main')

@section('title', 'Comment Database')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Data Comment</h3>
	</div>
	<div class="panel-body">
	@if (!empty($comment_list))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>ID Content</th>
					<th>Message</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody>
			@php $i=1 @endphp
			@foreach($comment_list as $comment)
				<tr>
				<th>{{ $i++ }}</th>
				<td>{{ !empty($comment->users->username) ?
						$comment->users->username : '-' }}</td>
				<td>{{ $comment->content_id }}</td>
				<td>{{ $comment->text }}</td>
				<td>{{  date("d F Y H:i", strtotime($comment->date_comment))  }}</td>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p>Tidak ada data comment.</p>
		@endif

		<div class="table-bottom">
			<div class="pull-left">
				<strong> Comment Count : {{ $comment_count }}</strong>
			</div>
			<div class="pull-right">
				{{ $comment_list->links() }}
			</div>
		</div>
</div>
@endsection