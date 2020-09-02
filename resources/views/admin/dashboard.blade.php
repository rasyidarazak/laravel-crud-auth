@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row my-3">
	<div class="col-md-10">

		<div class="card shadow-sm">
		  <div class="card-body">
		    <h3 class="card-title">Dashboard</h3>
		    <p class="card-subtitle small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id repellat omnis, consequatur tempora tenetur repellendus.</p><hr class="my-2">
		  </div>
		</div>

		<div class="row mt-3 small">
    	<div class="col-md-12">
    		<div class="card">
				  <div class="card-header">Main Features</div>
				  <div class="card-body text-success">
				    <ul>
				    	<li>CRUD (Create, Read, Update, Delete)</li>
				    	<li>Authentication (Basic Role, Register, Login, Logout)</li>
				    </ul>
				  </div>
				</div>
    	</div>
    </div>

    <div class="row mt-3 small">
    	<div class="col-md-12">
    		<div class="card">
				  <div class="card-header">Features Not Yet Added</div>
				  <div class="card-body text-danger">
				    <ul>
				    	<li>Profile & Settings Page</li>
				    	<li>Comment on Post</li>
				    </ul>
				  </div>
				</div>
    	</div>
    </div>

	</div>
</div>

@endsection