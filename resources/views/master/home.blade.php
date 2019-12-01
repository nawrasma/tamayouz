
@extends('master.layoutMaster')

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
                        <span class="stats-small__label text-uppercase">Software Projects</span>
                        <h6 class="stats-small__value count my-3">2,390</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">4.7%</span>
                      </div>
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
                        <span class="stats-small__label text-uppercase">Networks Projects</span>
                        <h6 class="stats-small__value count my-3">182</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--increase">12.4%</span>
                      </div>
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
                        <span class="stats-small__label text-uppercase">Hardware Projects</span>
                        <h6 class="stats-small__value count my-3">2,147</h6>
                      </div>
                      <div class="stats-small__data">
                        <span class="stats-small__percentage stats-small__percentage--decrease">3.8%</span>
                      </div>
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
                          <input type="text" class="input-sm form-control" name="start" placeholder="Start Date" id="blog-overview-date-range-1">
                          <input type="text" class="input-sm form-control" name="end" placeholder="End Date" id="blog-overview-date-range-2">
                          <span class="input-group-append">
                            <span class="input-group-text">
                              <i class="material-icons"></i>
                            </span>
                          </span>
                        </div>
                      </div>
                    </div>
                    <canvas height="130" style="max-width: 100% !important;" class="blog-overview-users"></canvas>
                  </div>
                </div>
              </div>
              <!-- End Users Stats -->
              <!-- Users By Device Stats -->
              <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-small h-100">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Projects by Domain</h6>
                  </div>
                  <div class="card-body d-flex py-0">
                    <canvas height="220" class="blog-users-by-device m-auto"></canvas>
                  </div>
                  <!-- <div class="card-footer border-top">
                    <div class="row">
                      <div class="col">
                        <select class="custom-select custom-select-sm" style="max-width: 130px;">
                          <option selected>Last Week</option>
                          <option value="1">Today</option>
                          <option value="2">Last Month</option>
                          <option value="3">Last Year</option>
                        </select>
                      </div>
                      <div class="col text-right view-report">
                        <a href="#">Full report &rarr;</a>
                      </div>
                    </div>
                  </div> -->
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
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">Task</th>
                          <th scope="col" class="border-0">Edit</th>
                          <th scope="col" class="border-0">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>KerryKerryKerryKerryKerryKerry</td>
                          <td> <a href=""> <i class="material-icons">edit</i> </a> </td>
                          <td ><a href="" class="text-danger" ><i class="material-icons">clear</i></a></td>
                        </tr>
                        <tr>
                          <td>KerryKerryKerryKerryKerryKerry</td>
                          <td> <a href=""> <i class="material-icons">edit</i> </a> </td>
                          <td ><a href="" class="text-danger" ><i class="material-icons">clear</i></a></td>
                        </tr>
                        <tr>
                          <td>KerryKerryKerryKerryKerryKerry</td>
                          <td> <a href=""> <i class="material-icons">edit</i> </a> </td>
                          <td ><a href="" class="text-danger" ><i class="material-icons">clear</i></a></td>
                        </tr>
                        <tr>
                          <td>KerryKerryKerryKerryKerryKerry</td>
                          <td> <a href=""> <i class="material-icons">edit</i> </a> </td>
                          <td ><a href="" class="text-danger" ><i class="material-icons">clear</i></a></td>
                        </tr>
                      </tbody>
                    </table>
                    <div class="dropdown-divider"></div>
                    <form class="quick-post-form">
                      <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="New Task"> 
                      </div>
                      <div class="form-group mb-0">
                        <button type="submit" class="btn btn-accent">Create Task</button>
                      </div>
                    </form>
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
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <img src={{ asset('assestMaster/images/avatars/1.jpg') }} alt="User avatar" /> </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="#">James Johnson</a> on
                          <a class="text-secondary" href="#">Hello World!</a>
                          <span class="text-muted">– 3 days ago</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">Well, the way they make shows is, they make one show ...</p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white">
                              <span class="text-success">
                                <i class="material-icons">check</i>
                              </span> Approve </button>
                            <button type="button" class="btn btn-white">
                              <span class="text-danger">
                                <i class="material-icons">clear</i>
                              </span> Reject </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <img src={{ asset('assestMaster/images/avatars/2.jpg') }} alt="User avatar" /> </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="#">James Johnson</a> on
                          <a class="text-secondary" href="#">Hello World!</a>
                          <span class="text-muted">– 4 days ago</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">After the avalanche, it took us a week to climb out. Now...</p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white">
                              <span class="text-success">
                                <i class="material-icons">check</i>
                              </span> Approve </button>
                            <button type="button" class="btn btn-white">
                              <span class="text-danger">
                                <i class="material-icons">clear</i>
                              </span> Reject </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="blog-comments__item d-flex p-3">
                      <div class="blog-comments__avatar mr-3">
                        <img src={{ asset('assestMaster/images/avatars/3.jpg') }} alt="User avatar" /> </div>
                      <div class="blog-comments__content">
                        <div class="blog-comments__meta text-muted">
                          <a class="text-secondary" href="#">James Johnson</a> on
                          <a class="text-secondary" href="#">Hello World!</a>
                          <span class="text-muted">– 5 days ago</span>
                        </div>
                        <p class="m-0 my-1 mb-2 text-muted">My money's in that office, right? If she start giving me...</p>
                        <div class="blog-comments__actions">
                          <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-white">
                              <span class="text-success">
                                <i class="material-icons">check</i>
                              </span> Approve </button>
                            <button type="button" class="btn btn-white">
                              <span class="text-danger">
                                <i class="material-icons">clear</i>
                              </span> Reject </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer border-top">
                    <div class="row">
                      <div class="col text-center view-report">
                        <button type="submit" class="btn btn-white">View All Orders</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

@endsection
