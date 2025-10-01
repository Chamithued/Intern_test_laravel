<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function post(PostRequest $request)
    {

        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        post::create($validated);
        return redirect('/posts')->with('success','post created successfully');
    

}

    public function getPosts()
    {

            $posts = post::all();

            return view('show', ['posts' => $posts]);

    }

    public function getPost($id)
    {
        $post = post::findOrFail($id);
    }

    public function edit($id)
    {
        $post = post::findOrFail($id);

        return view('edit', ['post' => $post]);
    }

    public function update($id, Request $request){
        $post = post::findOrFail($id);

        if ($post->user_id === auth()->id()) {
            $post->title = $request->title;
            $post->content =  $request->content;
            $post->save();
        }

        return redirect('/posts');
    }

    public function getMyPosts(){

        $userId = auth()->id();
        $posts = post::where('user_id', $userId)->get();


        /*if($posts->isEmpty()){
            abort(404);
        }*/

        return view('personalShow', ['posts' => $posts]);
        
    }

    public function delete($id)
    {
        $post = post::findOrFail($id);

        if ($post->user_id === auth()->id()) {
            $post = post::findOrFail($id);
            $post->delete();
        }

        return redirect('/posts');
    }
}
