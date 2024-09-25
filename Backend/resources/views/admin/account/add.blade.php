@extends('admin.layout.layout')
@section('content')
<div class="container">
    <h5>Add new Account(ADMIN)</h5>
<hr>
    <form action="{{route('admin.Account.create')}}" method="POST">
        @csrf
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username">
        </div>
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add</button>
    </form>

</div>
@endsection