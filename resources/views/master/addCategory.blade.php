@extends('master.layoutMaster')


@section('title','Home - Categories')

@section('content')

	<div class="main-content-container container-fluid px-4">
		<!-- Page Header -->
	    <div class="page-header row no-gutters py-4">
	      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
	        <span class="text-uppercase page-subtitle">Overview</span>
	        <h3 class="page-title"><a href="/home/showCategories">Categories</a></h3>
	      </div>
	    </div>


	    <div class="row">
			<div class="col-sm-12" >
				@include('flashMsg')
				@include('errors')
			</div>
			<div class="col-sm-12">
				
				<form action="/home/storeCategory" class="add-form" method="post" >
					@csrf
                    <div class="form-group">
                        <label class="form-label" for="season_name">English Name for Category</label>
						<input class="form-control {{ $errors->has('en_category') ? 'danger' : '' }}" name="en_category" id="en_category" type="text" placeholder="English Name for Category" value="{{ old('en_category') }}" >
                    </div >
                    <div class="form-group">
                        	<label class="form-label" for="season_name">Arabic Name for Category</label>
						<input class="form-control {{ $errors->has('ar_category') ? 'danger' : '' }}" name="ar_category" id="ar_category" type="text" placeholder="Arabic Name for Category" value="{{ old('ar_category') }}" >
                    </div>
                    <div class="form-group">
                    	<label class="form-label" for="cat_desc" >Description</label>
						<textarea class="form-control {{ $errors->has('cat_desc') ? 'danger' : '' }}" name="cat_desc" id="cat_desc" placeholder="Enter Category description" rows="10">{{Request::old('cat_desc')}}</textarea>
                    </div>
                    <div class="btn-group mb-4">
		                    <button type="submit" class="btn btn-primary">Add</button>
		                </div>
                </form>
	        </div>
		</div>
	</div>
@endsection