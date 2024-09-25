@extends('admin.layout.layout')
@section('content')
<div class="container">
    <h5>Add new Product(ADMIN)</h5>
<hr>
    <form action="{{route('admin.Product.create')}}" method="POST">
        @csrf
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name">
        </div>
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="price" name="price">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

</div>
@endsection