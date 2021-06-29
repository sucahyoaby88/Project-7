@extends('memberpage.main')

@section('title', 'Content Database')

@section('content')
	<div class="panel-heading">
		<h3 class="panel-title">Data Content</h3>
	</div>
	<div class="panel-body">
	@if (!empty($content_list))
		<table class="table table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Type</th>
					<th>Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@php $i=1 @endphp
			@foreach($content_list as $content)
				<tr>
				<th>{{ $i++ }}</th>
				<td>{{ $content->email }}</td>
				<td>{{ $content->type }}</td>
				<td>{{ $content->date_content }}</td>
				<td><a class="btn btn-info"  href="{{ url('content/' . $content->id) }}">Detail</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
			<p>Tidak ada data content.</p>
		@endif

		<div class="table-bottom">
			<div class="pull-left">
				<strong> Content Count : {{ $content_count }}</strong>
			</div>
			<div class="pull-right">
				{{ $content_list->links() }}
			</div>
		</div>

@endsection