@extends('admin.template')

@section('title',$title)

@section('judul','Komentar')

@section('content')
{{-- insert content here --}}
@if (session('message'))
  <div class="alert alert-{{ session('type') }}">
    {{ session('message')}}
  </div>
@endif

<table class="table table-bordered">
  <thead class="bg-primary text-light">
    <tr>
      <th>ID</th>
      <th style="width: 80px; font-size: 13px" !important>Comment From</th>
      <th style="width: 150px; font-size: 15px" !important>Comment Author</th>
      <th>Comment Content</th>
      <th style="width: 80px; font-size: 13px" !important>Acc Status</th>
      <th style="width: 100px; font-size: 13px" !important>Created At</th>
      <th style="width: 100px; font-size: 13px" !important>Updated At</th>
      <th style="width: 200px; text-align: center">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($comments as $cat)
    <tr>
      <td scope="row">{{ $cat->id }}</td>
    <td><a href="{{ url('single/'.$cat->post_slug) }}" target="_blank">{{ $cat->post_title }}</a></td>
      <td>{{ $cat->comment_author }}</td>
      <td>{{ $cat->comment_content }}</td>
      <td>{{ $cat->comment_approved }}</td>
      <td>{{ $cat->created_at }}</td>
      <td>{{ $cat->updated_at }}</td>
      <td style="align-items: center">
        <a href="{{ url('admin/comments/update/'.$cat->id) }}" class="btn btn-success">Acc</a>
        <a href="{{ url('admin/comments/reject/'.$cat->id) }}" class="btn btn-danger" style="margin-left: 30px">UnAcc</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  
    
@endsection