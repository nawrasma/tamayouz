@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])

@section('content')

<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Messages</h3>
      </div>
    </div>
    <!-- End Page Header -->
    <div class="row chat">
	    @foreach ($messages as $message)
	    	@if ($message->msg_name == Auth::user()->name)
				    <div class="col-lg-8 col-md-8 col-sm-12 mb-4" style="float:left;display:block;width:60% ">
				    	<div class="card card-small h-100">
		                  <div class="card-header border-bottom">
		                    <h6 class="m-0">{{$message->msg_name}}</h6>
		                  </div>
		                  <div class="card-body d-flex flex-column">
		                  	<p ><pre>{{$message->msg}}</pre></p>
		                  </div>
		                </div>
				    </div>
			@else 
				@php $name_to=$message->msg_name; @endphp   
				    <div class="col-lg-7 col-md-7 col-sm-12 mb-4" style="margin-left:40%;display:block;">
				    	<div class="card card-small h-100">
		                  <div class="card-header border-bottom">
		                    <h6 class="m-0">{{$message->msg_name}}</h6>
		                  </div>
		                  <div class="card-body d-flex flex-column">
		                  	<p><pre>{{$message->msg}}</pre></p>
		                  </div>
		                </div>
				    </div>	   
			@endif
	    	
	    @endforeach
    </div>
	<div class="row mb-4" style="width:100%;display:block;" >
		<div class="col-lg-12">
				<div class="form-row" style="display: none;">
	              <div class="form-group col-md-12">
	                <label for="msg">To</label>
	                <input type="text" class="form-control" name="name_to" id="name_to" value="{{$name_to}}" />
	              </div>
	            </div>
				<div class="form-row">
	              <div class="form-group col-md-12">
	                <label for="msg">Response</label>
	                <textarea class="form-control" name="msg" id="textMsg" cols="30" rows="10"></textarea>
	              </div>
	            </div>
				<button id="sendMsg"  class="btn btn-success">Send</button>
		</div>
	</div>
</div>

@endsection