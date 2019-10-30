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
						<!-- <a href="index.html">Projects</a> -->
						<div class="dropdown">
						    <span class="dropbtn">Projects
						    </span>
						    <div id="myDropdown" class="dropdown-content">
						      <a href="/projects/Software">Software</a>
						      <a href="/projects/Networks">Networks</a>
						      <a href="/projects/Hardware">Hardware</a>
						    </div>
						 </div> 
						<a href="/about">About US</a>
						<a href="/contact">contact US</a>

						<span class="open-button" onclick="openForm()"><i class="fa fa-search"></i></span>
						<div class="form-popup" id="myForm">
						  <form action="/searchProject" method="post" class="form-container">
						  	@csrf
						  	<span type="submit" class="btn cancel" onclick="closeForm()">x</span>
						    <input type="search" placeholder="search Now" name="s" required>
						    <button type="submit" class="btn">search</button>
						    
						  </form>
						</div>


						<!-- <a href="generic.html">Generic</a>
						<a href="elements.html">Elements</a> -->
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
	</body>
</html>




