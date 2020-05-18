@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])


@section('title','Add Project')

@section('content')

	<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Add Project</h3>
              </div>
            </div>
            <!-- End Page Header -->
			<div class="row">
				<div class="col-sm-12" >
					@include('flashMsg')
					@include('errors')
				</div>
				<div class="col-sm-12">
						@if ($role == 'Admin')
							<form action="/home/projectStroe" class="add-form" method="post" enctype="multipart/form-data">
						@elseif($role == 'manager')						
							<form action="/homeManager/projectStroe" class="add-form" method="post" enctype="multipart/form-data">
						@endif					
							@csrf
		                    <div class="row">
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="pro_name">Project Name</label>
									<input class="form-control {{ $errors->has('pro_name') ? 'danger' : '' }}" name="pro_name" id="pro_name" type="text" placeholder="Project Name" value="{{ old('pro_name') }}" >
		                        </div >
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="email">Email</label>
									<input class="form-control {{ $errors->has('pro_email') ? 'danger' : '' }}" name="pro_email" id="email" type="email" placeholder="Email"  value="{{ old('pro_email') }}" >
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="form-group col-md-12">
		                            <label class="form-label" for="students">Students</label>
									<textarea class="form-control {{ $errors->has('stud_name') ? 'danger' : '' }}" name="stud_name" id="students"  rows="2" placeholder=" example : Ahmad , Aziz , Mahmoud  ...">{{Request::old('stud_name')}}</textarea>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="form-group col-md-6">
		                        	<label class="form-label" for="domain" >Category</label>
									<div class="select-wrapper">
										<select class="form-control {{ $errors->has('pro_domain') ? 'danger' : '' }}" name="pro_domain" id="domain">
											<option value="">- Category -</option>
											@foreach ($categories as $category)
												<option value="{{$category->cat_en}}" {{ (old("pro_domain") == "$category->cat_en" ? "selected":"") }}>
												{{$category->cat_en}}</option>	
											@endforeach
										</select>
									</div>	
		                        </div>
		                        <div class="form-group col-md-6">
		                        	<label class="form-label" for="pro_type" >Sub Category</label>
									<input class="form-control {{ $errors->has('pro_type') ? 'danger' : '' }}" type="text" name="pro_type" id="pro_type" value="{{ old('pro_type') }}" placeholder="Sub Category" />
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="form-group col-md-6">
		                            <label class="form-label" for="super_name" >Supervisor</label>
									<input class="form-control {{ $errors->has('super_name') ? 'danger' : '' }}" type="text" name="super_name" id="super_name" value="{{ old('super_name') }}" placeholder="Supervisor Name" />
		                        </div>
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="pro_uni" >University</label>
									<input class="form-control {{ $errors->has('pro_uni') ? 'danger' : '' }}" type="text" name="pro_uni" id="pro_uni" value="{{ old('pro_uni') }}" placeholder="University Name" />
		                        </div>
		                    </div>
		                     <div class="row">
		                    	<div class="form-group col-md-6">
		                            <label class="form-label" for="pro_date" >Date</label>
									<input class="form-control {{ $errors->has('pro_date') ? 'danger' : '' }}" type="date" name="pro_date" id="pro_date" value="{{ old('pro_date') }}" placeholder="Date" />
		                        </div>
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="pro_season" >Season</label>
									<div class="select-wrapper">
										<select class="form-control {{ $errors->has('pro_season') ? 'danger' : '' }}" name="pro_season" id="pro_season" >
											<option value="">- Season -</option>
											@foreach ($seasons as $season)
												<option value="{{ $season->id }},{{ $season->name }}"                   {{ (old("pro_season") == "$season->id , $season->name" ? "selected":"") }}>
												Season {{ $season->name }}</option>
											@endforeach
										</select>
									</div>	
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="form-group col-md-6">
		                            <label class="form-label" for="pro_responsers" >Responsers</label>
									<input class="form-control {{ $errors->has('pro_responsers') ? 'danger' : '' }}" type="text" name="pro_responsers" id="pro_responsers" value="{{ old('pro_responsers') }}" placeholder="Responsers Name" />
		                        </div>
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="photo" >Load Photo</label>
									<input class="form-control {{ $errors->has('pro_photo') ? 'danger' : '' }}" type="file" name="pro_photo" id="photo" value="{{ old('pro_photo') }}" placeholder="Load Photo" />
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="form-group col-md-6">
		                            <label class="form-label" for="pro_file" >Load File</label>
									<input class="form-control {{ $errors->has('pro_file') ? 'danger' : '' }}" type="file" name="pro_file" id="pro_file" value="{{ old('pro_file') }}" placeholder="Load File" />
		                        </div>
		                        <div class="form-group col-md-6">
		                            <label class="form-label" for="file" >Load PowerPoint</label>
									<input class="form-control {{ $errors->has('pro_ppt') ? 'danger' : '' }}" type="file" name="pro_ppt" id="pro_ppt" value="{{ old('pro_ppt') }}" placeholder="Load PowerPoint" />
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
									<input class="form-control {{ $errors->has('pro_video') ? 'danger' : '' }}" type="file" name="pro_video" id="video" accept="video" value="{{ old('pro_video') }}"  />
		                        </div>
		                        <div class="form-group col-md-6 v_link" >
		                            <label class="form-label" for="pro_video_link" >Video Link</label>
									<input class="form-control {{ $errors->has('pro_video') ? 'danger' : '' }}" type="text" name="pro_video_link" id="pro_video_link"  value="{{ old('pro_video') }}" placeholder="Put Video Link" />
		                        </div>
		                    </div>
		                    <div class="form-group ">
		                        <label class="form-label" for="description" >Description</label>
								<textarea class="form-control {{ $errors->has('pro_desc') ? 'danger' : '' }}" name="pro_desc" id="description" placeholder="Enter your description" rows="10">{{Request::old('pro_desc')}}</textarea>
		                    </div>
		                    <div class="form-group">
	                                <label class="form-label" for="pro_grade">Grade</label>
	                                <input type="text" name="pro_grade" id="pro_grade" class="form-control {{ $errors->has('pro_grade') ? 'danger' : '' }}" value="{{ old('pro_video') }}" placeholder="Grade" />
	                        </div>
	                        <div class="form-group">
	                                <label class="form-label" for="pro_recommend">Recommend</label>
	                                <textarea class="form-control {{ $errors->has('pro_recommend') ? 'danger' : '' }}" name="pro_recommend" id="pro_recommend" cols="30" rows="10">{{Request::old('pro_recommend')}}</textarea>
	                        </div>
		                
		                <div class="btn-group mb-4">
		                    <button type="submit" class="btn btn-primary">Save</button>
		                </div>
		            </form>
		        </div>
			</div>


    </div>


@endsection