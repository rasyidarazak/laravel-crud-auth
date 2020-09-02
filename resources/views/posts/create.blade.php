@extends('layouts.app')

@section('title', 'Create Post')

@section('content')

<div class="row my-3">
	<div class="col-md-12">
		<div class="card shadow-sm">
		  <div class="card-body">
		    <h3 class="card-title">Create New Post</h3>
		    <p class="card-subtitle small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum sed dolorem velit repudiandae, officiis iure, quod, rerum.</p>
		    <hr class="my-2">
	      <form method="post" action="/posts" enctype="multipart/form-data">
	        @csrf
	        <div class="row">
	        	<div class="col-md-6">
			        <div class="form-group">
			          <label for="title" class="card-subtitle">Title</label>
			          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter title.." name="title" value="{{old('title')}}" autocomplete="off">
			          @error('title')
			          <div class="invalid-feedback">
			            {{$message}}
			          </div>
			          @enderror
			        </div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="form-group">
	        			<label for="thumbnail" class="card-subtitle">Thumbnail</label>
	        			<input type="file" name="thumbnail" id="thumbnail" class="form-control-file @error('thumbnail') is-invalid @enderror">
	        			@error('thumbnail')
			          <div class="invalid-feedback">
			            {{$message}}
			          </div>
			          @enderror
	        		</div>
	        	</div>
	        </div>
					
					<div class="row">
						<div class="col-md-6">
			        <div class="form-group">
			          <label for="category" class="card-subtitle">Category</label>
			          <select class="form-control @error('category') is-invalid @enderror" id="category" name="category">
			          	<option disabled selected>Choose a Category</option>
			          	@foreach($categories as $category)
										<option value="{{ $category->id }}">{{ $category->name }}</option>
			          	@endforeach
			          </select>
			          @error('category')
			          <div class="invalid-feedback">
			            {{$message}}
			          </div>
			          @enderror
			        </div>
						</div>
						<div class="col-md-6">
			        <div class="form-group">
			          <label for="tag" class="card-subtitle">Tag</label>
			          <select class="form-control @error('tag') is-invalid @enderror select2" id="tag" name="tag[]" multiple>
			          	@foreach($tags as $tag)
										<option value="{{ $tag->id }}">{{ $tag->name }}</option>
			          	@endforeach
			          </select>
			          @error('tag')
			          <div class="invalid-feedback">
			            {{$message}}
			          </div>
			          @enderror
			        </div>
						</div>
					</div>

	        <div class="form-group">
	          <label for="body" class="card-subtitle">Body</label>
	          <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body" placeholder="Enter body.." name="body" rows="10">{{old('body')}}</textarea>
	          @error('body')
	          <div class="invalid-feedback">
	            {{$message}}
	          </div>
	          @enderror
	        </div>
	        
	        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-sm fa-fw fa-plus"></i> Add Post</button>
	        <a href="/posts" class="btn btn-sm btn-secondary float-right mr-2">Cancel</a>
	      </form>
		  </div>
		</div>
	</div>
</div>

@endsection