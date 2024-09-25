@extends('admin.layout.layout')
@section('content')
<div class="container">
    <a href="{{route('admin.Blog.add')}}"><button class="btn btn-success">Create New</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($Blogs as $blog)
          <tr>
            <td>{{$blog->id}}</td>
            <td>{{$blog->title}}</td>
            <td>{{$blog->content}}</td>   
            <td>{{ $blog->author }}</td>
            <td>
              <a href="{{ route('admin.Blog.editView', ['id' => $blog->id]) }}">
                <button class="btn btn-warning">Edit</button>
              </a>       
              <a href="{{ route('admin.Blog.delete', ['id' => $blog->id]) }}">     
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