@extends('master')

@section('content')
  <div class="row">
    
    <br>
      <center>Isi Data</center><br>      
        <div class="col-md-3">
          <div class="thumbnail">
            <div class="caption">
              <h3>{{ $posts->title }}</h3>
              <p>{{ $posts->content }}</p>                                    
            </div>
          </div>
        </div>      
    
  </div>
@endsection
