@extends('master.layoutMaster')


@section('title','Home - Seasons')

@section('content')

	<div class="main-content-container container-fluid px-4">
		<!-- Page Header -->
	    <div class="page-header row no-gutters py-4">
	      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
	        <span class="text-uppercase page-subtitle">Overview</span>
	        <h3 class="page-title"><a href="/home/showSeasons">Seasons</a></h3>
	      </div>
	    </div>


	    <div class="row">
			<div class="col-sm-12" >
				@include('flashMsg')
				@include('errors')
			</div>
			<div class="col-sm-12">
				
				<form action="/home/storeSeason" class="add-form" method="post" >
					@csrf
                    <div class="form-group">
                        <label class="form-label" for="season_name">Season Name</label>
						<input class="form-control {{ $errors->has('season_name') ? 'danger' : '' }}" name="season_name" id="season_name" type="text" placeholder="Season Name" value="{{ old('season_name') }}" >
                    </div >
                    <div class="form-group">
                        	<label class="form-label" for="manager" >Manager</label>
							<div class="select-wrapper">
								<select class="form-control {{ $errors->has('manager') ? 'danger' : '' }}" name="manager" id="manager">
									<option value="">- Select the manager -</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user[1][0]->id}}" {{ (old("manager") == "$user[1][0]->name" ? "selected":"") }} >{{$user[1][0]->name}}</option>
                                    @endforeach
								</select>
							</div>	
                    </div>
                    <div class="form-group">
                    	<label class="form-label" for="season_desc" >Description</label>
						<textarea class="form-control {{ $errors->has('season_desc') ? 'danger' : '' }}" name="season_desc" id="season_desc" placeholder="Enter  description" rows="10">{{Request::old('season_desc')}}</textarea>
                    </div>
                    <div class="btn-group mb-4">
		                    <button type="submit" class="btn btn-primary">Add</button>
		                </div>
                </form>
	        </div>
		</div>
	</div>
@endsection