<!DOCTYPE HTML>

<html>
	<head>
		<title>@yield("title","Tamayouz Competition")</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}
		<link rel="stylesheet" href={{ asset('/css/main.css') }} />
	</head>
	<body  class="@yield('subPage','homepage')" >

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="/" class="logo"><strong>Tamayouz </strong> Competition</a>
					<nav id="nav">
						<a href="/">Home</a>
						<div class="dropdown">
						    <span class="dropbtn">Projects
						    </span>
						    <div id="myDropdown" class="dropdown-content">
						     	@foreach ($seasons as $element)
					    			<a href="/projects/{{ $element->id }}">Season {{ $element->name }}</a>		
						    	@endforeach
						    </div>
						 </div> 
						<a href="/about">About US</a>
						<a href="/contact">contact US</a>

						<span class="open-button" onclick="openForm()"><i class="fa fa-search"></i></span>
						<div class="form-popup" id="myForm">
						  <form action="searchProject" method="post" class="form-container">
						  	@csrf
						  	<span type="submit" class="btn cancel" onclick="closeForm()">x</span>
						    <input type="search" placeholder="search Now" name="s" required>
						    <button type="submit" class="btn">search</button>
						    
						  </form>
						</div>
						<nav id="rightNav">
						@if ( Auth::user() )
							{{-- <a href="/home">{{  Auth::user()->name }}</a> --}}
							<div class="dropdown">
						    	<span class="dropbtn">{{  Auth::user()->name }}</span>
						    	<div id="myDropdown" class="dropdown-content">
						    		<a class="dropdown-item" href="/home">
											<i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                      				<a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
					                      <i class="fa fa-sign-out" aria-hidden="true"></i>  {{ __('Logout') }} </a>
					                      {{-- form for logout --}}
					                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                                        @csrf
					                      </form>		
						    	</div>
							</div>
						@else	
							<a href="{{ route('login') }}">Login</a>
							<a href="{{ route('register') }}">Register</a>
						@endif
						<a href=""><i class="fa fa-language fa-2x" aria-hidden="true"></i></a>
						</nav>

					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>


			
			@yield("content")

			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<div class="copyright">
						&copy; Tamayouz Competition - Follow  <a href=""> <i class="icon fa-lg fa-facebook-square"></i> Tamayouz </a>.
					</div>

				</div>
			</footer>

		<!-- Scripts -->
			<script src={{ asset('js/jquery.min.js') }}></script>
			<script src={{ asset('js/skel.min.js') }}></script>
			<script src={{ asset('js/util.js') }}></script>
			<script src={{ asset('js/main.js') }}></script>
			<script>
				function openForm() {
				  document.getElementById("myForm").style.display = "block";
				}

				function closeForm() {
				  document.getElementById("myForm").style.display = "none";
				}
			</script>


			<script type="text/javascript">

		   // $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

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
		   
		</script>
	</body>
</html>




