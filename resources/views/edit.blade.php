@extends('master')

@section('title', 'Tambah Data')

@section('content')
  @if($errors->any())
    <br>
    <div class="container">
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>          
              {{ $error }}          
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif

  <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    <div class="container">
      <h2>Edit Post</h2>
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <input type="text" name="title" class="form-control" placeholder="Masukkan Judul Post" value="{{ $post->title }}"><br>
      <textarea name="content" class="form-control" placeholder="Masukkan Isi Post">{{ $post->content }}</textarea><br>
      <input type="file" class="form-control" name="thumbnail" style="height: auto;" accept="image/*"><br>
      <img src="{{ asset('img/' . $post->thumbnail) }}" alt="" width="150"><br><br>                
      <button type="submit" class="btn btn-primary">Post</button><br><br>
    </div>
  </form>
@endsection
