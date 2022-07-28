@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Products page</h4>
        <hr>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Category</th>
              <th>Name</th>
              <th>Description</th>
              <th>Selling Price</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($products as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->category->name}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->description}}</td>
              <td>{{$item->selling_price}}</td>
              <td><image src="{{asset('assets/uploads/products/'.$item->image) }}" alt="Image here" class="products-image"></td>
              <td>
                
                <a href="{{route ('admin.products.edit', $item->id)}}" class="btn btn-primary btn-sm">Edit</a>
                
                <a href="{{route ('admin.products.destroy', $item->id)}}" class="btn btn-danger btn-sm">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>      
    </div>
@endsection