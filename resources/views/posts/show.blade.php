@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="row mb-3">
	<div class="col-md-2">
		<a href="/posts" class="btn btn-sm btn-outline-dark"><i class="fas fa-sm fa-fw fa-arrow-left"></i> Posts</a>
	</div>
  @can('update', $post)
  	<div class="col-md-10 text-right">
    	<a href="/posts/{{ $post->slug }}/edit" class="btn btn-info btn-sm"><i class="fas fa-fw fa-edit"></i> Edit</a>
    	<button type="submit" class="btn btn-danger btn-sm" data-target="#deletePostModal" data-toggle="modal"><i class="fas fa-fw fa-trash"></i> Delete</button>
  	</div>
  @endcan
</div>

<div class="row my-3">
	<div class="col-md-8">
		<div class="card shadow-sm">
		  <div class="card-body">
		    <h4 class="card-title mb-1">{{ $post->title }}</h4>
        <a class="card-subtitle small" href="/posts/categories/{{ $post->category->slug }}"><i class="fas fa-sm fa-fw fa-tag"></i> {{ $post->category->name }}</a> &middot; 
        <span class="small text-muted">{{ $post->created_at }}</span> &middot; 
        @foreach($post->tags as $tag)
          <a class="card-subtitle small badge badge-primary" href="/posts/tags/{{ $tag->slug }}">#{{ $tag->name }}</a>
        @endforeach
        <div class="row">
          <div class="col-md-12">
            <span class="card-subtitle small text-muted"><i class="fas fa-sm fa-fw fa-pen"></i> {{ $post->author->name }}</span>
          </div>
        </div><hr>
        @if($post->thumbnail)
          <div class="row justify-content-center text-center">
            <div class="col-md-12">
              <img class="img-thumbnail mb-4 w-50" src="{{ asset($post->takeImage()) }}">
            </div>
          </div>
        @endif
		    <div class="card-subtitle small">{!! $post->body !!}</div>
		    <p class="card-subtitle small text-muted mt-3 float-right">Updated at {{ $post->updated_at }}</p>
		  </div>
		</div>
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
</div>

@auth
  <!-- Delete Post Modal-->
  <div class="modal fade" id="deletePostModal" tabindex="-1" role="dialog" aria-labelledby="deletePostModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deletePostModal">Are you sure to delete it?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Title : <span class="text-muted">{{ $post->title }}</span></p>
          <p>Select "Delete" will delete the post permanently.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="/posts/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endauth

@endsection