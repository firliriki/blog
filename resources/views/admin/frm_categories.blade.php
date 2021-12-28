@extends('admin.template')

@section('title',$title)

@section('judul',$title)

@section('content')
{{-- insert content here --}}
<form action="{{ url('admin/categories/save') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="category">Category</label>
      <input type="hidden" name="id" value="{{ @$data["id"] }}">
      <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" id="category" aria-describedby="Nama Kategori" value="{{ old('category') ? old('category') : @$data["category"] }}">@error('category') <p class="invalid-feedback">{{ $errors->first('category') }}</p>
      @enderror
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        {{-- <select class="form-control" name="slug">
   
          <option>Select Product</option>
            
          @foreach (@$data as $key => $value)
            <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                {{ $value }} 
            </option>
          @endforeach    
        </select> --}}
        <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" aria-describedby="slug" value="{{old('slug') ? old('slug') : @$data["slug"] }}">@error('slug') <p class="invalid-feedback">{{ $errors->first('slug') }}</p>
        @enderror
      </div>
    <div class="form-group">
      <label for="desc">Description</label>
      <textarea class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" rows="3">{{old('desc') ? old('desc') : @$data["description"] }}</textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
    
@endsection