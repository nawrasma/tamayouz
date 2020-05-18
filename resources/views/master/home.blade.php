
@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$details->user_img,'role'=>$details->type])

@section('title','Profile')

@section('content')
        {{-- @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <i class="fa fa-check mx-2"></i>
              <strong>Success!</strong> @include('flashMsg')  
        </div>
        @endif --}}
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">User Profile</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Default Light Table -->
            <div class="row">
              <div class="col-sm-12" >
                @include('flashMsg')
              </div>
              <div class="col-lg-4">
                <div class="card card-small mb-4 pt-3">
                  <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="{{ asset('images/'.$details->user_img) }}" alt="{{Auth::user()->name}}" width="110"> </div>
                    <h4 class="mb-0">{{Auth::user()->name}}</h4>
                    <span class="text-muted d-block mb-2">{{ $details->role }}</span>
                    <a href="{{$details->linked}}"  class="mb-2 btn btn-sm btn-pill btn-outline-primary mr-2" style="font-weight:bold;font-size:15px  ">
                      <i class="fab fa-linkedin mr-1"></i>Linkedin </a>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-4">
                      <div class="progress-wrapper">
                        <strong class="text-muted d-block mb-2"><i class="fas fa-map-marker-alt"></i> {{$details->address}}</strong>
                        <div class="">
                          <span><i class="fas fa-phone"></i> {{$details->phone}}</span>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Description</strong>
                      <span>{{$details->desc}}</span>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Account Details</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          @if ($details->type == 'Admin')
                            <form class="accounttForm"  method="post" action="/updateAccount" enctype="multipart/form-data">
                          @elseif($details->type == 'manager')
                             <form class="accounttForm"  method="post" action="/homeManager/updateAccount" enctype="multipart/form-data"> 
                          @else    
                            <form class="accounttForm"  method="post" action="/homeStudent/updateAccount" enctype="multipart/form-data"> 
                          @endif
                            @csrf
                            @method('PATCH')
                            {{! $name= explode(' ', Auth::user()->name) }}
                            <div class="form-row">
                              <div class="form-group @if(count($name) >1) col-md-6 @else col-md-12  @endif">
                                <label for="feFirstName">First Name</label>
                                <input type="text" class="form-control" id="feFirstName" name="firstName" placeholder="First Name" value="{{$name[0]}}"> </div>
                                @if (count($name) >1)
                                  <div class="form-group col-md-6">
                                    <label for="feLastName">Last Name</label>
                                    <input type="text" class="form-control" id="feLastName" name="lastName" placeholder="Last Name" value="{{$name[1]}}"> </div>
                                @endif
                              
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feEmailAddress">Email</label>
                                <input type="email" class="form-control" name="email" id="feEmailAddress" placeholder="Email" value="{{Auth::user()->email }}"> </div>
                              <div class="form-group col-md-6">
                                <label for="fePassword">Password</label>
                                <input type="password" class="form-control" name="password" id="fePassword" placeholder="Password"> </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="feInputAddress">Address</label>
                                  <input type="text" class="form-control" name="address" id="feInputAddress" placeholder="" value="{{$details->address}}">
                              </div>
                              <div class="form-group col-md-6">
                                  <label for="feInputPhone">Phone</label>
                                  <input type="text" class="form-control" name="phone" id="feInputPhone" placeholder="" value="{{$details->phone}}">
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="feInputLinked">Linkedin Link</label>
                                  <input type="text" class="form-control" name="linked" id="feInputLinked" placeholder="" value="{{$details->linked}}">
                              </div>
                              <div class="form-group col-md-6">
                                <label for="feInputPhoto">Image</label>
                                  <input type="file" class="form-control" name="image" id="feInputPhoto" placeholder="" value="">
                              </div>
                            </div> 
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="feDescription">Description</label>
                                <textarea class="form-control" name="desc" rows="5">{{$details->desc}}</textarea>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-accent">Update Account</button>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- End Default Light Table -->
          </div>



@endsection
