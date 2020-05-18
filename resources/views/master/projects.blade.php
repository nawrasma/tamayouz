@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])

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
      @if (count($projects) > 0 )
  			@foreach($projects as $project)
  				<?php
  					$arr=['badge-primary','badge-warning','badge-dark'];
  					$domain=$arr[rand(0,2)] ;
  					
  				?>
            <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
              <div class="card card-small card-post h-100">
                <div class="card-post__image" style="background-image: url({{ asset("images/".$project->pro_photo) }});">
                	{{-- <a href="#" class="card-post__category badge badge-pill {{$domain ?? ''}}" style="margin:5px 0 0 5px">{{$project->pro_domain}}</a> --}}
                	<h3  class="card-post__category badge badge-pill {{$domain ?? ''}}" style="margin:5px 0 0 5px">{{$project->pro_domain}}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">
                    @if ($role == 'Admin')
                      <a class="text-fiord-blue" href="/home/project/{{$project->id}}">{{$project->pro_name}}</a>
                    @elseif($role == 'manager') 
                      <a class="text-fiord-blue" href="/homeManager/project/{{$project->id}}">{{$project->pro_name}}</a>
                    @endif
                  </h5>
                  <p class="card-text">{{ substr($project->pro_desc,0,120) }}</p>
                </div>
                <div class="card-footer text-muted border-top py-3">
                  <span class="d-inline-block">By
                    @if ($role == 'Admin')
                      <a class="text-fiord-blue" href="/home/project/{{$project->id}}">{{$project->stud_name}}</a>
                    @elseif($role == 'manager') 
                      <a class="text-fiord-blue" href="/homeManager/project/{{$project->id}}">{{$project->stud_name}}</a>
                    @endif
                  </span>
                </div>
              </div>
            </div>
            @endforeach
        @else
          <div class="row" style="width:50%;margin:50px 25% 0 25%;text-align:center;font-weight:bold;font-size:20px    ">
            <div class="flashMsg box" style="color:#ff2d20;border-color: red;">
              <p> There is not any project.. </p>
              <a href="/dashboard"> Try Again </a>
            </div>  
          </div>  
        @endif      
     </div>





	</div>

@endsection