@extends('layouts.admin')


@section('content')
    <div class="card border border-dark">
      <div class="card-header">
        <h4>Edit product</h4>
      </div>
      <div class="card-body">
        <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="row">
            <div class="col-md-12 mb-3">
            
            <select class="form-select" name="category_id" aria-label="Default select example">
                
                <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Name</label>
              <input type="text" class="form-control  border border-dark" name="name" value="{{$product->name}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Slug</label>
              <input type="text" class="form-control  border border-dark" name="slug" value="{{$product->slug}}">
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Small Description</label>
              <textarea name="small_description" rows="3" class="form-control  border border-dark">{{$product->small_description}}</textarea>
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Description</label>
              <textarea name="description" rows="3" class="form-control  border border-dark">{{$product->description}}</textarea>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Original Price</label>
              <input type="number" name="original_price" class="form-control  border border-dark" value="{{$product->original_price}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Selling Price</label>
              <input type="number" name="selling_price" class="form-control  border border-dark" value="{{$product->selling_price}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Tax</label>
              <input type="number" name="tax" class="form-control  border border-dark" value="{{$product->tax}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Quantity</label>
              <input type="number" name="qty" class="form-control  border border-dark" value="{{$product->tax}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Status</label>
              <input type="checkbox" name="status" {{$product->status == '1'?'checked' : ''}} >
            </div>            
            <div class="col-md-6 mb-3">
              <label for="">Trending</label>
              <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' : ''}}>
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Title</label>
              <input type="text" class="form-control  border border-dark" name="meta_title" value="{{$product->meta_title}}">
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Keywords</label>
              <textarea name="meta_keywords" rows="3" class="form-control  border border-dark">{{$product->meta_keywords}}</textarea>          
            </div>
            <div class="col-md-12 mb-3">
              <label for="">Meta Description</label>
              <textarea name="meta_description" rows="3" class="form-control  border border-dark">{{$product->meta_description}}</textarea>          
            </div>
            
            @if ($product->image)
            <img src="{{asset('assets/uploads/products/'.$product->image) }}" alt="her is image" >
            @endif

            <div class="col-md-12">              
              <input type="file" class="form-control" name="image">
            </div>

            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Update</button>
            <div>  

          </div>
        </form>
      </div>
    </div>
@endsection