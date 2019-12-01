@extends('master.layoutMaster')

@section('title','All Projects')

@section('content')

 	<div class="main-content-container container-fluid px-4">
	    <!-- Page Header -->
	    <div class="page-header row no-gutters py-4">
	      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
	        <span class="text-uppercase page-subtitle">Tamayouz</span>
	        <h3 class="page-title">All Projects</h3>
	      </div>
	    </div>
	    <!-- End Page Header -->


		<div class="row">
			@foreach($projects as $project)
				<?php
					$domain ;
					if ($project->pro_domain == 'Software')
					    $domain='badge-primary';
					elseif ($project->pro_domain == 'Hardware')
					    $domain='badge-warning';
					else
					    $domain='badge-dark';
					
				?>
              <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                <div class="card card-small card-post h-100">
                  <div class="card-post__image" style="background-image: url({{ asset("images/".$project->pro_photo) }});">
                  	<a href="#" class="card-post__category badge badge-pill {{$domain ?? ''}}" style="margin:5px 0 0 5px">{{$project->pro_domain}}</a>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">
                      <a class="text-fiord-blue" href="/home/project/{{$project->id}}">{{$project->pro_name}}</a>
                    </h5>
                    <p class="card-text">{{ substr($project->pro_desc,0,120) }}</p>
                  </div>
                  <div class="card-footer text-muted border-top py-3">
                    <span class="d-inline-block">By
                      <a class="text-fiord-blue" href="/home/project/{{$project->id}}">{{$project->stud_name}}</a>
                    </span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>





	</div>

@endsection