@extends('admin.layout.layout')
@section('content')

<div class="container">
    <h5>Edit Account(ADMIN)</h5>
<hr>
{{--  --}}
    <form action="{{route('admin.Account.edit', ['id' => $account->id])}}" method="POST">
        @csrf
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="username" name="username" value="{{$account->username}}">
        </div>
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="password" name="password" value="{{$account->password}}">
        </div>
        <div class="mb-3 row">
            <select name="role" class="form-select" aria-label="Default select example" required>
                <option value="" disabled {{ $account->role === null ? 'selected' : '' }}>Select Role</option>
                <option value="0" {{ $account->role == 0 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $account->role == 1 ? 'selected' : '' }}>User</option>
                <option value="2" {{ $account->role == 2 ? 'selected' : '' }}>Ban</option>
            </select>
        </div>
        
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection