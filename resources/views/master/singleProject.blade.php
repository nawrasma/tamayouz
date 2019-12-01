@extends('master.layoutMaster')


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
			<div class="baseDiv col-lg-10">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                    	<div class="btn_list">
					  	 <button type="button" class="mb-2 btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#editModal">Edit</button>
                         <button type="button" class="mb-2 btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteModal">Delete</button>
					  </div>
                      <img class="rounded-circle" src="{{ asset("images/".$project->pro_photo) }}" alt="User Avatar" width="110"> </div>
                    <h4 class="mb-0">{{ $project->pro_name}}</h4>
                    <span class="text-muted d-block mb-2"> {{$project->pro_domain}} - {{$project->pro_type}}</span>
                    
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

                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <div class="videoDiv row">
                      	<video  controls>
						  	<source src="{{ asset("videos/".$project->pro_video) }}" type="video/mp4">
						  </video>	
                      </div>
                      
                      <span>
                      		{{$project->pro_desc}}
                      </span>

                      <div class="box">
							<a class="btn btn-lg  btn-outline-primary" href="{{ asset('files/'.$project->pro_file) }}">Project file</a>
					  </div>
					  	
                    </li>
                  </ul>
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
                                   <form action="" class="edit-event-form" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <input type="hidden" name="pro_id_update" id="pro_id_update" value={{$project->id}}>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="title" class="form-labrl">Project Name</label>
                                                    <input id="title" type="text" name="pro_name" class="form-control title" placeholder="Project Name" required value="{{$project->pro_name}}">
                                                </div >
                                                <div class="form-group col-md-6">
                                                    <label for="email" class="form-labrl">Email</label>
                                                    <input id="email" type="text" name="pro_email" class="form-control email" placeholder="Email" required value="{{$project->pro_email}}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="super" class="form-labrl">Supervisor</label>
                                                    <input id="super" type="text" name="super_name" class="form-control super" placeholder="Project Name" required value="{{$project->super_name}}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                	<label for="stud" class="form-labrl">Students Names</label>
                                            		<textarea id="stud" name="stud_name" class="form-control stud" placeholder="Students Name" rows="5">{{$project->stud_name}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                            	<div class="form-group col-md-6">
                                                    <label for="domain" class="form-labrl">Domain</label>
                                                    <select id="domain" class="form-control domain" name="pro_domain" required>
                                                        <option class="Software" {{ ( $project->pro_domain == "Software" ? "selected":"")}}   value="Software">Software</option>
                                                        <option class="Hardware" {{ ( $project->pro_domain == "Hardware" ? "selected":"")}} value="Hardware">Hardware</option>
                                                        <option class="Networks" {{ ( $project->pro_domain == "Networks" ? "selected":"")}} value="Networks">Networks</option>
                                                    </select> 
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="type" class="form-labrl">Type</label>
                                                    <select id="type" class="form-control type" name="pro_type" required>
                                                        <option value="AI" {{ ( $project->pro_type == "AI" ? "selected":"") }}>
															AI</option>
														<option value="Web App" {{ ( $project->pro_type == "Web App" ? "selected":"") }}>
															Web App</option>
														<option value="Descktop App" {{ ( $project->pro_type == "Descktop App" ? "selected":"") }}>
															Descktop App</option>
														<option value="Mobile App" {{ ( $project->pro_type == "Mobile App" ? "selected":"") }}>
															Mobile App</option>
														<option value="Smart Home" {{ ( $project->pro_type == "Smart Home" ? "selected":"") }}>
															Smart Home</option>
														<option value="IOT" {{ ( $project->pro_type == "IOT" ? "selected":"") }}>
															IOT</option>
														<option value="Industrial" {{ ( $project->pro_type == "Industrial" ? "selected":"") }}>
															Industrial</option>
														<option value="Company" {{ ( $project->pro_type == "Company" ? "selected":"") }}>
															Company</option>
														<option value="Mintor" {{ ( $project->pro_type == "Mintor" ? "selected":"") }}>
															Mintor</option>	
                                                    </select> 
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="pro_image" class="form-labrl">Image</label>
                                                <input id="pro_image" type="file" name="pro_photo" class="form-control" placeholder    ="image" required>
                                            </div>
                                            <div class="form-group ">
                                                <label for="pro_video" class="form-labrl">Video</label>
                                                <input id="pro_video" type="file" name="pro_video" class="form-control" placeholder    ="video" required>
                                            </div> 
                                            <div class="form-group ">
                                                <label for="pro_file" class="form-labrl">File</label>
                                                <input id="pro_file" type="file" name="pro_file" class="form-control" placeholder    ="file" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="description" class="form-labrl">Description</label>
                                                <textarea id="description" name="pro_desc" class="form-control description" placeholder="Project Description" rows="5">{{$project->pro_desc}}</textarea>
                                            </div>

                                           
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
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <p>Are You Sure You Want To Delete The Project?</p>
                                                    <input type="hidden" id="project_id_delete" name="project_id" value={{$project->id}}>
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