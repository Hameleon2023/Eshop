@extends('layouts.admin')


@section('content')
    <div class="card border border-dark">
      <div class="card-header">
        <h4>Edit/Update category</h4>
      </div>
      <div class="card-body">
        <form action="{{route('admin.categories.update', $category->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="">Name</label>
              <input type="text" value="{{$category->name}}" class="form-control  border border-dark" name="name">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Slug</label>
              <input type="text" value="{{$category->slug}}" class="form-control  border border-dark" name="slug">
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Description</label>
              <textarea name="description" rows="3" class="form-control  border border-dark">{{$category->description}}"</textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Status</label>
              <input type="checkbox" {{$category->status=='1'?'checked':''}} name="status">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Popular</label>
              <input type="checkbox" {{$category->popular=='1'?'checked':''}} name="popular">
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Title</label>
              <input type="text" class="form-control  value="{{$category->meta_title}}" border border-dark" name="meta_title">
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Keywords</label>
              <textarea name="meta_keywords" rows="3" class="form-control  border border-dark">{{$category->meta_keywords}}"</textarea>          
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Description</label>
              <textarea name="meta_description" rows="3" class="form-control  border border-dark">{{$category->meta_description}}</textarea>          
            </div>

            @if ($category->image)
                <img src="{{asset('assets/uploads/category/'.$category->image) }}" alt="Here is image">
            @endif
            <div class="col-md-12">
              
              <input type="file" class="form-control" name="image">
            </div>

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            <div>       
                 
          </div>
        </form>
      </div>
    </div>
@endsection