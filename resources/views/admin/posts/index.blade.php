@extends('layouts.template')

@section('title', 'Posts')
  


@section('content')
<div class="container">
  <header>
      <a href="{{ route('admin.home') }}"><button class="btn btn-show"><i class="fas fa-home"></i></button></a>
      <a href="{{route('admin.posts.create')}}"><button class="btn btn-edit">New Post <i class="fas fa-plus"></i></button></a>
    <h1>Posts</h1>
  </header>
  <main>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">content</th>
          <th scope="col">category</th>
          <th scope="col">image</th>
          <th scope="col">tags</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <th scope="row">{{$post->title}}</th>
          <td>{!!$post->content!!}</td>
          <td>{{$post->category ? $post->category->name : '-'}}</td>
          <td>
            @if($post->image)
            <img class="img-table" src="{{asset("storage/{$post->image}")}}">
            @endif
          </td>
          <td>
            @foreach ($post->tags as $tag)
             <span> {{$tag->name}}</span>
            @endforeach
          </td>
          <td>
            <div class="buttons">
              <a href="{{route("admin.posts.show", $post->id)}}"><button class="btn btn-show"><i class="fas fa-eye"></i></button></a>
              <a href="{{route("admin.posts.edit", $post->id)}}"><button class="btn btn-edit"><i class="fas fa-edit"></i></button></a>
              <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
              @csrf
              @method("DELETE")
              <button class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this Post?');"><i class="fas fa-trash-alt"></i></button>
              </form>
          </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </main>

</div>
@endsection