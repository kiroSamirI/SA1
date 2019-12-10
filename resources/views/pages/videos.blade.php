@extends('layouts.app')
@section('head_content')

		
		<link rel="stylesheet" href="video/video.css"></link>
@endsection
@section('content')  
		<div class="Container-fluid">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
					</div>
				</div>
			
					<div class="col-lg-4 col-md-4 col-sm-12">
						<ul class="videoContainer">
							<div class="videoTitle">music </div>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/3V6GZbVjCCg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'  alt="title">
								<img src="Greece/1500-Santorini-Greece.jpg" class="videoImg">
								<div class="discrption">
									this is video 1
								</div>
								
								<div class="center_name">el fanar center</div>
							</li> 
							@foreach($videos as $video)
								<li class="video" id='{{$video->video}}' alt="{{$video->title}}">
									<img src="storage/videoGallary/{{$video->image}}" class="videoImg">
									<div class="discrption">
										{{$video->description}}
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							@endforeach
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
							<li class="video" id='<iframe width="560" height="315" src="https://www.youtube.com/embed/oidOpFIlBOA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>'>
								<img src="germany/BG_Sachsen.jpg" class="videoImg">
								<div class="discrption">
										this is video 2
									</div>
									
								<div class="center_name">el fanar center</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<script src="video/jquery-3.2.0.min.js"></script>
		<script src="video/video.js"></script>
@endsection
