@extends('master.layoutMaster')


@section('title','Home - Categories')

@section('content')


<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Categories</h3>
      </div>
    </div>
    <!-- End Page Header -->

    <div class="row">
      @include('flashMsg')  
    </div>


	<div class="row">
		<a href="/home/addCategory" style="padding:15px;font-size:18px ;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category</a>	
	</div>
  
  <div id="accordion">

    @foreach ($categories as $category)
      <h3>Category {{$category->cat_en}} </h3>
        <div class="row">
          <div class="col-sm-5"><h4>Category {{$category->cat_en}}</h4></div>
          <div class="col-sm-5"><h4>القسم: {{$category->cat_ar}}</h4></div>
          <div class="col-sm-2">
                <a class="categoryModal" id="{{$category->id}}" href="" data-toggle="modal" data-target="#editModal" ><i class="fa fa-wrench" aria-hidden="true"></i></a>
                <a class="categoryModal" id="{{$category->id}}" href="" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
          <div class="col-sm-12" style="margin-top:50px ">{{$category->cat_desc}}</div>
          
      </div>
    @endforeach
  </div>



</div>




<!--  edit event modal-->
                        <div id="editModal" class="modal fade edit-event-modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <div class="modal-title"> Edit Category</div>
                                    </div>
                                   <form action="/home/updateCategory" class="edit-event-form" method="post" >
                                     @csrf
                                    @method('PATCH')
                                        <div class="modal-body">
                                            <input type="hidden" name="category_id_update" id="category_id_update" value="">
                                            <div class="form-group">
                                                <label class="form-label" for="season_name">English Name for Category</label>
                                                <input class="form-control " name="en_category" id="en_category" type="text" placeholder="English Name for Category" value="{{ old('en_category') }}" >
                                            </div >
                                            <div class="form-group">
                                                <label class="form-label" for="season_name">Arabic Name for Category</label>
                                                <input class="form-control " name="ar_category" id="ar_category" type="text" placeholder="Arabic Name for Category" value="{{ old('ar_category') }}" >
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="cat_desc" >Description</label>
                                                <textarea class="form-control" name="cat_desc" id="cat_desc" placeholder="Enter Category description" rows="10">{{Request::old('cat_desc')}}</textarea>
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
                                                    <div class="modal-title">Delete Category</div>
                                            </div>
                                            <form action="/home/deleteCategory" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Are You Sure You Want To Delete The Category?</p>
                                                    <input type="hidden" class="category_id" name="category_id" value="" >
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