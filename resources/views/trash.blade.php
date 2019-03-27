@extends('layouts.app')

@section('title', 'Halaman Trash')

@section('content')
    
@if(count($posts))

  <div class="row">    

    <h1 class="text-center">Halaman Trash</h1>

    <br>      
      @foreach ($posts as $post)
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="{{ asset('img/' . $post->thumbnail) }}" alt="thumbnail">     
            <div class="caption">
              <h3><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></h3>
              <p>{{ str_limit($post->content, 80, ' Baca Selengkapnya ...') }}</p>    
              <a href="{{ route('post.restore', $post->id) }}" class="btn btn-success">Restore</a>
              <a href="{{ route('post.forcedelete', $post->id) }}" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
      @endforeach

      {{ $posts->render() }}

    @else

    <h2 class="text-center">Data Sampah Kosong</h2>

  @endif
    
  </div>
@endsection
