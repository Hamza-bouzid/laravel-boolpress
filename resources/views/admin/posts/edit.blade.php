@extends('layouts.template')

@section('title', "Edit $post->title")
  


@section('content')
<div class="container">
  <header>
    <nav>
      <a href="{{route('admin.posts.index')}}"><button class="btn btn-show"><i class="fas fa-arrow-left"></i> Posts</button></a>
    </nav>
    <h2>Edit {{$post->title}}</h2>
  </header>

  <main>
    <form action="{{route('admin.posts.update', $post->id)}}" method="POST"  enctype="multipart/form-data">
      @method("PUT")
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput" class="font-weight-bold">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{old('title',$post->title)}}">
        @error('title')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2" class="font-weight-bold">Content</label>
        <textarea name="content" class="form-control" id="content"  cols="30" rows="10" placeholder="Scrivi qualcosa...">{{old('content',$post->content)}}</textarea>
        @error('content')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput" class="font-weight-bold">Image</label>
        <input type="file" class="form-control" name="image" id="image">
        @error('image')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput" class="font-weight-bold">Category</label>
        <select class="form-control form-control-md" id="category_id" name="category_id">
          <option>-- Select Category --</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}"
            
             {{$category->id == old("category_id", $post->category_id) ? "selected": ""}}>{{$category->name}}</option>

          @endforeach
        </select>
        @error('category_id')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput" class="font-weight-bold">Tags:</label>
        @foreach ($tags as $tag)
            
        <div class="form-check d-inline-block m-3">
          <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" id="{{$tag->slug}}"
          @if($errors->any())
          {{in_array($tag->id, old('tags', []))? "checked": ""}}
          @else
          {{$post->tags->contains($tag) ? 'checked' : ''}}>
          @endif
          <label for="{{$tag->slug}}">{{$tag->name}}</label>
        </div>
        @endforeach
        @error('tags[]')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
    </form>
  </main>

</div>
@endsection

@section('scripts')
<script>
  ClassicEditor
      .create( document.querySelector( '#content' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection