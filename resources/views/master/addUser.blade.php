@extends('master.layoutMaster')


@section('title','Home - Users')

@section('content')

	<div class="main-content-container container-fluid px-4">
		<!-- Page Header -->
	    <div class="page-header row no-gutters py-4">
	      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
	        <span class="text-uppercase page-subtitle">Overview</span>
	        <h3 class="page-title"><a href="/home/showUsers">Users</a></h3>
	      </div>
	    </div>


	    <div class="row">
			<div class="col-sm-12" >
				@include('flashMsg')
				@include('errors')
			</div>
			<div class="col-sm-12">
				
				<form action="/home/storeUser" class="add-form" method="post" enctype="multipart/form-data">
					@csrf
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
                           <input type="text" class="form-control {{ $errors->has('address') ? 'danger' : '' }}" name="address" id="addres" placeholder="Address" value="{{ old('address') }}">
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
						<textarea class="form-control {{ $errors->has('desc') ? 'danger' : '' }}" name="desc" id="description" placeholder="Enter your description" rows="10">{{Request::old('desc')}}</textarea>
                    </div>
                    <div class="btn-group mb-4">
		                    <button type="submit" class="btn btn-primary">Add</button>
		                </div>
                </form>
	        </div>
		</div>
	</div>
@endsection