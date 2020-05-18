@extends('master.layoutMaster')


@section('title','Home - Seasons')

@section('content')


<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Seasons</h3>
      </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
      @include('flashMsg')  
    </div>
    
	<div class="row">
		<a href="/home/addSeason" style="padding:15px;font-size:18px ;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Season</a>	
	</div>

  <div id="accordion">

    @foreach ($seasons as $season)
      <h3>Season {{ $season[0]->name }} <strong style="float:right;margin-right:20px  ">{{$season[1]->name}} </strong></h3>
        <div class="row">
          <div class="col-sm-5"><h4>Season {{$season[0]->name}}</h4></div>
          <div class="col-sm-5"><h4>Manager : {{$season[1]->name}}</h4></div>
          <div class="col-sm-2">
                <a class="seasonModal" id="{{$season[0]->id}}" href="" data-toggle="modal" data-target="#editModal" ><i class="fa fa-wrench" aria-hidden="true"></i></a>
                <a class="seasonModal" id="{{$season[0]->id}}" href="" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
          <div class="col-sm-12" style="margin-top:50px ">{{$season[0]->desc}}</div>
          
      </div>
    @endforeach
  </div>
</div>



<!--  edit event modal-->
                        <div id="editModal" class="modal fade edit-event-modal" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <div class="modal-title"> Edit Season</div>
                                    </div>
                                   <form action="/home/updateSeason" class="edit-event-form" method="post" >
                                     @csrf
                                    @method('PATCH')
                                        <div class="modal-body">
                                            <input type="hidden" name="season_id_update" id="season_id_update" value="">
                                            <div class="form-group">
                                                <label class="form-label" for="season_name">Season Name</label>
                                                <input class="form-control {{ $errors->has('season_name') ? 'danger' : '' }}" name="season_name" id="season_name" type="text" placeholder="Season Name" value="{{ old('season_name') }}" >
                                            </div >
                                            <div class="form-group">
                                                <label class="form-label" for="manager" >Manager</label>
                                                <div class="select-wrapper">
                                                  <select class="form-control {{ $errors->has('manager') ? 'danger' : '' }}" name="manager" id="manager">
                                                    <option value="">- Select the manager -</option>
                                                    @foreach ($seasons as $user)
                                                        <option value="{{$user[1]->name}}" {{ (old("manager") == "$user[1]->name" ? "selected":"") }} >{{$user[1]->name}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>  
                                            </div>
                                            <div class="form-group">
                                              <label class="form-label" for="season_desc" >Description</label>
                                              <textarea class="form-control {{ $errors->has('season_desc') ? 'danger' : '' }}" name="season_desc" id="season_desc" placeholder="Enter  description" rows="10">{{Request::old('season_desc')}}</textarea>
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
                                                    <div class="modal-title">Delete Season</div>
                                            </div>
                                            <form action="/home/deleteSeason" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <p>Are You Sure You Want To Delete The Season?</p>
                                                    <input type="hidden" class="season_id" name="season_id" value="" >
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