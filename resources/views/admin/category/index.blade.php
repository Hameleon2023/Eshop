@extends('layouts.admin')

@section('content')
    <div class="card">
      <div class="card-header">
        <h4>Category page</h4>
        <hr>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Description</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($categories as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->description}}</td>
              <td><image src="{{asset('assets/uploads/category/'.$item->image) }}" alt="Image here" class="category-image"></td>
              <td>
                
                <a href="{{route ('admin.categories.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                
                <a href="{{route ('admin.categories.destroy', $item->id)}}" class="btn btn-danger">Delete</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>      
    </div>
@endsection