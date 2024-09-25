@extends('admin.layout.layout')
@section('content')

<div class="container">
    <h5>Edit Blog(ADMIN)</h5>
<hr>
{{--  --}}
    <form action="{{route('admin.Blog.edit', ['id' => $Blog->id])}}" method="POST">

        @csrf
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">title</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="title" name="title" value="{{$Blog->title}}">
        </div>
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">content</label>
        <div class="col-sm-10">
          <textarea type="text" class="form-control" id="content" name="content" >{{$Blog->content}} </textarea>
        </div>
        
      </div>
      <div class="mb-3 row">
        <label  class="col-sm-2 col-form-label">author</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="author" name="author" value="{{$Blog->author}}">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection