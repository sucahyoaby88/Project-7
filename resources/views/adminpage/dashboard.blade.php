@extends('adminpage.main')

@section('title', 'Dashboard 
Admin')

@section('content')

    <div class="panel">
	    <div class="panel-heading">
                <h3 class="panel-title">Dashboard Admin</h3>
	</div>
	    <div class="panel-body">
            <div class="text-center">
                <h4>User Count</h4>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-user"></i></span>
					<p>
					    <span class="number">{{$user_count}}</span>
				        <span class="title">Total User</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-user"></i></span>
					<p>
					    <span class="number">{{$user_count1}}</span>
				        <span class="title">Admin</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-user"></i></span>
					<p>
					    <span class="number">{{$user_count2}}</span>
				        <span class="title">Member</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-user"></i></span>
					<p>
					    <span class="number">{{$user_count3}}</span>
				        <span class="title">Premium</span>
					</p>
				</div>
			</div>
			<div class="text-center">
                <h4>Content Count</h4>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-upload"></i></span>
					<p>
					    <span class="number">{{$content_count}}</span>
				        <span class="title">Total Content</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-video-camera"></i></span>
					<p>
					    <span class="number">{{$content_count1}}</span>
				        <span class="title">Video</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-camera"></i></span>
					<p>
					    <span class="number">{{$content_count2}}</span>
				        <span class="title">Photo</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-file-text"></i></span>
					<p>
					    <span class="number">{{$content_count3}}</span>
				        <span class="title">Story</span>
					</p>
				</div>
			</div>
			<div class="text-center">
                <h4>Inbox Count</h4>
			</div>
			<div class="col-md-3">
			</div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-inbox"></i></span>
					<p>
					    <span class="number">{{$premium_count}}</span>
				        <span class="title">Request</span>
					</p>
				</div>
            </div>
            <div class="col-md-3">
			    <div class="metric">
					<span class="icon"><i class="fa fa-envelope"></i></span>
					<p>
					    <span class="number">{{$message_count}}</span>
				        <span class="title">Message</span>
					</p>
				</div>
            </div>
	    </div>
    </div>
  
@endsection