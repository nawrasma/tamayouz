@if(session('message'))
	<div class="flashMsg box" >
		<p>{{ session('message') }}</p>
	</div>	
@endif