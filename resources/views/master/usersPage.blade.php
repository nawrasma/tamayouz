@extends('master.layoutMaster')


@section('title','Home - Users')

@section('content')


<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Users</h3>
      </div>
    </div>

    <div class="row">
      @include('flashMsg')  
    </div>

    
    <!-- End Page Header -->
	<div class="row">
		<a href="/home/addUser" style="padding:15px;font-size:18px ;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add User</a>	
	</div>

	<div id="accordion">

		@foreach ($users as $user)
			<h3>{{ $user[0]->name }} <strong style="float:right;margin-right:20px  ">{{$user[1]->role}} </strong></h3>
		    <div class="row">
				<div class="col-sm-3"><img src="{{ asset('images/'.$user[1]->image) }}" alt="user-img"></div>
				<div class="col-sm-7" style="margin-bottom:50px ">
					<h2>{{ $user[0]->name }}</h2>
				    <h4>{{$user[1]->role}}</h4>
				    <span style="margin-right:30px "><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user[1]->address}}</span> <span><i class="fa fa-phone" aria-hidden="true"></i> {{$user[1]->phone}}</span> 	
				</div>
				<div class="col-sm-2">
					<a class="btnModal" id="{{$user[0]->id}}" href="" data-toggle="modal" data-target="#editModal" ><i class="fa fa-wrench" aria-hidden="true"></i></a>
					<a class="btnModal" id="{{$user[0]->id}}" href="" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash" aria-hidden="true"></i></a>
				</div>
				<div class="col-sm-6"><i class="fa fa-envelope" aria-hidden="true"></i> {{$user[0]->email}}</div>
				<div class="col-sm-6"><i class="fab fa-linkedin mr-1"></i> {{$user[1]->linked}}</div>
			    <div class="col-sm-12" style="margin-top:50px ">{{$user[1]->desc}}</div>
			    
			</div>
		@endforeach
	</div>


   
</div>


<!--  edit event modal-->
                        <div id="editModal" class="modal fade edit-event-modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <div class="modal-title"> Edit User</div>
                                    </div>
                                   <form action="/home/updateUser" class="edit-event-form" method="post" enctype="multipart/form-data">
                                     @csrf
                                    @method('PATCH')
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id_update" id="user_id_update" value="">
                                            <div class="row">
						                        <div class="form-group col-md-6">
						                            <label class="form-label" for="first_name">First Name</label>
													<input class="form-control {{ $errors->has('first_name') ? 'danger' : '' }}" name="first_name" id="first_name" type="text" placeholder="First Name" value="{{ old('first_name') }}" >
						                        </div >
						                        <div class="form-group col-md-6">
						                            <label class="form-label" for="last_name">Last Name</label>
													<input class="form-control {{ $errors->has('last_name') ? 'danger' : '' }}" name="last_name" id="last_name" type="text" placeholder="Last Name" value="{{ old('last_name') }}" >
						                        </div >
						                    </div>
						                    <div class="row">
						                    	<div class="form-group col-md-6">
						                            <label class="form-label" for="email">Email</label>
													<input class="form-control {{ $errors->has('email') ? 'danger' : '' }}" name="email" id="email" type="email" placeholder="Email"  value="{{ old('email') }}" >
						                        </div>
						                        <div class="form-group col-md-6">
						                            <label class="form-label" for="password">Password</label>
													<input class="form-control {{ $errors->has('password') ? 'danger' : '' }}" name="password" id="password" type="password" placeholder="Password"  value="{{ old('password') }}" >
						                        </div>
						                    </div>
						                    <div class="row">
						                    	<div class="form-group col-md-6">
						                           <label for="addres">Address</label>
						                           <input type="text" class="form-control {{ $errors->has('address') ? 'danger' : '' }}" name="address" id="address" placeholder="Address" value="{{ old('address') }}">
						                        </div>
						                        <div class="form-group col-md-6">
						                           <label for="phone">Phone</label>
						                           <input type="text" class="form-control {{ $errors->has('phone') ? 'danger' : '' }}" name="phone" id="phone" placeholder="phone" value="{{ old('phone') }}">
						                        </div>
						                    </div>
						                    <div class="row">
						                    	<div class="form-group col-md-6">
						                            <label for="Linked">Linkedin Link</label>
						                            <input type="text" class="form-control {{ $errors->has('linked') ? 'danger' : '' }}" name="linked" id="Linked" placeholder="Linkedin" value="{{ old('linked') }}">
						                        </div>
						                        <div class="form-group col-md-6">
						                        	<label class="form-label" for="role" >Role</label>
													<div class="select-wrapper">
														<select class="form-control {{ $errors->has('role') ? 'danger' : '' }}" name="role" id="role">
															<option value="">- Select your Role -</option>
															<option value="Department official" {{ (old("role") == "Department official" ? "selected":"") }}>Department official</option>
															<option value="student" {{ (old("role") == "student" ? "selected":"") }} >Student</option>
														</select>
													</div>	
						                        </div>
						                    </div>
						                    <div class="form-group">
						                    	<label class="form-label" for="photo" >Load Photo</label>
												<input class="form-control {{ $errors->has('photo') ? 'danger' : '' }}" type="file" name="photo" id="photo" value="{{ old('photo') }}" placeholder="Load Photo" />
						                    </div>
						                    <div class="form-group">
						                    	<label class="form-label" for="description" >Description</label>
												<textarea class="form-control {{ $errors->has('desc') ? 'danger' : '' }}" name="desc" id="desc" placeholder="Enter your description" rows="10">{{Request::old('desc')}}</textarea>
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
                                                    <div class="modal-title">Delete User</div>
                                            </div>
                                            <form action="/home/deleteUser" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Are You Sure You Want To Delete The User?</p>
                                                    <input type="hidden" class="user_id" name="user_id" value="" >
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