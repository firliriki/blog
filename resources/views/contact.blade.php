@extends('layout.page')

@section('title',$title)

@section('judul',$title)

@section('content')
{{-- insert content here --}}
<form action="{{ url('admin/kontakkami') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="head">Judul Pesan</label>
      <input type="text" class="form-control" name="head" id="head">
    </div>
    
    <div class="form-group">
      <label for="body">Isi Pesan</label>
      <textarea class="form-control" name="body" id="body" rows="3"></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Kirim</button>
    </div>
</form>
    
@endsection