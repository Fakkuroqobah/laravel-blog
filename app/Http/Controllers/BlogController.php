<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\FormRequestStore;
use Storage;

class BlogController extends Controller
{
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->paginate(8);
  
    return view('post', compact('posts'));
  }

  public function show($id)
  {
    $posts = Post::find($id);
  
    return view('show', compact('posts'));
  }

  public function create()
  {
    return view('create');
  }

  public function store(FormRequestStore $request)
  {    
    $thumbnail = $request->file('thumbnail')->store('thumbnail');

    Post::create([
      'title'     => request('title'),
      'content'   => request('content'),
      'thumbnail' => $thumbnail
    ]);    
    
    return redirect()->route('post.index')->withsuccess('Data berhasil ditambahkan');
  }

  public function edit($id)
  {
    $post = Post::find($id);
    return view('edit', compact('post'));
  }

  public function update(FormRequestStore $request, $id)
  {
    $post = Post::find($id);       

    if(empty($request->file('thumbnail'))) {
      $thumbnail = $post->thumbnail;
    }else {
      $thumbnail = $request->file('thumbnail')->store('thumbnail');    
      $old = $post->thumbnail;
      Storage::delete($old);
    }
    
    $post->update([
      'title' => request('title'),
      'content' => request('content'),
      'thumbnail' => $thumbnail
    ]);

    return redirect()->route('post.index')->withsuccess('Data berhasil diedit');
  }

  public function destroy($id)
  {
    $post = Post::find($id);        
    $post->delete();

    return redirect()->route('post.index')->withwarning('Data berhasil dihapus');
  }

  public function trash()
  {
    $posts = Post::onlyTrashed()->paginate(8);    
  
    return view('trash', compact('posts'));
  }     

  public function restore($id)
  {
    Post::onlyTrashed()->where('id', $id)->restore();
  
    return redirect()->route('post.index')->withsuccess('Data berhasil direstore');
  }

  public function forcedelete($id)
  {
    $post = Post::onlyTrashed()->find($id);   
    $old = $post->thumbnail;    
    Storage::delete($old);

    Post::onlyTrashed()->where('id', $id)->forcedelete();
  
    return redirect()->route('post.index')->withdanger('Data berhasil dihapus Secara Permanen');
  }

  public function search(Request $request)
  {
    $search = $request->get('q');
    $result = Post::where('title', 'LIKE', '%' . $search . '%')->orwhere('content', 'LIKE', '%' . $search . '%')->paginate(10);

    return view('result', compact('search', 'result'));
  }

}