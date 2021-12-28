@extends('admin.template')

@section('title','Dashboard')

@section('judul', $judul)

@section('content')
{{-- insert content here --}}
<div class="alert alert-danger" role="alert">
    {{ $pesan }}
</div>
    
@endsection