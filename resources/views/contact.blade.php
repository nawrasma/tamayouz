@extends("layoutFront",$seasons)


@section('title','Contact')
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
						<h2 id="content">Contact</h2>
						
						<div class="row">
							<!-- <div class="6u 12u$(small)">
								
							</div> -->
							@include('errors')
							@include('flashMsg')
							<form class="contactForm"  method="post" action="/contactMsg">
										 @csrf
										<div class="row uniform">
											<div class="6u 12u$(xsmall)">
												<input class="{{ $errors->has('msg_name') ? 'danger' : '' }}" type="text" name="msg_name" id="demo-name" value="{{ old('msg_name') }}" placeholder="Name" />
											</div>
											<div class="6u$ 12u$(xsmall)">
												<input class="{{ $errors->has('msg_email') ? 'danger' : '' }}" type="email" name="msg_email" id="demo-email" value="{{ old('msg_email') }}" placeholder="Email" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<input class="{{ $errors->has('msg_subject') ? 'danger' : '' }}" type="text" name="msg_subject" id="demo-sub" value="{{ old('msg_subject') }}" placeholder="Subject" />
											</div>
											<!-- Break -->
											<div class="12u$">
												<textarea class="{{ $errors->has('msg') ? 'danger' : '' }}" name="msg" id="demo-message"  placeholder="Enter your message" rows="6">{{Request::old('msg')}}</textarea>
											</div>
											<!-- Break -->
											<div class="12u$">
												<ul class="actions">
													<li><input type="submit" value="Send Message" /></li>
													{{-- <li><input type="reset" value="Reset" class="alt" /></li> --}}
												</ul>
											</div>



										</div>
									</form>

									
							
						</div>

					
				</div>

			</section>


@endsection