@extends('pinkbike.main')

@section('content')

<!-- SECTION -->
<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">

						<!-- breadcrumb -->
						<ul class="article-breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">News</a></li>
							<li>{{$content->title}}</li>
						</ul>
						<!-- /breadcrumb -->
					
						<!-- ARTICLE POST -->
						<article class="article article-post">
							<div class="article-main-img">
								@if ($content->type == 'video')

							<div class="article-img">
								<iframe width="100%" height="450" src="{{$content->getEmbed()}}" frameborder="0" allowfullscreen></iframe>
							</div>

						@elseif ($content->type == 'photo')

						<div class="article-img">
								<a href="#">
									<img src="{{$content->getImage()}}" alt="">
								</a>
							</div>

						@else

						<div class="article-img">
								<a href="#">
									<img src="./img/story.jpg" alt="">
								</a>
							</div>

						@endif
							</div>
							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a href="#">{{$content->type}}</a></li>
									@if ($content->type == 'video')

									<li class="article-type"><i class="fa fa-video-camera"></i></li>

									@elseif ($content->type == 'photo')

									<li class="article-type"><i class="fa fa-camera"></i></li>

									@else

									<li class="article-type"><i class="fa fa-file-text"></i></li>

									@endif
								</ul>
								<h1 class="article-title">{{$content->title}}</h1>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> {{ date("d F Y", strtotime($content->date_content)) }}</li>
									<li><i class="fa fa-comments"></i> {{$comment_count}}</li>
									<li><i class="fa fa-user"></i> <span style="text-transform:lowercase;"> by </span> {{!empty($content->users->username) ?
																		$content->users->username : '-'}}</li>
								</ul>
								<p>{{$content->description}}</p>
								</div>
						</article>
						<!-- /ARTICLE POST -->
						
						@if (Session('level') == 'member' || Session('level') == 'premium')

						<!-- article comments -->
						<div class="article-comments">
							<div class="section-title">
								<h2 class="title">Comments</h2>
							</div>
								
							<!-- comment -->

							@if (!empty($comment))

							@foreach ($comment as $c)

							<div class="media">
								<div class="media-left">
									<img src="img/av-1.jpg" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h5>{{!empty($c->users->username) ?
											$c->users->username : '-'}}<span class="reply-time">{{ $c->getDate() }}</span></h5>
									</div>
									<p>{{$c->text}}</p>				
								</div>
							</div>

							@endforeach

							@endif

							@if ($comment_count == 0)
								<div class="media">
									<div class="media-body">
										<p>Tidak ada comment.</p>
									</div>
								</div>
							@endif
							<!-- /comment -->
							
						</div>
						<!-- /article comments -->
						
						<!-- reply form -->
						<div class="article-reply-form">
								
							<form action="{{ url($content->id . '/add_comment') }}" method="post">
								@csrf
								<textarea class="input" placeholder="Message" name="text"></textarea>
								<button type="submit" class="input-btn">Send Message</button>
							</form>
						</div>
						<!-- /reply form -->

						@endif

					</div>
					<!-- /Main Column -->
					
					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- Ad widget -->
						<div class="widget center-block hidden-xs">
							<img class="center-block" src="./img/ad-1.jpg" alt=""> 
						</div>
						<!-- /Ad widget -->
						
						<!-- social widget -->
						<div class="widget social-widget">
							<div class="widget-title">
								<h2 class="title">Stay Connected</h2>
							</div>
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i><br><span>Facebook</span></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i><br><span>Twitter</span></a></li>
								<li><a href="#" class="google"><i class="fa fa-google"></i><br><span>Google+</span></a></li>
								<li><a href="#" class="instagram"><i class="fa fa-instagram"></i><br><span>Instagram</span></a></li>
								<li><a href="#" class="youtube"><i class="fa fa-youtube"></i><br><span>Youtube</span></a></li>
								<li><a href="#" class="rss"><i class="fa fa-rss"></i><br><span>RSS</span></a></li>
							</ul>
						</div>
						<!-- /social widget -->
						
						<!-- article widget -->
						<div class="widget">
							<div class="widget-title">
								<h2 class="title">Most Read</h2>
							</div>
							
							<!-- owl carousel 3 -->
							<div id="owl-carousel-3" class="owl-carousel owl-theme center-owl-nav">
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="./img/img-md-3.jpg" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-file-text"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
								
								<!-- ARTICLE -->
								<article class="article">
									<div class="article-img">
										<a href="#">
											<img src="./img/img-md-4.jpg" alt="">
										</a>
										<ul class="article-info">
											<li class="article-type"><i class="fa fa-file-text"></i></li>
										</ul>
									</div>
									<div class="article-body">
										<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /owl carousel 3 -->
							
							<!-- ARTICLE -->
							<article class="article widget-article">
								<div class="article-img">
									<a href="#">
										<img src="./img/img-widget-1.jpg" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
										<li><i class="fa fa-comments"></i> 33</li>
									</ul>
								</div>
							</article>
							<!-- /ARTICLE -->
							
							<!-- ARTICLE -->
							<article class="article widget-article">
								<div class="article-img">
									<a href="#">
										<img src="./img/img-widget-2.jpg" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
										<li><i class="fa fa-comments"></i> 33</li>
									</ul>
								</div>
							</article>
							<!-- /ARTICLE -->
							
							<!-- ARTICLE -->
							<article class="article widget-article">
								<div class="article-img">
									<a href="#">
										<img src="./img/img-widget-3.jpg" alt="">
									</a>
								</div>
								<div class="article-body">
									<h4 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h4>
									<ul class="article-meta">
										<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
										<li><i class="fa fa-comments"></i> 33</li>
									</ul>
								</div>
							</article>
							<!-- /ARTICLE -->
						</div>
						<!-- /article widget -->
					</div>
					<!-- /Aside Column -->
				</div>
				<!-- /ROW -->
			</div>
			<!-- /CONTAINER -->
		</div>
		<!-- /SECTION -->
		
		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="./img/ad-3.jpg" alt="">
		</div>
		<!-- /AD SECTION -->

@endsection