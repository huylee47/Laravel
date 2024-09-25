@extends('admin.layout.layout')
@section('content')
<div class="container">
    <a href="{{route('admin.Account.add')}}"><button class="btn btn-success">Create New</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
          <tr>
            <td>{{$account->id}}</td>
            <td>{{$account->username}}</td>
            <td>{{$account->password}}</td>   
            <td>{{ $account->role == 1 ? 'User' : ($account->role == 0 ? 'Admin' : 'Banned') }}</td>
            <td>
              <a href="{{ route('admin.Account.editView', ['id' => $account->id]) }}">
                <button class="btn btn-warning">Edit</button>
              </a>       
              <a href="{{ route('admin.Account.delete', ['id' => $account->id]) }}">     
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