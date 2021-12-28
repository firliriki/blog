@extends('admin.template')

@section('title',$title)

@section('judul',$title)

@section('content')
{{-- insert content here --}}

@if (session('message'))
  <div class="alert alert-{{ session('type') }}">
    {{ session('message')}}
  </div>
@endif

<a href="{{ url('admin/posts/form') }}" class="btn btn-outline-primary mb-3">Add New</a>

<table class="table table-bordered">
  <thead class="bg-primary text-light">
    <tr>
      <th>ID</th>
      <th>Judul</th>
      <th>Slug</th>
      <th>Category</th>
      <th>Author</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $cat)
    <tr>
      <td scope="row">{{ $cat->id }}</td>
      <td>{{ $cat->post_title }}</td>
      <td>{{ $cat->post_slug }}</td>
      <td>{{ $cat->category }}</td>
      <td>{{ $cat->firstname }}</td>
      <td>
        <a href="{{ url('admin/posts/form/'.$cat->id) }}" class="btn btn-warning">E</a>
        <a href="{{ url('admin/posts/delete/'.$cat->id) }}" class="btn btn-danger">X</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  
@endsection