
@extends('master.layoutMaster',[$projectsBySeasons,$projectsNumberByseasonsCat,'countPro'=>count($projects),$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])


@section('title','Dashboard')


@section('content')

<div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Overview</h3>
              </div>
            </div>
            <!-- End Page Header -->
            <!-- Small Stats Blocks -->
            <div class="row">
              <div class="col-lg col-md-4 col-sm-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Seasons</span>
                        <h6 class="stats-small__value count my-3">{{ $seasonsNum }}</h6>
                      </div>
                      {{-- <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                      </div> --}}
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Categories</span>
                        <h6 class="stats-small__value count my-3">{{ $categoiesNum }}</h6>
                      </div>
                      {{-- <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                      </div> --}}
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-4 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                  <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                      <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Projects</span>
                        <h6 class="stats-small__value count my-3">{{ $projectsNum }}</h6>
                      </div>
                      {{-- <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                      </div> --}}
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Small Stats Blocks -->
            <div class="row">
              <!-- Users Stats -->
              <div class="col-lg-8 col-md-12 col-sm-12 mb-4">
                <div class="card card-small">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Projects</h6>
                  </div>
                  <div class="card-body pt-0">
                    <div class="row border-bottom py-2 bg-light">
                      <div class="col-12 col-sm-6">
                        <div id="blog-overview-date-range" class="input-daterange input-group input-group-sm my-auto ml-auto mr-auto ml-sm-auto mr-sm-0" style="max-width: 350px;">
                          <select class="input-sm form-control" name="current" id="current" >
                            @foreach ($seasons as $key => $season)
                              @if ($key === count($seasons) -1 )
                                <option value="current_{{$season->id}}" selected="">Season {{$season->name}}</option>
                              @else
                                <option value="current_{{$season->id}}">Season {{$season->name}}</option>
                              @endif
                            @endforeach
                          </select>
                          <select class="input-sm form-control" name="past" id="past" >
                            @foreach ($seasons as $key => $season)
                              @if ($key === count($seasons) -2 )
                                <option value="past_{{$season->id}}" selected="">Season {{$season->name}}</option>
                              @else
                                <option value="past_{{$season->id}}">Season {{$season->name}}</option>
                              @endif
                            @endforeach
                          </select>

                          
                        </div>
                      </div>
                    </div>
                    <canvas height="130" style="max-width: 100% !important;" id="blog-overview-users" class="blog-overview-users"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Projects by Seasons</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                 
                </div>
              </div>
              <!-- End Users By Device Stats -->
              <!-- New Draft Component -->
              <div class="col-lg-5 col-md-6 col-sm-12 mb-4">
                <!-- Quick Post -->
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">TO-DO List</h6>
                  </div>
                  <div class="card-body d-flex flex-column">
                    <table class="table mb-0 table-responsive" style="height:70%;  ">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0" style="width:100%">Task</th>
                          <th scope="col" class="border-0">Done</th>
                          <th scope="col" class="border-0">Delete</th>
                        </tr>
                      </thead>
                      <tbody id="list_body">
                        @foreach ($list as $element)
                            <tr>
                              @if ($element->list_checked)
                                <td style="" class="TDchecked">{{$element->list_msg}}</td>
                                <td> <input type="checkbox" id="{{$element->id}}" value="{{$element->id}}" name="msg_check" class="msg_check" checked=""> </td>
                              @else
                                <td>{{$element->list_msg}}</td>
                                <td> <input style="cursor:pointer;" type="checkbox" id="{{$element->id}}" value="{{$element->id}}" name="msg_check" class="msg_check" > </td>
                              @endif
                              <td ><a style="cursor:pointer;" id="{{$element->id}}" class="task_delete text-danger" ><i class="material-icons">clear</i></a></td>
                          </tr>  
                        @endforeach
                      </tbody>
                    </table>
                    <div class="dropdown-divider"></div>
                    {{-- <form class="quick-post-form"> --}}
                      <div class="form-group">
                        <input type="text" class="form-control" id="task_inp" aria-describedby="emailHelp" placeholder="New Task"> 
                      </div>
                      <div class="form-group mb-0">
                        <button id="add_task" style="" type="" class="btn btn-accent">Create Task</button>
                      </div>
                    {{-- </form> --}}
                  </div>
                </div>
                <!-- End Quick Post -->
              </div>
              <!-- End New Draft Component -->
              <!-- Discussions Component -->
              <div class="col-lg-7 col-md-12 col-sm-12 mb-4">
                <div class="card card-small blog-comments">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Orders</h6>
                  </div>
                  <div class="card-body p-0">
                    @for ($i=1;$i<4;$i++)
                      @php $index=count($projects)-$i @endphp
                      <div class="blog-comments__item d-flex p-3">
                        <div class="blog-comments__avatar mr-3">
                          <img src="{{ asset("images/".$projects[$index]->pro_photo) }} " alt="{{$projects[$index]->pro_photo}}" /> </div>
                        <div class="blog-comments__content">
                          <div class="blog-comments__meta text-muted">
                            <a class="text-secondary" href="/home/project/{{$projects[$index]->id}}">{{$projects[$index]->pro_name}}</a> 
                            <span class="text-muted">– {{getDifferenceDate($projects[$index]->created_at,date('Y-m-d H:i:s') ) }}</span>
                          </div>
                          <p class="m-0 my-1 mb-2 text-muted">{{ substr($projects[$index]->pro_desc,0,55) }} ...</p>
                          <div class="blog-comments__actions">
                            <div class="btn-group btn-group-sm">
                              <a href="/home/project/{{$projects[$index]->id}}" class="btn btn-white">
                                <span class="text-success">
                                  <i class="material-icons">check</i>
                                </span> Approve </a>
                              {{-- <button type="button" class="btn btn-white">
                                <span class="text-danger">
                                  <i class="material-icons">clear</i>
                                </span> Reject </button> --}}
                            </div>
                          </div>
                        </div>
                      </div>
                    @endfor
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col text-center view-report">
                        <a href="/home/projects" class="btn btn-white">View All Projects</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection


