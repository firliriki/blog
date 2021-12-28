@extends('admin.template')

@section('title',$title)

@section('judul',$title)

@section('content')

<form action="{{ url('admin/posts/save') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="post_title">Title</label>
        <input type="hidden" name="id" value="{{ @$data["id"] }}">
        <input type="text" class="form-control @error('post_title') is-invalid @enderror" name="post_title" id="post_title" value="{{ old('post_title') ? old('post_title') : @$data['post_title'] }}">
        @error('post_title')
        <p class="invalid-feedback">{{ $errors->first('post_title') }}</p>
        @enderror
    </div>
    <div class="form-group">
        <label for="post_slug">Slug</label>
        <input type="text" class="form-control @error('post_slug') is-invalid @enderror" name="post_slug" id="post_slug" value="{{ old('post_slug') ? old('post_slug') : @$data['post_slug'] }}">
        @error('post_title')
        <p class="invalid-feedback">{{ $errors->first('post_slug') }}</p>
        @enderror
    </div>
    <div class="form-group">

       <textarea id="editor" name="post_content" class="form-control @error('post_content') is-invalid @enderror image" rows="10">{{ old('post_content') ? old('post_content') : @$data['post_content'] }}"</textarea>
       <p class="invalid-feedback">{{ $errors->first('post_content') }}</p>
    </div>
    <div class="form-group">
        <label for="post_category">Category</label>
        <select name="post_category" id="post_category" class="form-control">
            @foreach($cat as $c)
                <option {{ @$data['post_category']==$c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->category }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="post_status">Status</label>
        <select class="form-control" name="post_status" id="post_status">
            <option {{ @$data['post_status']=='publish' ? 'selected' : ''}} value="publish">Publish</option>
            <option {{ @$data['post_status']=='draft' ? 'selected' : ''}} value="draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">SAVE</button>
    </div>
</form>
<style>
    .ck-editor__editable_inline {
        min-height: 300px !important;
    }
</style>
@endsection