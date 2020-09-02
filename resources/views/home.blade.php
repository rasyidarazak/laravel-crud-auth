@extends('layouts.app')

@section('title', 'Laravel CRUD & Authentication')

@section('content')

<div class="row justify-content-center my-3">
	<div class="col-md-10">
		<div class="card shadow-sm">
			<div class="card-header">Home</div>
		  <div class="card-body">
		    <h5 class="card-title">Welcome! <i class="far fa-fw fa-smile"></i> - Laravel CRUD & Authentication System</h5>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta nam libero, est quisquam, consequuntur corporis distinctio? Illum mollitia pariatur accusamus deleniti, dicta, fugiat. Impedit eaque facere reiciendis, iure suscipit illo.</p>
		    @guest
		    	<p>Please login first >> <a class="btn btn-sm btn-primary" href="{{ route('login') }}">
	          {{ __('Login') }}
	        </a></p>
				@endguest
		  </div>
		</div>
	</div>
</div>

@endsection