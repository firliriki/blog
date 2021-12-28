@extends('admin.template')

@section('title',$title)

@section('judul',$title)

@section('content')
{{-- insert content here --}}


{{-- <div class="form-group">
  <label for="blog"></label>
  <textarea class="form-control" name="blog" id="ck" rows="30"></textarea>
</div> --}}
@if (session('message'))
  <div class="alert alert-{{ session('type') }}">
    {{ session('message')}}
  </div>
@endif

<a href="{{ url('admin/categories/form') }}" class="btn btn-outline-primary mb-3">Add New</a>
<table class="table table-striped table-bordered table-responsive">
  <thead class="bg-primary text-light">
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Slug</th>
      <th>Description</th>
      <th colspan="2">Action</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($data as $cat)
      <tr>
        <td scope="row">{{ $cat->id }}</td>
        <td>{{ $cat->category }}</td>
        <td>{{ $cat->slug }}</td>
        <td>{{ $cat->description }}</td>
        <td><a href="{{ url('admin/categories/form/'.$cat->id) }}" class="btn btn-warning">E</a>
          <a href="{{ url('admin/categories/delete/'.$cat->id) }}" class="btn btn-danger">X</a>
        
        </td>
      </tr>
      @endforeach
    </tbody>
</table>



<div id="toolbar-container"></div>
<div id="ckedit">
    <p>This is the initial editor content.</p>
</div>
@endsection