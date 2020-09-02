@if (session('success'))
	<div class="row mt-3 mb-1 text-center">
		<div class="col-md">
	    <div class="alert alert-success shadow-sm">
	        {{ session('success') }}
	    </div>
		</div>
	</div>
@elseif (session('error'))
	<div class="row mt-3 mb-1 text-center">
		<div class="col-md">
	    <div class="alert alert-danger shadow-sm">
	        {{ session('error') }}
	    </div>
		</div>
	</div>
@endif