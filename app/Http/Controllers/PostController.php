<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function post(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|max:20|string',
                'content' => 'required|string',
            ]
        );
        $validated['user_id'] = auth()->id();

        post::create($validated);
        return redirect('/posts');
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
            $post = post::findOrFail($id);
            $post->title = $request->title;
            $post->content =  $request->content;
            $post->save();
        }

        return redirect('/posts');
    }

    public function getMyPosts(){
        $userId = auth()->id();
        $posts = post::where('user_id', $userId)->get();

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
