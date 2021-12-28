@extends('admin.template')

@section('title','Dashboard')

@section('judul','Dashboard')

@section('content')
{{-- insert content here --}}
<div class="row">
{{-- Count Comments --}}

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Approved Comments</div>
                        @foreach($komen as $cat)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cat->komen_s}}</div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-alert shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Pending Comments</div>
                        @foreach($komenp as $cat)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cat->komen_s}}</div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Unapproved Comments</div>
                        @foreach($komenx as $cat)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$cat->komen_s}}</div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- Count Comments --}}

<div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <table class="table table-bordered">
                <thead class="bg-primary text-light">
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Author</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $cat)
                  <tr>
                    <td scope="row">{{ $cat->id }}</td>
                    <td>{{ $cat->post_title }}</td>
                    <td>{{ $cat->post_slug }}</td>
                    <td>{{ $cat->firstname }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>


    </div>

    


</div>
    
@endsection