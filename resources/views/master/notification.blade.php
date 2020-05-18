@extends('master.layoutMaster',[$notifications,$countUnShowNoty,'image'=>$userImage,'role'=>$role])

@section('content')

<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
    <div class="page-header row no-gutters py-4">
      <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Overview</span>
        <h3 class="page-title">Notifications</h3>
      </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
      <div class="col">
        <div class="card card-small mb-4">
          <div class="card-header border-bottom">
            <h6 class="m-0">All Notifications</h6>
          </div>
          <div class="card-body p-0 pb-3 text-center">
            <table class="table mb-0">
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="border-0">#</th>
                  <th scope="col" class="border-0">Message</th>
                  <th scope="col" class="border-0">Type</th>
                  <th scope="col" class="border-0">Date</th>
                </tr>
              </thead>
              <tbody>
              	@foreach ($notifications as $key=>$notification)
              		@php $type_parts=explode('_',$notification->noty_type ); @endphp
              		<tr>
	                  <td>{{ $key }}</td>
	                  @if ($type_parts[0] === 'project')
	                  	<td><a href="/home/project/{{ $type_parts[1] }}">{{ $notification->noty_msg }}</a></td>
	                  @else
	                  	<td><a href="/home/messages/{{ $type_parts[1] }}">{{ $notification->noty_msg }}</a></td>
	                  @endif
	                  <td>{{ $type_parts[0] }}</td>
	                  <td>{{ $notification->created_at }}</td>
	                </tr>	
              	@endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End Default Light Table -->
</div>

@endsection