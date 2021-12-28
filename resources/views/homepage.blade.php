@extends('layout.page')
@section('title','Homepage')
@section('content')
    <div class="post-list">
        @foreach ($posts as $post)
        <div class="post-item card my-3 bg-gradient-to-b from-white to-blue-200">
            <div class="card-body">
                <h4 class="card-title">{{ $post->post_title }}</h4>
                <div class="meta">
                    <i class="fas fa-user"></i> {{ $post->firstname }} - <i class="fas fa-calendar"></i> {{ $post->created_at}} - <i class="fas fa-tags"></i> {{ $post->category }}
                </div>
                <div class="card-text py-3">
                    {!! strip_tags(Str::limit($post->post_content, 250)) !!}
                </div>
                <a href="{{ url('single/'.$post->post_slug)}}" class="btn btn-outline-primary">Read More</a>
            </div>
        </div>
            
        @endforeach
    </div> 
    @section('sidebar')
    {{ widget() }}
    @endsection  
@endsection