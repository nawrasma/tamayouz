@extends("project.layoutProject",$seasons)


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
						{{-- <h2 id="content">Add Project</h2> --}}
						<div class="row">
							@include('flashMsg')
							@include('errors')
							<form class="contactForm"  method="post" action="/storeProject" enctype="multipart/form-data">
										@csrf
										<h3 style="display: block;color:#222;font-weight:bold;">User Information</h3>
										<hr  style="background-color:#6cc091;color:#6cc091;font-size:15px;border:none;height:1px;margin-top:-35px " />
										@csrf
										<div class="row uniform">
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="role" >Name of position</label>
												<input class="{{ $errors->has('role') ? 'danger' : '' }}" type="text" name="role" id="role" value="{{ old('role') }}" placeholder="Name of position" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="user_photo" >Personal Photo</label>
												<input class="{{ $errors->has('user_photo') ? 'danger' : '' }}" type="file" name="user_photo" id="user_photo" value="{{ old('user_photo') }}" placeholder="Load Photo" />
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="user_phone" >PHone</label>
												<input class="{{ $errors->has('user_phone') ? 'danger' : '' }}" type="text" name="user_phone" id="user_phone" value="{{ old('user_phone') }}" placeholder="Your phone" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="user_address" >Address</label>
												<input class="{{ $errors->has('user_address') ? 'danger' : '' }}" type="text" name="user_address" id="user_address" value="{{ old('user_address') }}" placeholder="Your Address" />
											</div>
											<!-- Break -->
											<div class=" 12u$">
												<label for="user_linkedin" >Linkedin Link</label>
												<input class="{{ $errors->has('user_linkedin') ? 'danger' : '' }}" type="text" name="user_linkedin" id="user_linkedin"  value="{{ old('user_linkedin') }}" placeholder="Put Linkedin Link" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<label for="desc" >About You</label>
												<textarea class="{{ $errors->has('user_desc') ? 'danger' : '' }}" name="user_desc" id="desc" placeholder="Enter your description About you" rows="10">{{Request::old('user_desc')}}</textarea>
											</div>
											<!-- Break -->
										</div>

										

										<h3 style="display:block;margin-top:100px;color:#222;font-weight:bold;    ">Project Information</h3>
										<hr  style="background-color:#6cc091;color:#6cc091;font-size:15px;border:none;height:1px;margin-top:-35px " />
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<label for="pro_name">Project Name</label>
												<input class="{{ $errors->has('pro_name') ? 'danger' : '' }}" name="pro_name" id="pro_name" type="text" placeholder="Project Name" value="{{ old('pro_name') }}" >
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="email">Email</label>
												<input class="{{ $errors->has('pro_email') ? 'danger' : '' }}" name="pro_email" id="email" type="email" placeholder="Email"  value="{{ old('pro_email') }}" >
											</div>
											<div class="12u$">
												<label for="students">Students</label>
												<textarea class="{{ $errors->has('stud_name') ? 'danger' : '' }}" name="stud_name" id="students"  rows="2" placeholder=" example : Ahmad , Aziz , Mahmoud  ...">{{Request::old('stud_name')}}</textarea>
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="domain" >Category</label>
												<div class="select-wrapper">
													<select class="{{ $errors->has('pro_domain') ? 'danger' : '' }}" name="pro_domain" id="domain">
														<option value="">- Category -</option>
														<option value="Mechatronics" {{ (old("pro_domain") == "Mechatronics" ? "selected":"") }}>
															Mechatronics</option>
														<option value="Computers & Automation" {{ (old("pro_domain") == "Computers & Automation" ? "selected":"") }}>
															Computers & Automation</option>
														<option value="Electron" {{ (old("pro_domain") == "Electron" ? "selected":"") }}>
															Electron</option>
														<option value="Telecommunation" {{ (old("pro_domain") == "Telecommunation" ? "selected":"") }}>
															Telecommunation</option>
														<option value="Industrial Control" {{ (old("pro_domain") == "Industrial Control" ? "selected":"") }}>
															Industrial Control</option>
														<option value="Mechanics" {{ (old("pro_domain") == "Mechanics" ? "selected":"") }}>
															Mechanics</option>
														<option value="Informatics" {{ (old("pro_domain") == "Informatics" ? "selected":"") }}>
															Informatics</option>
														<option value="Biomedical Enginerring" {{ (old("pro_domain") == "Biomedical Enginerring" ? "selected":"") }}>
															Biomedical Engineering</option>
														<option value="Energy" {{ (old("pro_domain") == "Energy" ? "selected":"") }}>
															Energy</option>
														<option value="Applied" {{ (old("pro_domain") == "Applied" ? "selected":"") }}>
															Applied</option>
														<option value="Information Technology" {{ (old("pro_domain") == "Information Technology" ? "selected":"") }}>
															Information Technology</option>			
													</select>
												</div>	
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="pro_type" >Sub Category</label>
													<input class="{{ $errors->has('pro_type') ? 'danger' : '' }}" type="text" name="pro_type" id="pro_type" value="{{ old('pro_type') }}" placeholder="Sub Category" />
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="super_name" >Supervisor</label>
												<input class="{{ $errors->has('super_name') ? 'danger' : '' }}" type="text" name="super_name" id="super_name" value="{{ old('super_name') }}" placeholder="Supervisor Name" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="pro_uni" >University</label>
												<input class="{{ $errors->has('pro_uni') ? 'danger' : '' }}" type="text" name="pro_uni" id="pro_uni" value="{{ old('pro_uni') }}" placeholder="University Name" />
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="pro_date" >Date</label>
												<input class="{{ $errors->has('pro_date') ? 'danger' : '' }}" type="date" name="pro_date" id="pro_date" value="{{ old('pro_date') }}" placeholder="Date" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="pro_season" >Season</label>
												<div class="select-wrapper">
													<select class="{{ $errors->has('pro_season') ? 'danger' : '' }}" name="pro_season" id="pro_season" >
														<option value="">- Season -</option>
														@foreach ($seasons as $season)
															<option value="{{ $season->id }},{{ $season->name }}"                   {{ (old("pro_season") == "$season->id , $season->name" ? "selected":"") }}>
															Season {{ $season->name }}</option>
														@endforeach
													</select>
												</div>		
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="pro_responsers" >Responsers</label>
												<input class="{{ $errors->has('pro_responsers') ? 'danger' : '' }}" type="text" name="pro_responsers" id="pro_responsers" value="{{ old('pro_responsers') }}" placeholder="Responsers Name" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="photo" >Load Photo</label>
												<input class="{{ $errors->has('pro_photo') ? 'danger' : '' }}" type="file" name="pro_photo" id="photo" value="{{ old('pro_photo') }}" placeholder="Load Photo" />
											</div>
											<!-- Break -->
											<div class="6u 12u$(xsmall)">
												<label for="pro_file" >Load File</label>
												<input class="{{ $errors->has('pro_file') ? 'danger' : '' }}" type="file" name="pro_file" id="pro_file" value="{{ old('pro_file') }}" placeholder="Load File" />
											</div>
											<div class="6u 12u$(xsmall)">
												<label for="file" >Load PowerPoint</label>
												<input class="{{ $errors->has('pro_ppt') ? 'danger' : '' }}" type="file" name="pro_ppt" id="pro_ppt" value="{{ old('pro_ppt') }}" placeholder="Load PowerPoint" />
											</div>
											<!--Break-->
											<div class="6u 12u$(xsmall)">
												<div class="4u 12u$(small)">
													<input value="video"  type="radio" id="radio_load" name="video_type" checked>
													<label for="radio_load">Load Video</label>
												</div>
												<div class="4u$ 12u$(small)">
													<input value="link"  type="radio" id="radio_link" name="video_type">
													<label for="radio_link">Video Link</label>
												</div>
											</div>
											<div class="6u 12u$(xsmall) v_load">
												<label for="video" >Load Video</label>
												<input class="{{ $errors->has('pro_video') ? 'danger' : '' }}" type="file" name="pro_video" id="video" accept="video" value="{{ old('pro_video') }}"  />
											</div>
											<div class="6u 12u$(xsmall) v_link">
												<label for="pro_video_link" >Video Link</label>
												<input class="{{ $errors->has('pro_video') ? 'danger' : '' }}" type="text" name="pro_video_link" id="pro_video_link"  value="{{ old('pro_video') }}" placeholder="Put Video Link" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<label for="description" >Description</label>
												<textarea class="{{ $errors->has('pro_desc') ? 'danger' : '' }}" name="pro_desc" id="description" placeholder="Enter your description" rows="10">{{Request::old('pro_desc')}}</textarea>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													{{-- <li><input type="reset" value="Reset" class="alt" /></li> --}}
												</ul>
											</div>
											{{-- <div class="hideDiv">
												<input type="hidden" name="pro_name" value="{{ session('pro_name') }}">
												<input type="hidden" name="pro_email" value="{{ session('pro_email') }}">
												<input type="hidden" name="stud_name" value="{{ session('stud_name') }}">
											</div> --}}
										</div>
									</form>
							
						</div>

					
				</div>

			</section>



@endsection

