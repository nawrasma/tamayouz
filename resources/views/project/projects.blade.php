@extends("project.layoutProject",$seasons)


@section('title','Projects')
@section('subPage','subpage')


@section("content")


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>{{$baseSeason->name}}</h2>
						<p>{{substr($baseSeason->desc, 0,450 ) }} </p>
					</header>

					<!-- Intro -->
					

					<hr class="major" />

					<!-- Content -->
						<section id="three" class="wrapper">
							<div class="inner">
								<div class="row">
									@foreach($projects as $project)
									<div class="item 3u 12u$(medium)">
						                <a href="/singleProject/{{$project->id}}">
						                    <img src="{{ asset("images/".$project->pro_photo) }} " alt="Avatar" class="image">
						                    <div class="overlay">
						                      <div class="text">{{ $project->pro_name }}</div>
						                    </div>
						                </a>
						            </div>
						            @endforeach
						            
					            </div>	
							</div>
						</section>
					

					
				</div>

			</section>


@endsection