@extends('admin.template')

@section('title','Settings')

@section('judul','Pengaturan ')

@section('content')
{{-- insert content here --}}
@if (session('message'))
  <div class="alert alert-{{ session('type') }}">
    {{ session('message')}}
  </div>
@endif
<form action="{{ url('admin/settings/save') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" id="email" aria-describedby="Email Pusat" value="">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
    
@endsection