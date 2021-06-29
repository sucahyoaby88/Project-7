@extends('memberpage.main')

@section('title', 'Upload Video Content')

@section('content')
	<div class="panel-heading">
		<h3 class="panel-title">Upload Video</h3>
		<div class="right">
		<a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
		</div>
	</div>
	<div class="panel-body">
        <form action="{{ url('upload_video/upload1') }}" method="post">
            @csrf
            @if(Session('level') == 'premium')
            <div class="form-group"> 
                <label for="title" class="controllabel">Category Content</label> <br/>
                <select name="category" style="width:20%; height:40px;">
                    <option value="regular">regular</option>
                    <option value="premium">premium</option>
                </select>
            </div>
            @endif
            <div class="form-group"> 
                <label for="title" class="controllabel">Title</label> 
                <input name="title" type="text" class="form-control"> 
            </div>
            <div class="form-group"> 
                <label for="description" class="controllabel">Description</label> <br/>
                <textarea rows="4" cols="130" name="description"></textarea>
            </div>
            <div class="form-group"> 
                <label for="description" class="controllabel">Summary</label> <br/>
                <textarea rows="2" cols="130" name="summary"></textarea>
            </div>
			<div class="form-group"> 
                <label for="source" class="controllabel">Link Youtube</label> 
                <input name="source" type="url" class="form-control"> 
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">UPLOAD</button>
            </div>
        </form>
    </div>

@endsection