@extends("project.layoutProject")


@section('title','Add Project')
@section('subPage','subpage')


@section("content")


		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Tamayouz Competition</h2>
						<p>Aliquam erat volutpat nam dui </p>
					</header>

					<!-- Intro -->
					

					<hr class="major" />

					<!-- Content -->
						<h2 id="content">Add Project</h2>

						<div class="row">
{{-- 							<h3>{{ $sub_data['pro_name'] }}e</h3> --}}
						</div>
						<div class="row">
							<!-- <div class="6u 12u$(small)">
								
							</div> -->
							@include('flashMsg')
							@include('errors')
							<form class="contactForm"  method="post" action="/storeProject" enctype="multipart/form-data">
										<div class="row uniform">
											@csrf
											<div class="6u 12u$(xsmall)">
												<div class="select-wrapper">
													<select class="{{ $errors->has('pro_domain') ? 'danger' : '' }}" name="pro_domain" id="domain">
														<option value="">- Domain -</option>
														<option value="Software" {{ (old("pro_domain") == "Software" ? "selected":"") }}>
															Software</option>
														<option value="Networks" {{ (old("pro_domain") == "Networks" ? "selected":"") }}>
															Networks</option>
														<option value="Hardware" {{ (old("pro_domain") == "Hardware" ? "selected":"") }}>
															Hardware</option>
													</select>
												</div>	
											</div>
											<div class="6u 12u$(xsmall)">
												<div class="select-wrapper">
													<select class="{{ $errors->has('pro_type') ? 'danger' : '' }}" name="pro_type" id="type">
														<option value="">- Type -</option>
														<option value="AI" {{ (old("pro_type") == "AI" ? "selected":"") }}>
															AI</option>
														<option value="Web App" {{ (old("pro_type") == "Web App" ? "selected":"") }}>
															Web App</option>
														<option value="Descktop App" {{ (old("pro_type") == "Descktop App" ? "selected":"") }}>
															Descktop App</option>
														<option value="Mobile App" {{ (old("pro_type") == "Mobile App" ? "selected":"") }}>
															Mobile App</option>
														<option value="Smart Home" {{ (old("pro_type") == "Smart Home" ? "selected":"") }}>
															Smart Home</option>
														<option value="IOT" {{ (old("pro_type") == "IOT" ? "selected":"") }}>
															IOT</option>
														<option value="Industrial" {{ (old("pro_type") == "Industrial" ? "selected":"") }}>
															Industrial</option>
														<option value="Company" {{ (old("pro_type") == "Company" ? "selected":"") }}>
															Company</option>
														<option value="Mintor" {{ (old("pro_type") == "Mintor" ? "selected":"") }}>
															Mintor</option>		
													</select>
												</div>	
											</div>
											<!-- Break -->
											<div class="12u$">
												<label for="photo" >Load Photo</label>
												<input class="{{ $errors->has('pro_photo') ? 'danger' : '' }}" type="file" name="pro_photo" id="photo" value="{{ old('pro_photo') }}" placeholder="Load Photo" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<label for="video" >Load Video</label>
												<input class="{{ $errors->has('pro_video') ? 'danger' : '' }}" type="file" name="pro_video" id="video" accept="video" value="{{ old('pro_video') }}" placeholder="Load Video" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<label for="file" >Load File</label>
												<input class="{{ $errors->has('pro_file') ? 'danger' : '' }}" type="file" name="pro_file" id="file" value="{{ old('pro_file') }}" placeholder="Load File" />
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<input class="{{ $errors->has('super_name') ? 'danger' : '' }}" type="text" name="super_name" id="demo-name" value="{{ old('super_name') }}" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<textarea class="{{ $errors->has('pro_desc') ? 'danger' : '' }}" name="pro_desc" id="description" placeholder="Enter your description" rows="10">{{Request::old('pro_desc')}}</textarea>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													{{-- <li><input type="reset" value="Reset" class="alt" /></li> --}}
												</ul>
											</div>
											<div class="hideDiv">
												<input type="hidden" name="pro_name" value="{{ session('pro_name') }}">
												<input type="hidden" name="pro_email" value="{{ session('pro_email') }}">
												<input type="hidden" name="stud_name" value="{{ session('stud_name') }}">
											</div>
										</div>
									</form>
							
						</div>

					
				</div>

			</section>



@endsection