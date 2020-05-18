<!DOCTYPE HTML>

<html>
	<head>
		<title>@yield("title","Tamayouz Competition")</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
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
						      {{-- <a href="/projects/Software">Season 1</a>
						      <a href="/projects/Networks">Season 2</a>
						      <a href="/projects/Hardware">Season 3</a> --}}
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
					
					{{-- <h3>Add Project</h3>
					@include('flashMsg')
					<form action="/addProject" method="post">
						
						@csrf
						
						<div class="field half first">
							<label for="pro_name">Project Name</label>
							<input name="pro_name" id="pro_name" type="text" placeholder="Project Name" required="">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="pro_email" id="email" type="email" placeholder="Email" required="">
						</div>
						<div class="field">
							<label for="students">Students</label>
							<textarea name="stud_name" id="students" required="" rows="6" placeholder=" example : Ahmad , Aziz , Mahmoud  ..."></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Project" class="button alt" type="submit"></li>
						</ul>
					</form> --}}
					
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
				 // Add smooth scrolling to all links in navbar + footer link
				  $("footer a.Started").on('click', function(event) {

				    // Make sure this.hash has a value before overriding default behavior
				    if (this.hash !== "") {

				      // Prevent default anchor click behavior
				      event.preventDefault();

				      // Store hash
				      var hash = this.hash;

				      // Using jQuery's animate() method to add smooth page scroll
				      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
				      $('html, body').animate({
				        scrollTop: $(hash).offset().top
				      }, 900, function(){
				   
				        // Add hash (#) to URL when done scrolling (default click behavior)
				        window.location.hash = hash;
				      });
				    } // End if
				  });

				function openForm() {
				  document.getElementById("myForm").style.display = "block";
				}

				function closeForm() {
				  document.getElementById("myForm").style.display = "none";
				}

					
			</script>
			
		
	</body>
</html>




