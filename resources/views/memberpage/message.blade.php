@extends('memberpage.main')

@section('title', 'Send Message')

@section('content')
<div class="col-md-3">
</div>
<div class="col-md-6">
<div class="panel">
<div class="panel-heading">
		<h3 class="panel-title">Send Message</h3>	
	</div>
	<div class="panel-body">
        <form action="{{ url('message/store') }}" method="post">
            @csrf
            <div class="form-group"> 
                <label for="text" class="controllabel">Text</label> 
                <input name="text" type="text" class="form-control"> 
            <div class="text-center"><br/>
                <button type="submit" class="btn btn-primary">SEND</button>
            </div>
        </form>
    </div>
</div>
</div>

@endsection