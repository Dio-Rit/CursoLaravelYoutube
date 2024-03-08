<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
 public function index()
 {
    $posts = Post::orderBy('id', 'asc')->paginate(3);
    return view("admin.posts.index", compact("posts"));
 }

public function create()
{
    return view("admin.posts.create");
}

public function store(StoreUpdatePost $request)
{

    if ($request->image->isValid()){

        $image = $request->image->store('posts');
        $data['image'] = $image;

    }

    Post::create($data);

    return redirect()->route('posts.index')
    ->with('message','Post criado com sucesso');
}

public function show($id)
{
    if (!$post = Post::find($id)){
        return redirect()->route('posts.index');
    };
    
    return view('admin.posts.show', compact('post'));
}

public function destroy($id)
{
    if (!$post = Post::find($id))
        return redirect()->route('posts.index');
            $post->delete();

    return redirect()->route('posts.index')
                     ->with('message','Post Deletado com sucesso');
}

public function edit($id)
{
    if (!$post = Post::find($id)){
        return redirect()->back();
    }
    
    return view('admin.posts.edit', compact('post'));
}

public function update(StoreUpdatePost $request ,$id)
{
    if (!$post = Post::find($id)){
        return redirect()->back();
    }

    $post->update($request->all());

    return redirect()->route('posts.index')
                     ->with('message','Post atualizado com sucesso');
}

public function search(Request $request)
{
    $filters = $request->except('_token');

    $posts = Post::where('title','=',"%{$request->search}%")
                ->orWhere("content",'LIKE',"%{$request->search}%")
                ->paginate();

    return view('admin.posts.index', compact('posts', 'filters'));
}

}
