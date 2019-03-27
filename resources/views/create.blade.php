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
  <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
    <div class="container">
      <h2>Tambah Data</h2>
      {{ csrf_field() }}
      <input type="text" name="title" class="form-control" placeholder="Masukkan Judul Post" value="{{ old('title') }}"><br>
      <textarea name="content" class="form-control" placeholder="Masukkan Isi Post">{{ old('content') }}</textarea><br>
      <input type="file" class="form-control" name="thumbnail" style="height: auto;"> <br>
      <button type="submit" class="btn btn-primary">Post</button>
    </div>    
  </form>
@endsection
