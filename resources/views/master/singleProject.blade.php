@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])


@section('title','Single Project')

@section('content')

<div class="main-content-container container-fluid px-4">
	    <!-- Page Header -->
	    <div class="page-header row no-gutters py-4">
	      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
	        <span class="text-uppercase page-subtitle">Tamayouz</span>
	        <h3 class="page-title">Project Details</h3>
	      </div>
	    </div>
	    <!-- End Page Header -->


		<div class="row">
      <div class="col-sm-12" >
        @include('flashMsg')
      </div>
			<div class="baseDiv col-lg-10">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                    {{--   @if ( ($role == 'Admin') || ($project->user_id == Auth::user()->id) || ($seasons[0]->user_id == Auth::user()->id) ) --}}
                    	<div class="btn_list">
					  	          <button type="button" class="mb-2 btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#editModal">Edit</button>
                        @if($role !== 'student')
                         <button type="button" class="mb-2 btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteModal">Delete</button>
                         @endif
					             </div>
                       {{-- @endif --}}
                      <img class="rounded-circle" src="{{ asset("images/".$project->pro_photo) }}" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">{{ $project->pro_name}} </h4>
                    <span class="text-muted d-block mb-2"> {{$project->pro_domain}} - {{$project->pro_type}}</span>
                    <span class="text-muted d-block mb-2">Season {{$project->pro_season}}</span>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">

                      <div class="divName progress-wrapper ">
                        <strong class="text-muted d-block mb-2">Students</strong>
                        <div class="">
                          <ol>
                          	@foreach(explode(',',$project->stud_name) as $student)
							  <li>{{ $student }}</li>
							 @endforeach
                          </ol>
                        </div>
                      </div>

                      <div class="divName progress-wrapper ">
                        <strong class="text-muted d-block mb-2">Supervisor</strong>
                        <div class="">
                          <span>{{$project->super_name}}</span>
                        </div>
                      </div>

                      @if ($project->pro_grade !='null')
                          <div class="divName progress-wrapper ">
                            <strong class="text-muted d-block mb-2">Grade</strong>
                            <div class="">
                              <span>{{$project->pro_grade}}</span>
                            </div>
                          </div>
                      @endif

                    </li>
                    <li class="list-group-item px-4">

                      <div class="divName progress-wrapper ">
                        <strong class="text-muted d-block mb-2">University</strong>
                        <div class="">
                            <span>{{$project->pro_uni}}</span>
                        </div>
                      </div>

                      <div class="divName progress-wrapper ">
                        <strong class="text-muted d-block mb-2">Responsers</strong>
                        <div class="">
                          <span>{{$project->pro_responsers}}</span>
                        </div>
                      </div>
                      <div class="divName progress-wrapper ">
                        <strong class="text-muted d-block mb-2">Date</strong>
                        <div class="">
                          <span>{{$project->pro_date}}</span>
                        </div>
                      </div>

                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      @if ($project->is_video)
                          <div class="videoDiv row">
                            <video  controls>
                                <source src="{{ asset("videos/".$project->pro_video) }}" type="video/mp4">
                              </video>  
                          </div>
                      @endif
                      
                      
                      <span>
                      		{{$project->pro_desc}}
                      </span>

                      <div class="box">
							<a class="btn btn-lg  btn-outline-primary" href="{{ asset('files/'.$project->pro_file) }}">Project file</a>
                            <a class="btn btn-lg  btn-outline-primary" href="{{ asset('files/'.$project->pro_ppt) }}">Project PowerPoint</a>
                            @if ( !$project->is_video)
                                <a class="btn btn-lg  btn-outline-primary" href="{{ asset('videos/'.$project->pro_video) }}">Project Video</a>
                            @endif
                            
					  </div>
					  	
                    </li>
                    @if ($project->pro_recommend != 'null')
                    <li class="list-group-item p-4">
                        <strong class="text-muted d-block mb-2">Recommend</strong>
                        <span>
                            {{$project->pro_recommend}}
                      </span>
                    </li>
                    @endif
                  </ul>
                   
                  @if (($role == 'Admin' || $role == 'manager') && ($project->pro_recommend === 'null' || $project->pro_grade =='null'))  
                  <div class="row">
                    <div class="col" style="margin:20px 60px ">
                      <form action="/home/updateGradeRecommend" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="pro_id" value="{{$project->id}}" >
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="pro_grade">Grade</label>
                                <input type="text" name="pro_grade" id="pro_grade" class="form-control" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="pro_recommend">Recommend</label>
                                <textarea class="form-control" name="pro_recommend" id="pro_recommend" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <button class="btn btn-accent type="submit">Add</button>
                    </form> 
                    </div>
                  </div>  
                  @endif
                </div>


              </div>



		</div>
</div>



<!--  edit event modal-->
                        <div id="editModal" class="modal fade edit-event-modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <div class="modal-title"> Edit Project</div>
                                    </div>
                                @if ($role == 'Admin')
                                  <form action="/home/updateProject" class="edit-event-form" method="post" enctype="multipart/form-data">
                                @elseif($role == 'manager')
                                  <form action="/homeManager/updateProject" class="edit-event-form" method="post" enctype="multipart/form-data">
                                @else
                                  <form action="/homeManager/updateProject" class="edit-event-form" method="post" enctype="multipart/form-data">
                                @endif    
                                   
                                     @csrf
                                    @method('PATCH')
                                        <div class="modal-body">
                                            <input type="hidden" name="pro_id" id="pro_id_update" value={{$project->id}}>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="title" class="form-labrl">Project Name</label>
                                                    <input class="form-control " name="pro_name" id="pro_name" type="text" placeholder="Project Name" value="{{$project->pro_name}}" >
                                                </div >
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="form-labrl">Email</label>
                                                    <input id="email" type="text" name="pro_email" class="form-control email" placeholder="Email" required value="{{$project->pro_email}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                	<label for="stud" class="form-labrl">Students Names</label>
                                            		<textarea id="stud" name="stud_name" class="form-control stud" placeholder="Students Name" rows="5">{{$project->stud_name}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                            	<div class="form-group col-md-6">
                                                    <label class="form-label" for="domain" >Category</label>
                                                    <select class="form-control " name="pro_domain" id="domain">
                                                        @foreach ($categories as $category)
                                                            <option value=" {{$category->cat_en}} " {{ ($project->pro_domain == "$category->cat_en" ? "selected":"") }}>
                                                            {{$category->cat_en}}</option>  
                                                        @endforeach
                                                    </select> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_type" >Sub Category</label>
                                                    <input class="form-control" type="text" name="pro_type" id="pro_type" value="{{ $project->pro_type }}" placeholder="Sub Category" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="super_name" >Supervisor</label>
                                                    <input class="form-control " type="text" name="super_name" id="super_name" value="{{$project->super_name }}" placeholder="Supervisor Name" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_uni" >University</label>
                                                    <input class="form-control " type="text" name="pro_uni" id="pro_uni" value="{{ $project->pro_uni }}" placeholder="University Name" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_date" >Date</label>
                                                    <input class="form-control " type="date" name="pro_date" id="pro_date" value="{{ $project->pro_date }}" placeholder="Date" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_season" >Season</label>
                                                        <select class="form-control " name="pro_season" id="pro_season" >
                                                            @foreach ($seasons as $season)
                                                                <option value="{{ $season->id }},{{ $season->name }}"   {{ ($project->pro_season == "$season->name" ? "selected":"") }}>
                                                                Season {{ $season->name }}</option>
                                                            @endforeach
                                                        </select>  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_responsers" >Responsers</label>
                                                    <input class="form-control " type="text" name="pro_responsers" id="pro_responsers" value="{{ $project->pro_responsers }}" placeholder="Responsers Name" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="photo" >Load Photo</label>
                                                    <input class="form-control " type="file" name="pro_photo" id="photo" value="{{ $project->pro_photo }}" placeholder="Load Photo" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="pro_file" >Load File</label>
                                                    <input class="form-control " type="file" name="pro_file" id="pro_file" value="{{ $project->pro_file }}" placeholder="Load File" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="form-label" for="file" >Load PowerPoint</label>
                                                    <input class="form-control " type="file" name="pro_ppt" id="pro_ppt" value="{{ $project->pro_ppt }}" placeholder="Load PowerPoint" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <div class="col-sm-4">
                                                        <input class="" value="video"  type="radio" id="radio_load" name="video_type" checked>
                                                        <label class="" for="radio_load">Load Video</label>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input class="" value="link"  type="radio" id="radio_link" name="video_type">
                                                        <label class="" for="radio_link">Video Link</label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 v_load">
                                                    <label class="form-label" for="video" >Load Video</label>
                                                    <input class="form-control " type="file" name="pro_video" id="video" accept="video" value="{{ $project->pro_video }}"  />
                                                </div>
                                                <div class="form-group col-md-6 v_link" >
                                                    <label class="form-label" for="pro_video_link" >Video Link</label>
                                                    <input class="form-control " type="text" name="pro_video_link" id="pro_video_link"  value="{{ $project->pro_video }}" placeholder="Put Video Link" />
                                                </div>
                                            </div>
                                            @if ($role !== "student")
                                               <div class="form-row">
                                                    <label class="form-label" for="pro_grade">Grade</label>
                                                    <input type="text" name="pro_grade" id="pro_grade" value="{{$project->pro_grade}}" class="form-control" />
                                                </div>
                                            @endif
                                           
                                            <div class="form-group ">
                                                <label class="form-label" for="description" >Description</label>
                                                <textarea class="form-control " name="pro_desc" id="description" placeholder="Enter your description" rows="10">{{$project->pro_desc}}</textarea>
                                            </div>
                                            @if ($role !== "student")
                                            <div class="form-row">
                                                    <label class="form-label" for="pro_recommend">Recommend</label>
                                                    <textarea class="form-control" name="pro_recommend"  id="pro_recommend" cols="30" rows="10">{{$project->pro_recommend}}</textarea>
                                            </div>
                                           @endif
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn-group">
                                                <button class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--  edit event modal-->

                        <!--  delete event modal-->
                        <data class="modal fade delete-event-modal" role="dialog" id="deleteModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                    <div class="modal-title">Delete Project</div>
                                            </div>
                                            @if ($role == 'Admin')
                                              <form action="/home/destroyProject" method="post">
                                            @elseif($role == 'manager')
                                              <form action="/homeManager/destroyProject" method="post">
                                            @endif
                                            
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Are You Sure You Want To Delete The Project?</p>
                                                    <input type="hidden" name="pro_id" value="{{$project->id}}" >
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="btn-group">
                                                        <button class="btn btn-default" data-dismiss="modal">close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </data>
                        <!--  end delete event modal-->





@endsection