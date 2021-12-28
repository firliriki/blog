@extends('layout.page')
@section('title','Blog')
@section('content')
<div class="post-list">
    @foreach($posts as $post)
    <div class="post-item card my-3 bg-gradient-to-b from-white to-green-100">
        <div class="card-body">
            <h4 class="card-title">{{ $post->post_title }}</h4>
            <div class="meta">
                <i class="fas fa-user"></i> {{ $post->firstname }} - <i class="fas fa-calendar"></i>
                {{ $post->created_at }} - <i class="fas fa-tags"></i> {{ $post->category}}
            </div>
            <div class="card-text py-3">
                {!! strip_tags(Str::limit($post->post_content, 250)) !!}
            </div>
            <a href="{{ url('single/'.$post->post_slug) }}" class="btn btn-outline-primary">Read More</a>
        </div>
    </div>
    @endforeach
    <div class="blog-pagination">
        <div class="row">
            <div class="col-md-6">
                @if($posts->currentPage()>$posts->onFirstPage())
                <a href="{{ $posts->previousPageUrl() }}" class="btn btn-primary"><i class="fas fa-arrow-left"></i>Previous</a>
                @endif
            </div>
            <div class="col-md-6 text-right">
                @if($posts->currentPage()<$posts->lastPage())
                <a href="{{ $posts->nextPageUrl() }}" class="btn btn-primary">Next<i class="fas fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </div>
</div>
@section('sidebar')
{{ widget() }}
@endsection  

@endsection