@extends('admin.layout.layout')
@section('content')

<div class="container">
    <h5>Edit Product(ADMIN)</h5>
<hr>
{{--  --}}
    <form action="{{route('admin.Product.edit', ['id' => $Product->id])}}" method="POST">
        @csrf
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{$Product->name}}">
        </div>
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="price" name="price" value="{{$Product->price}}">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection