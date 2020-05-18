<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Tamayouz Competition- @yield("title","Profile")</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href={{ asset('assestMaster/styles/shards-dashboards.1.1.0.min.css') }}>
    <link rel="stylesheet"  href={{ asset('assestMaster/styles/jquery-ui.min.css') }}>
    <link rel="stylesheet" href={{ asset('assestMaster/styles/extras.1.1.0.min.css') }}>
    <link rel="stylesheet" href={{ asset('css/master_style.css') }}>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
              <a class="navbar-brand w-100 mr-0" href="/" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src={{ asset('assestMaster/images/shards-dashboards-logo-success.svg') }} alt="Shards Dashboard">
                  <span class="d-none d-md-inline ml-1">HomePage</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <div class="input-group-prepend">
                <div class="input-group-text">
                  <i class="fas fa-search"></i>
                </div>
              </div>
              <input class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
          </form>
          @php
            $home=null;$dashboard=null;$project=null;$addProject=null;$sitting=null;
            $titleActive=Request::segment(2);
            if(!$titleActive)
              $titleActive=Request::segment(1);
            switch($titleActive){
              case('dashboard'):
                $dashboard='active';
              break;
              case('home'):case('homeManager'):case('homeStudent'):
                $home='active';
              break;
              case('projects'):case('project'):
                $project='active';
              break;
              case('projectAdd'):
                $addProject='active';
              break;
              default:
                $sitting='active';
            }

          @endphp
          <div class="nav-wrapper">
            @if ($role == 'Admin')
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link {{$dashboard}}" href="/dashboard">
                    <i class="material-icons">edit</i>
                    <span> Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$home}}" href="/home">
                    <i class="material-icons">&#xE7FD;</i>
                    <span> Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$project}}" href="/home/projects">
                    <i class="material-icons">vertical_split</i>
                    <span>Projects</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$addProject}}" href="/home/projectAdd">
                    <i class="material-icons">note_add</i>
                    <span>Add New Project</span>
                  </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{$sitting}} dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >
                        <i style="margin-left:10px;" class="fa fa-cog" aria-hidden="true"></i>
                        <span class="d-none d-md-inline-block">Sittings</span>
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-small">
                      <a class="dropdown-item " href="/home/showUsers">
                        <i class="material-icons">&#xE7FD;</i> Users</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/home/showSeasons">
                        <i class="fa fa-list-ul" aria-hidden="true"></i> Seasons</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/home/showCategories">
                        <i class="fa fa-braille" aria-hidden="true"></i> Categories</a>
                    </div>

                </li>
              </ul>  
            @elseif($role == 'manager')
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link {{$dashboard}}" href="/homeManager/dashboard">
                    <i class="material-icons">edit</i>
                    <span> Dashboard</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$home}}" href="/homeManager">
                    <i class="material-icons">&#xE7FD;</i>
                    <span> Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$project}}" href="/homeManager/projects">
                    <i class="material-icons">vertical_split</i>
                    <span>Projects</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$addProject}}" href="/homeManager/projectAdd">
                    <i class="material-icons">note_add</i>
                    <span>Add New Project</span>
                  </a>
                </li>

              </ul>
            @else 
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link {{$home}}" href="/homeStudent">
                    <i class="material-icons">&#xE7FD;</i>
                    <span> Profile</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{$project}}" href="/homeStudent/project">
                    <i class="material-icons">vertical_split</i>
                    <span>My Project</span>
                  </a>
                </li>
              </ul> 
            @endif
            
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              @if ($role == 'Admin')
              <form action="/home/search_project" method="post" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
              @elseif($role == 'manager')
              <form action="/homeManager/search_project" method="post" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
              @endif  
                @csrf
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input name="inp_search" class="navbar-search form-control" type="text" placeholder="Search for something..." aria-label="Search"> </div>
              </form>
              <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item border-right dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons">&#xE7F4;</i>
                      @if ($countUnShowNoty)
                        <span id="countUnShowNoty" class="badge badge-pill badge-danger">{{$countUnShowNoty ?? ''}}</span>
                      @endif
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    @foreach ($notifications as $noty)
                        @php $getType=explode('_', $noty->noty_type) @endphp
                      @if ($getType[0]=='project')
                          <a id="{{$noty->id}}" class="noty dropdown-item @if(!$noty->noty_show) UNshow @endif" href="/home/project/{{ $getType[1] }}">
                            <div class="notification__icon-wrapper">
                              <div class="notification__icon">
                                <i class="material-icons">&#xE6E1;</i>
                              </div>
                            </div>
                            <div class="notification__content">
                              <span class="notification__category">Projects</span>
                              <p>{{ $noty->noty_msg }}
                                <span class="text-success text-semibold" style="padding:5px "> {{$noty->created_at}}</span></p>
                            </div>
                          </a>    
                      @else
                          <a id="{{$noty->id}}" class="noty dropdown-item @if(!$noty->noty_show) UNshow @endif" href="/home/messages/{{ $getType[1] }}">
                            <div class="notification__icon-wrapper">
                              <div class="notification__icon">
                                <i class="material-icons">&#xE8D1;</i>
                              </div>
                            </div>
                            <div class="notification__content">
                              <span class="notification__category">Message</span>
                              <p>{{ $noty->noty_msg }}
                                <span class="text-danger text-semibold" style="padding:5px">{{$noty->created_at}}</span></p>
                            </div>
                          </a>
                      @endif
                    @endforeach
                    @if ($role == 'Admin')
                      <a class="dropdown-item notification__all text-center" href="/home/notifications"> View all Notifications </a>
                    @elseif($role == 'manager')
                      <a class="dropdown-item notification__all text-center" href="/homeManager/notifications"> View all Notifications </a>
                    @endif  
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src={{ asset('images/'.$image) }} alt="User Avatar">
                    <span class="d-none d-md-inline-block">{{ Auth::user()->name }}</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item" href="/home">
                      <i class="material-icons">&#xE7FD;</i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                      <i class="material-icons text-danger">&#xE879;</i>  {{ __('Logout') }} </a>
                      {{-- form for logout --}}
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                      </form>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          


          @yield("content")



          <footer class="main-footer d-flex p-2 px-3 bg-white border-top">
            
            <span class="copyright ml-auto my-auto mr-2">Copyright © 2019
              <a href="" rel="nofollow">Tamayouz</a>
            </span>
          </footer>
        </main>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src={{ asset('assestMaster/scripts/extras.1.1.0.min.js') }}></script>
    <script src={{ asset('assestMaster/scripts/shards-dashboards.1.1.0.min.js') }}></script>
    <script src={{ asset('assestMaster/scripts/app/app-blog-overview.1.1.0.js') }}></script>
    <script src={{ asset('assestMaster/scripts/jquery-ui.min.js') }}></script>


    <script>

       $( function() {
          $( "#accordion" ).accordion({
            heightStyle: "content",
            collapsible: true
          });
        } );
       
       //ajax for update user
       $('a.btnModal').click(function(){
          var element=this.id;
          $('input.user_id').val(element);
          $('input#user_id_update').val(element);
          $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
          $.ajax({
               type:'POST',
               url:"{{ url('/ajaxgetdataUPdate') }}", 
               data:{id:element},
               success:function(data){
                var parts=data.user.name.split(' ');
                  $('#first_name').val(parts[0]);
                  $('#last_name').val(parts[1]);
                  $('#email').val(data.user.email);
                  $('#address').val(data.details.address);
                  $('#phone').val(data.details.phone);
                  $('#Linked').val(data.details.linked);
                  $('#role').val(data.details.role);
                  $('#desc').val(data.details.desc);
                }
            });

       });

       //ajax for update season
       $('a.seasonModal').click(function(){
          var element=this.id;
          $('input.season_id').val(element);
          $('input#season_id_update').val(element);
          $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
          $.ajax({
               type:'POST',
               url:"{{ url('/ajaxSeasonDataUPdate') }}", 
               data:{id:element},
               success:function(data){
                  $('#season_name').val(data.season.name);
                  $('#manager').val(data.user.name);
                  $('#season_desc').val(data.season.desc);
                }
            });

       });


       //ajax for update category
       $('a.categoryModal').click(function(){
          var element=this.id;
          $('input.category_id').val(element);
          $('input#category_id_update').val(element);
          $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
          $.ajax({
               type:'POST',
               url:"{{ url('/ajaxCategoryDataUPdate') }}", 
               data:{id:element},
               success:function(data){
                  $('#en_category').val(data.category.cat_en);
                  $('#ar_category').val(data.category.cat_ar);
                  $('#cat_desc').val(data.category.cat_desc);
                }
            });

       });


      //for count the notification that show it
      var i=0;
      $('a.noty').click(function(){
        var element=this.id;
       $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
               type:'POST',
               url:"{{ url('/ajaxShowNoty') }}", 
               data:{id:element},
               success:function(data){
                var countUnShowNoty = {!! json_encode($countUnShowNoty ?? '') !!};
                if(data.last.noty_show){
                  $('a#'+data.last.id).removeAttr('class');
                  $('a#'+data.last.id).attr('class','noty dropdown-item');
                  i+=1;
                  $('span#countUnShowNoty').html(countUnShowNoty - i );
                  if(countUnShowNoty - i == 0)
                    $('span#countUnShowNoty').remove();
                  } 
                
                }
            });
     });



     //for add message
     $('button#sendMsg').click(function(){
      var name_to=$('input#name_to').val();
      var message=$('textarea#textMsg').val();
      $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
      $.ajax({
               type:'POST',
               url:"{{ url('/ajaxAddMsg') }}", 
               data:{msg:message,name_to:name_to},
               success:function(data){
                 $('div.chat').append(" <div class=\"col-lg-8 col-md-8 col-sm-12 mb-4\" style=\"float:left;display:block;width:60% \">"+
                                          "<div class=\"card card-small h-100\">"+
                                                  "<div class=\"card-header border-bottom\">"+
                                                    "<h6 class=\"m-0\">"+data.msg_name+"</h6>"+
                                                  "</div>"+
                                                  "<div class=\"card-body d-flex flex-column\">"+
                                                    "<p ><pre>"+data.msg+"</pre></p>"+
                                                  "</div>"+
                                                "</div>"+
                                        "</div>" );
                 $('textarea#textMsg').val('');
                }
            });
     }); 

     $('input[type=radio][name=video_type]').change(function() {
          
          var type=this.id;
          //alert(this.value);
          if(type == 'radio_load')
          {
            $('.v_load').show();
            $('.v_link').hide();
          }
          else{
            $('.v_load').hide();
            $('.v_link').show();
          }

          // $.ajax({
         //       type:'POST',
         //       url:"{{ url('') }}", /ajaxVideoType
         //       data:{type:type},
         //       success:function(data){
         //          alert(data.video_type);
         //       }
         //    });
            
      });


    //ajax for add task
     $('#add_task').click(function() {
      var element=$('#task_inp').val();
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
               type:'POST',
               url:"{{ url('/ajaxAddTask') }}", 
               data:{inp:element},
               success:function(data){
                  $('#list_body').append( "<tr>"+
                                            "<td>"+data.last.list_msg+"</td>"+
                                            "<td><input style=\"cursor:pointer;\" type=\"checkbox\" id=\""+data.last.id+"\" value=\""+data.last.id+"\" name=\"msg_check\" class=\"msg_check\" ></td>"+
                                            "<td> <a  style=\"cursor:pointer;\" id=\""+data.last.id+"\" class=\"task_delete text-danger\" ><i class=\"material-icons\">clear</i></a> </td>"+
                                          "</tr>" );
                  $('#task_inp').val('');
                }
            });
      
    }); 

    //ajax for delete task
     $('.task_delete').click(function() {
       var element=this.id;
       alert('done1');
       $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
               type:'POST',
               url:"{{ url('/ajaxDeleteTask') }}", 
               data:{id:element},
               success:function(data){
                alert('done2');
                $('a#'+data.last).parent().parent().empty()
                
                }
            });
     });


     //ajax for done task
     $('.msg_check').click(function() {
       var element=this.value;
       $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
               type:'POST',
               url:"{{ url('/ajaxDoneTask') }}", 
               data:{id:element},
               success:function(data){
                  if(data.check){

                    //$('input#'+data.last).parent().prev().css('text-decoration','line-through');
                    $('input#'+data.last).parent().prev().attr('class','TDchecked');
                  }else{
                    //$('input#'+data.last).parent().prev().css('text-decoration','none');
                    $('input#'+data.last).parent().prev().removeAttr('class','TDchecked');
                  }
                }
            });
     });
     


    //
    // Blog Overview Users
    //

    // get all data from controller
    var projectsNumberByseasonsCat = {!! json_encode($projectsNumberByseasonsCat ?? '') !!};
    // get count of seasons
    var countSeasons=projectsNumberByseasonsCat.length;
    // get count of categories
    if(countSeasons){
      var countCategories=projectsNumberByseasonsCat[0].length;
    }
    else{ 
      var countCategories=0; }
    //get count of projects for every category in past season 
    if(countSeasons > 1){
      var projectsBycat2=new Array();
       for(var i=0;i<countCategories;i++){
        projectsBycat2[i]=projectsNumberByseasonsCat[ countSeasons - 2 ][i][1];   
      }
    }
   // if(projectsBycat2)
     // alert(projectsBycat2);
    //get count of projects for every category in current season 
    var projectsBycat3=new Array();
     for(var i=0;i<countCategories;i++){
      projectsBycat3[i]=projectsNumberByseasonsCat[ countSeasons - 1 ][i][1];   
    }
   // alert(projectsBycat3);

   //get count of projects for y Axes
   var countProjects={!! json_encode($countPro ?? '') !!};

  


    var bouCtx = document.getElementsByClassName('blog-overview-users')[0];
    //var bouCtx = document.getElementById('blog-overview-users');

    // Data
    var bouData = {
      // Generate the days labels on the X axis.
      // in our project get lables from categories
      labels: Array.from(projectsNumberByseasonsCat[0], function (_, i) {
        //return i === 0 ? 1 : i;
        return projectsNumberByseasonsCat[0][i][0]; 
      }),
      datasets: [{
        label: 'Current Season',
        fill: 'start',
        data: projectsBycat3,
        backgroundColor: 'rgba(0,123,255,0.1)',
        borderColor: 'rgba(0,123,255,1)',
        pointBackgroundColor: '#ffffff',
        pointHoverBackgroundColor: 'rgb(0,123,255)',
        borderWidth: 1.5,
        pointRadius: 0,
        pointHoverRadius: 3
      },
       {
        label: 'Past Season',
        fill: 'start',
        data: projectsBycat2,
        backgroundColor: 'rgba(255,65,105,0.1)',
        borderColor: 'rgba(255,65,105,1)',
        pointBackgroundColor: '#ffffff',
        pointHoverBackgroundColor: 'rgba(255,65,105,1)',
        borderDash: [3, 3],
        borderWidth: 1,
        pointRadius: 0,
        pointHoverRadius: 2,
        pointBorderColor: 'rgba(255,65,105,1)'
      }]
    };

    // Options
    var bouOptions = {
      responsive: true,
      legend: {
        position: 'top'
      },
      elements: {
        line: {
          // A higher value makes the line look skewed at this ratio.
          tension: 0.3
        },
        point: {
          radius: 0
        }
      },
      scales: {
        xAxes: [{
          gridLines: false,
          ticks: {
            callback: function (tick, index) {
              // Jump every 7 values on the X axis labels to avoid clutter.
              return tick;
              //return index % 7 !== 0 ? '' : tick;
            }
          }
        }],
        yAxes: [{
          ticks: {
            suggestedMax: countProjects,
            callback: function (tick, index, ticks) {
              if (tick === 0) {
                return tick;
              }
              // Format the amounts using Ks for thousands.
              return tick;
              //return tick > 999 ? (tick/ 1000).toFixed(1) + 'K' : tick;
            }
          }
        }]
      },
      // Uncomment the next lines in order to disable the animations.
      // animation: {
      //   duration: 0
      // },
      hover: {
        mode: 'nearest',
        intersect: false
      },
      tooltips: {
        custom: false,
        mode: 'nearest',
        intersect: false
      }
    };

    // Generate the Analytics Overview chart.
    window.BlogOverviewUsers = new Chart(bouCtx, {
      type: 'LineWithLine',
      data: bouData,
      options: bouOptions
    });

    // Hide initially the first and last analytics overview chart points.
    // They can still be triggered on hover.
    var aocMeta = BlogOverviewUsers.getDatasetMeta(0);
    aocMeta.data[0]._model.radius = 0;
    aocMeta.data[bouData.datasets[0].data.length - 1]._model.radius = 0;

    // Render the chart.
    window.BlogOverviewUsers.render();





    //
    // Users by device pie chart
    //
    var role = {!! json_encode($role ?? '') !!};
    if(role == 'Admin'){
    // get all projects by seasons
    var projectsBySeasons = {!! json_encode($projectsBySeasons ?? '') !!};
    // get lengrh of seasons
    var seasonsLength=projectsBySeasons.length;
    // calculate total of all projects
    if(projectsBySeasons.length > 1){
    var totalProjects=projectsBySeasons[0][1]+projectsBySeasons[1][1]+projectsBySeasons[2][1];
    }
    // get number of projects for every season 
    var numberProjectsBySeason=new Array();
    for(var i=0;i<seasonsLength;i++){
      numberProjectsBySeason[i]=projectsBySeasons[i][1] ;
    }

    // get the name of every season
    var nameSeason=new Array();
    for(var i=0;i<seasonsLength;i++){
      nameSeason[i]="Season"+projectsBySeasons[i][0] ;   
    }

    //get colors for all seasons
    function getRndInteger(min, max) {
      return Math.floor(Math.random() * (max - min) ) + min;
    }
    var colorSeason=new Array();
    for(var i=0;i<seasonsLength;i++){
      colorSeason[i]='rgba('+getRndInteger(0,255)+','+getRndInteger(0,255)+','+getRndInteger(0,255)+',0.5)';   
    }
    // Data
    var ubdData = {
      datasets: [{
        hoverBorderColor: '#ffffff',
        data: numberProjectsBySeason,
        backgroundColor: colorSeason
      }],
      labels: nameSeason
    };

    // Options
    var ubdOptions = {
      legend: {
        position: 'bottom',
        labels: {
          padding: 25,
          boxWidth: 20
        }
      },
      cutoutPercentage: 0,
      // Uncomment the following line in order to disable the animations.
      // animation: false,
      tooltips: {
        custom: false,
        mode: 'index',
        position: 'nearest'
      }
    };

    var ubdCtx = document.getElementsByClassName('blog-users-by-device')[0];

    // Generate the users by device chart.
    window.ubdChart = new Chart(ubdCtx, {
      type: 'pie',
      data: ubdData,
      options: ubdOptions
    });



}

if(role == 'Admin'){
    //ajax for chart
     $('select').change(function() {
      var element=this.value;
      var parts=element.split('_');
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
        $.ajax({
               type:'POST',
               url:"{{ url('/ajaxProjectCat') }}", 
               data:{key:parts[1]},
               success:function(data){
                  if(parts[0]==='current'){
                    for(var i=0;i<countCategories;i++){
                      projectsBycat3[i]=data.projectsNumberByseasonsCat[i][1];   
                    }  
                  }
                  else{
                    for(var i=0;i<countCategories;i++){
                      projectsBycat2[i]=data.projectsNumberByseasonsCat[i][1];   
                    }
                  }
                  window.BlogOverviewUsers.update();
               }
            });
      
    });


}


     

</script>





  </body>
</html>