@extends('pinkbike.main')

@section('content')

<!-- Owl Carousel 1 -->
<div id="owl-carousel-1" class="owl-carousel owl-theme center-owl-nav">
			<!-- ARTICLE -->
			<article class="article thumb-article">
				<div class="article-img">
					<img src="./img/img-lg-1.jpg" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article>
			<!-- /ARTICLE -->
			
			<!-- ARTICLE -->
			<article class="article thumb-article">
				<div class="article-img">
					<img src="./img/img-lg-2.jpg" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-file-text"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article>
			<!-- /ARTICLE -->
			
			<!-- ARTICLE -->
			<article class="article thumb-article">
				<div class="article-img">
					<img src="./img/img-lg-3.jpg" alt="">
				</div>
				<div class="article-body">
					<ul class="article-info">
						<li class="article-category"><a href="#">News</a></li>
						<li class="article-type"><i class="fa fa-camera"></i></li>
					</ul>
					<h2 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h2>
					<ul class="article-meta">
						<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
						<li><i class="fa fa-comments"></i> 33</li>
					</ul>
				</div>
			</article>
			<!-- /ARTICLE -->
		</div>
		<!-- /Owl Carousel 1 -->		
		
		<!-- AD SECTION -->
		<div class="visible-lg visible-md">
			<img class="center-block" src="./img/ad-3.jpg" alt="">
		</div>
		<!-- /AD SECTION -->
				
		<!-- SECTION -->
		<div class="section">
			<!-- CONTAINER -->
			<div class="container">
				<!-- ROW -->
				<div class="row">
					<!-- Main Column -->
					<div class="col-md-8">
						<!-- section title -->
						<div class="section-title">
							<h2 class="title">Featured Posts</h2>
						</div>
						<!-- /section title -->

						@if (!empty($content_list))

						@foreach($content_list as $content)
						
						<!-- ARTICLE -->
						<article class="article row-article">

						@if ($content->type == 'video')

							<div class="article-img">
								<iframe width="100%" height="300" src="{{$content->getEmbed()}}" frameborder="0" allowfullscreen></iframe>
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


							<div class="article-body">
								<ul class="article-info">
									<li class="article-category"><a>{{$content->type}}</a></li>

									@if ($content->type == 'video')

									<li class="article-type"><i class="fa fa-video-camera"></i></li>

									@elseif ($content->type == 'photo')

									<li class="article-type"><i class="fa fa-camera"></i></li>

									@else

									<li class="article-type"><i class="fa fa-file-text"></i></li>

									@endif

								</ul>
								<h3 class="article-title"><a href="{{ url($content->id) }}">{{$content->title}}</a></h3>
								<ul class="article-meta">
									<li><i class="fa fa-clock-o"></i> {{ date("d F Y", strtotime($content->date_content)) }}</li>
									<li><i class="fa fa-user"></i> <span style="text-transform:lowercase;"> by </span> {{!empty($content->users->username) ?
																		$content->users->username : '-'}}</li>
								</ul>
								<p>{{$content->summary}}</p>
							</div>
						</article>
						<!-- /ARTICLE -->

						@endforeach
						
						@else
							<p>Tidak ada data content.</p>
						@endif
						
						<!-- pagination -->
						<div class="article-pagination">
							<ul> 
								<li class="active"><a href="#" class="active">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /pagination -->
					</div>
					<!-- /Main Column -->
					
					<!-- Aside Column -->
					<div class="col-md-4">
						<!-- article widget -->
						<div class="widget">
							<div class="widget-title">
								<h2 class="title">Featured Posts</h2>
							</div>
							
							<!-- owl carousel 4 -->
							<div id="owl-carousel-4" class="owl-carousel owl-theme">
								<!-- ARTICLE -->
								<article class="article thumb-article">
									<div class="article-img">
										<img src="./img/img-thumb-1.jpg" alt="">
									</div>
									<div class="article-body">
										<ul class="article-info">
											<li class="article-category"><a href="#">News</a></li>
											<li class="article-type"><i class="fa fa-video-camera"></i></li>
										</ul>
										<h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							
								<!-- ARTICLE -->
								<article class="article thumb-article">
									<div class="article-img">
										<img src="./img/img-thumb-2.jpg" alt="">
									</div>
									<div class="article-body">
										<ul class="article-info">
											<li class="article-category"><a href="#">News</a></li>
											<li class="article-type"><i class="fa fa-video-camera"></i></li>
										</ul>
										<h3 class="article-title"><a href="#">Duis urbanitas eam in, tempor consequat.</a></h3>
										<ul class="article-meta">
											<li><i class="fa fa-clock-o"></i> January 31, 2017</li>
											<li><i class="fa fa-comments"></i> 33</li>
										</ul>
									</div>
								</article>
								<!-- /ARTICLE -->
							</div>
							<!-- /owl carousel 4 -->
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


@endsection