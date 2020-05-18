@extends("project.layoutProject",$seasons)


@section('title','Project Name')
@section('subPage','subpage')


@section("content")


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<div class="image round center" >
							<img src=" {{ asset("images/".$project->pro_photo) }}" alt="{{$project->pro_photo}}" />
						</div>
						<h2>{{ $project->pro_name }}</h2>
						<p><strong>Category :</strong>  {{ $project->pro_domain }} , <strong>Sub-Category :</strong> {{ $project->pro_type }} </p>
					</header>

					<!-- Intro -->
					

					<hr class="major" />

					<!-- Content -->
						<section id="three" class="wrapper" style="padding:10px 0 ">
							<div class="inner">
								<div class="row">
									
									<div class=" 12u$(small)" style="width:30%;margin-left:3%">

										<h4>Students Name</h4>
										<ul>
											@foreach(explode(',',$project->stud_name) as $student)
											  <li>{{ $student }}</li>
											 @endforeach
										</ul>

									</div>
									<div class=" 12u$(small)" style="width:30%;margin-left:3%">

										<h4>Supervisor Name</h4>
										<ol>
											<li>{{ $project->super_name }}</li>
											
										</ol>

									</div>
									 @if ($project->pro_grade !='null')
									<div class=" 12u$(small)" style="width:30%;margin-left:3%">
										<h4>Grade</h4>
										<span>{{ $project->pro_grade }}</span>
									</div>
									@endif	
								</div>	
								<div class="row">

									<div class=" 12u$(small)" style="width:30%;margin-left:3%">
										<h4>University</h4>
										<span>{{ $project->pro_uni }}</span>
									</div>
									<div class=" 12u$(small)" style="width:30%;margin-left:3%" >
										<h4>Responsers</h4>
										<span>{{ $project->pro_responsers }}</span>
									</div>
									
									<div class=" 12u$(small)" style="width:30%;margin-left:3%">
										<h4>Date</h4>
										<span>{{ $project->pro_date }}</span>
									</div>	
								</div>

								<hr class="major" />


									<!-- here video -->
								<div class="row">
									@if ($project->is_video)
									<div class="videoDIV">
										<video  controls>
										  <source src="{{ asset("videos/".$project->pro_video) }}" type="video/mp4">
										</video>
									</div>
									@endif
								</div>			
									<!-- descriotion -->	
									<blockquote>
										<h3>Description</h3>
										<p>{{ $project->pro_desc}}</p>
									</blockquote>
								<div class="box">
									<a style="width:30%;margin-right:5%" href="{{ asset('files/'.$project->pro_file) }}">Project file</a>
									<a style="width:30%;margin-right:5%"  href="{{ asset('files/'.$project->pro_ppt) }}">Project powerpoint</a>
									@if (!$project->is_video)
										<a class="videoLink" href="{{ asset('videos/'.$project->pro_video) }}">Project Video</a>
									@endif
								</div>
								@if ($project->pro_recommend !='null')
								
								<blockquote>
										<h3>Recommend</h3>
										<p>{{ $project->pro_recommend}}</p>
								</blockquote>		
								@endif
							</div>
						</section>
					

					
				</div>

			</section>

@endsection