@extends('layout.page')
@section('title',$post->post_title)
@section('content')
<div class="box-border border-4 bg-gradient-to-b from-white to-purple-100">
    <article id="page">
        <h2>{{ $post->post_title}}</h2>
        <div class="meta">
            <i class="fas fa-user"></i> {{ $post->firstname }} - <i class="fas fa-calendar"></i> {{ $post->created_at }} - <i class="fas fa-tags"></i> {{$post->category}}
        </div>
        <div class="page-content">
            {{!! $post->post_content !!}}
        </div>
    </article>
    <div id="comment">
        <h3>COMMENTS</h3>
        <div class="comment-list">
            @if (count($comment)>0)
                @foreach($comment as $com)
                <div class="comment-item">
                    <h5>{{ $com->comment_author}}</h5>
                    <div class="meta-comment">{{ date('d F Y h:i:s',strtotime($com->created_at)) }}</div>
                    @if (($com->comment_approved)==2)
                    <p>{{ $com->comment_content}}</p>
                    @elseif(($com->comment_approved)==3)
                    <p>- Komentar ditolak oleh admin -</p>
                    @else
                    <p>-Menunggu Persetujuan Komentar oleh Admin -</p>
                    @endif
                </div>
                @endforeach
                @else
                <p>- No Comment Yet -</p>
            @endif
        </div>
        <div class="comment-form">
            <h3>Leave Comment</h3>
            @if (Route::has('login'))
            @auth
            <form id="frm_comment" action="{{ url('comment/save') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="comment_post_id" value="{{ $post->id }}">
                    <label for="comment_author">Name</label>
                    <input type="text" name="comment_author" id="comment_author" class="form-control" value="{{Auth::user()->username}}" readonly>
                </div>
                <div class="form-group">
                    <label for="comment_content">Message</label>
                    <textarea name="comment_content" id="comment_content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button id="btn-comment" type="submit" class="btn btn-outline-primary">SEND</button>
                </div>
            </form>
            @else
            <h1>You must Login/Register to leave a Comment!</h1>
            @endauth
            @endif
        </div>
    </div>
</div>
@section('sidebar')
{{ widget() }}
@endsection 
@endsection