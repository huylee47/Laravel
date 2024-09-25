@extends('admin.layout.layout')
@section('content')
<div class="container">
    <a href="{{route('admin.Product.add')}}"><button class="btn btn-success">Create New</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($Products as $Product)
          <tr>
            <td>{{$Product->id}}</td>
            <td>{{$Product->name}}</td>
            <td>{{$Product->price}}</td>   
            <td>
              <a href="{{ route('admin.Product.editView', ['id' => $Product->id]) }}">
                <button class="btn btn-warning">Edit</button>
              </a>       
              <a href="{{ route('admin.Product.delete', ['id' => $Product->id]) }}">     
                <button class="btn btn-danger">Delete</button>
              </a>       
            </td>
          </tr>
          @endforeach

          <tr>
        </tbody>
      </table>
</div>
@endsection