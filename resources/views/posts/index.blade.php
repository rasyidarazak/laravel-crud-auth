@extends('layouts.app')

@if(isset($category))
	@section('title', "Category: $category->name")
@elseif(isset($tag))
	@section('title', "Tag: $tag->name")
@else
	@section('title', 'Posts')
@endisset

@section('content')

@if(Auth::guest())

	@if(isset($category))
  	<h3 class="card-title">Category: <i class="fas fa-sm fa-fw fa-tag"></i>{{ $category->name }}</h3>
  @elseif(isset($tag))
		<h3 class="card-title">Tag: #{{ $tag->name }}</h3>
  @else
		
  @endif
	
	<div class="row">
		<div class="col-md-8">
			@if( $posts->count() )
				<div class="row">
					@foreach($posts as $key => $post)
						<div class="col-md-6">
							<div class="card shadow-sm mb-3 rounded" style="min-height: 300px;">
								@if($post->thumbnail)
							  	<a href="/posts/{{ $post->slug }}"><img src="{{ asset($post->takeImage()) }}" class="card-img-top img-fluid"></a>
							  @endif
								  <div class="card-body">
								    <h5 class="card-title mb-1"><a href="/posts/{{ $post->slug }}">{{ Str::limit($post->title,70) }}</a></h5>
								    <a class="card-subtitle small" href="/posts/categories/{{ $post->category->slug }}"><i class="fas fa-sm fa-fw fa-tag"></i> {{ $post->category->name }}</a> &middot; 
						        <span class="card-subtitle small text-muted"><i class="fas fa-sm fa-fw fa-pen"></i> {{ $post->author->name }}</span>
								    <p class="card-text">{!! Str::limit($post->body,230) !!}</p>
										<span class="small text-muted">{{ $post->created_at }}</span> &middot; 
						        @foreach($post->tags as $tag)
						          <a class="card-subtitle small badge badge-primary" href="/posts/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
						        @endforeach
								  </div>
								</div>
						</div>
					@endforeach
				</div>
			@else
				<div class="card shadow-sm">
					<div class="card-body">
						<h1>There are no posts</h1>
					</div>
				</div>
	    @endif
	    @if( $posts->count() )
				<div class="row">
					<div class="col-md-12">
		    		{{ $posts->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			@endif
		</div>
		<div class="col-md-4">

			<div class="card shadow-sm mb-3">
			  <div class="card-header">
			    <strong><i class="fas fa-sm fa-fw fa-clipboard"></i> Recent Posts</strong>
			  </div>
			  <div class="card-body m-0 p-0">
			    <ul class="list-group list-group-flush">
			    	@foreach($recentPosts as $key => $post)
			    		@if($key < 5)
					    	<li class="list-group-item border-0"><a href="/posts/{{ $post->slug }}">{{ Str::limit($post->title,70) }}</a></li>
					    @endif
					   @endforeach
				  </ul>
			  </div>
			</div>

			<div class="card shadow-sm mb-3">
			  <div class="card-header">
			    <strong><i class="fas fa-sm fa-fw fa-tag"></i> Categories</strong>
			  </div>
			  <div class="card-body p-0">
			    <ul class="list-group list-group-flush">
			    	<div class="row justify-content-center">
				    	@foreach($categories as $category)
				    		<div class="col-md-6">
				    			<li class="list-group-item border-0"><a href="/posts/categories/{{ $category->slug }}">{{ $category->name }}</a></li>
				    		</div>
	          	@endforeach
			    	</div>
				  </ul>
			  </div>
			</div>

			<div class="card shadow-sm mb-3">
			  <div class="card-header">
			    <strong># Tags</strong>
			  </div>
			  <div class="card-body p-0">
			    <ul class="list-group list-group-flush">
			    	<div class="row">
				    	@foreach($tags as $tag)
				    		<div class="col-md-4">
				    			<li class="list-group-item border-0"><a href="/posts/tags/{{ $tag->slug }}" class="card-subtitle small badge badge-primary">#{{ $tag->name }}</a></li>
				    		</div>
	          	@endforeach
			    	</div>
				  </ul>
			  </div>
			</div>

	</div>

@else

	<div class="row mb-3">
		<div class="col-md-12">
			<div class="card shadow-sm">
			  <div class="card-body">

			  	@if(isset($category))
			    	<h3 class="card-title">Category: <i class="fas fa-sm fa-fw fa-tag"></i>{{ $category->name }}</h3>
			    @elseif(isset($tag))
						<h3 class="card-title">Tag: #{{ $tag->name }}</h3>
			    @else
						<h3 class="card-title">Posts</h3>
			    @endif

			    <p class="card-subtitle small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum sed dolorem velit repudiandae, officiis iure, quod, rerum.</p><hr class="my-2">
			    <div class="row mb-2">
			    	<div class="col-md-6">
					    @auth
								<a href="/posts/create" class="btn btn-sm btn-success"><i class="fas fa-sm fa-fw fa-plus"></i> New Post</a>
							@else
								<a href="/posts/create" class="btn btn-sm btn-success">Login to Create New Post</a>
							@endauth
			    	</div>
			    	<div class="col-md-6 text-right">
			    		<form class="form-inline d-inline-block" action="{{ route('search.posts') }}" method="get">
					      <input name="posts" class="form-control form-control-sm mr-sm-1" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
					      <button class="btn btn-outline-success btn-sm" type="submit"><i class="fas fa-sm fa-fw fa-search"></i></button>
					    </form>
			    	</div>
			    </div>

			    <div class="table-responsive-lg">
						<table class="table table-striped table-sm">
						  <thead class="text-center thead-dark">
						    <tr class="small">
						      <th scope="col">No</th>
						      <th scope="col">Title</th>
						      <th scope="col">Category</th>
						      <th scope="col">Tags</th>
						      <th scope="col">Author</th>
						      <th scope="col">Created at</th>
						      <th scope="col">Updated at</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@if( $posts->count() )
							  	@foreach($posts as $key => $post)
								    <tr class="text-center">
								      <th scope="row" class="align-middle small py-3">{{ $posts->firstItem() + $key }}</th>
								      <td class="text-left small align-middle"><a href="/posts/{{ $post->slug }}">{{ Str::limit($post->title,45) }}</a></td>
								      <td class="small align-middle"><a href="/posts/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></td>
								      <td class="align-middle text-left">
								      	@foreach($post->tags as $tag)
								      		<a class="badge badge-primary" href="/posts/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
								      	@endforeach
								      </td>
								      <td class="small align-middle">{{ $post->author->name }}</td>
								      <td class="small align-middle">{{ $post->created_at }}</td>
								      <td class="small align-middle">{{ $post->updated_at }}</td>
								    </tr>
							    @endforeach
						    @else
									<tr>
										<th scope="row" class="text-center align-middle small py-3" colspan="7">There are no posts</th>
									</tr>
						    @endif
						  </tbody>
						</table>
			    </div>
					
					@if( $posts->count() )
						<div class="row">
							<div class="col-md-12">
				    		{{ $posts->links('vendor.pagination.bootstrap-4') }}
							</div>
						</div>
					@endif

			  </div>
			</div>
		</div>
	</div>

@endif

@endsection