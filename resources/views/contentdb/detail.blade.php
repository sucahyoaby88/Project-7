@extends('adminpage.main')

@section('title', 'Detail Content')

@section('content')
<div class="panel">
	<div class="panel-heading">
		<h3 class="panel-title">Detail Content</h3>
		<div class="right">
		<a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
		</div>
	</div>
	<div class="panel-body">
	@if ($content->type == 'video')
	
		<div class="text-center">
			<iframe width="420" height="345" src="{{$content->getEmbed()}}" frameborder="0" allowfullscreen></iframe>
		</div>

	@elseif ($content->type == 'photo')

		<div class="text-center">
			<img src="{{$content->getImage()}}" height="345px" width="420px">
		</div>
	
	@else

	<div class="text-center">
			<img src="{{asset('img/story.jpg')}}" height="345px" width="420px">
		</div>

	@endif

	<div class="col-md-6">
		<h3><b>Type</b></h3>
		{{$content->type}}

		<h3><b>Title</b></h3>
		{{$content->title}}

		<h3><b>Description</b></h3>
		{{$content->description}}

	</div>

	<div class="col-md-6">
		<h3><b>Category Content</b></h3>
		{{$content->category}}
	
		<h3><b>Created at</b></h3>
		{{$content->date_content}}

		<h3><b>Posted by</b></h3>
		{{ !empty($content->users->username) ?
			$content->users->username : '-' }}

	</div>


    </div>

</div>

@endsection