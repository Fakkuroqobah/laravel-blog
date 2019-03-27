@extends('master')

@section('title', 'Beranda')

@section('content')

@if(count($result))
  <div class="row">

    <h1 class="text-center">Easystem</h1>    

    <div class="container">
      <div class="alert alert-success">Data Yang Anda Cari {{ $search }}</div>
    </div>
    
      <div class="container">
        <form action="{{ route('post.search') }}" method="get">
          <input type="text" name="q" class="form-control" placeholder="Search..." style="width: 95%; display: inline;">
          <button type="submit" class="btn btn-primary">Cari</button>
          <br><br>
        </form>
      </div>

      @foreach ($result as $post)
        <div class="col-md-3">
          <div class="thumbnail">
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
      
      {{ $result->render() }}
    </div>

@else 
    <h1>Data Tidak Ditemukan</h1>
@endif
  
@endsection
