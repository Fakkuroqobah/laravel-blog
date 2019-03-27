@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
  <div class="row">

    <h1 class="text-center">Easystem</h1>

    <br>
      <center><a href="{{ route('post.create') }}" class="btn btn-primary">Isi Data</a></center><br>
      <center><a href="{{ route('post.trash') }}" class="btn btn-primary">Halaman Trash</a></center>
      <br>    

      <div class="container">
        <form action="{{ route('post.search') }}" method="get">
          <input type="text" name="q" class="form-control" placeholder="Search..." style="width: 95%; display: inline;">
          <button type="submit" class="btn btn-primary">Cari</button>
          <br><br>
        </form>
      </div>

      @foreach ($posts as $post)
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="{{ asset('img/' . $post->thumbnail) }}" alt="thumbnail">            
            <div class="caption">
              <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h3>
              <p>{{ str_limit($post->content, 80, ' Baca Selengkapnya ...') }}</p>
              <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning easy-link">Edit</a>
              <form action="{{ route('post.destroy', $post->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" name="delete" class="btn btn-danger easy-link">Hapus</button>                                 
              </form>
            </div>
          </div>
        </div>
      @endforeach            
      
      {{ $posts->render() }}
    
  </div>
@endsection
