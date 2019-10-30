@extends("project.layoutProject")


@section('title','Project Name')
@section('subPage','subpage')


@section("content")


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>{{ $project->pro_name }}</h2>
						<p><strong>Domain :</strong>  {{ $project->pro_domain }} , <strong>Type :</strong> {{ $project->pro_type }} </p>
					</header>

					<!-- Intro -->
					

					<hr class="major" />

					<!-- Content -->
						<section id="three" class="wrapper">
							<div class="inner">
								<div class="row">
									<div class="image round left" style="width: 30%;">
										<img src=" {{ asset("images/".$project->pro_photo) }}" alt="Pic 01" />
									</div>
									<div class="6u 12u$(small)" style="width: 30%;">

										<h4>Students Name</h4>
										<ul>
											@foreach(explode(',',$project->stud_name) as $student)
											  <li>{{ $student }}</li>
											 @endforeach
										</ul>

									</div>
									<div class="6u$ 12u$(small)" style="width:30% ">

										<h4>Supervisor Name</h4>
										<ol>
											<li>{{ $project->super_name }}</li>
											
										</ol>

									</div>	
								</div>	
									<!-- here video -->
								<div class="row">
									<div class="videoDIV">
									<video  controls>
									  <source src="{{ asset("videos/".$project->pro_video) }}" type="video/mp4">
									</video>
									</div>
								</div>			
									<!-- descriotion -->	
									<blockquote>
									<p>{{ $project->pro_desc}}</p>
									</blockquote>
								<div class="box">
									<a href="{{ asset('files/'.$project->pro_file) }}">Project file</a>
								</div>		

							</div>
						</section>
					

					
				</div>

			</section>

@endsection