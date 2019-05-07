<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;
use DB;

class UserController extends Controller
{
    public function like($id)
    {
        $heart = [
            'post_id' => $id,
            'user_id' => Auth::user()->id
        ];
        Like::firstOrCreate($heart);

        return back();
    }

    public function unlike(Post $post)
    {
        $post->Post::like(Auth::user()->id)->delete();
        return back();
    }

    public function search(Request $request)
    {
        $response = DB::table('posts')
                        ->leftJoin('users', 'posts.user_id', '=', 'users.id')
                        ->where('content', 'like', '%'.$request->input('keyword').'%')
                        ->get();
        return view('search')->with('responses', $response);
    }

    public function create(Request $request)
    {
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('home');
    }

    public function show()
    {
        $post = Post::leftJoin('users', 'posts.user_id', '=', 'users.id')
                    ->orderBy('posts.post_id', 'DESC')
                    ->get();
        $comment = DB::table('comments')
                    ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                    ->select('comments.*', 'users.name')
                    ->get();
        return view('home')->with('posts', $post)->with('comments', $comment);
    }

    public function edit($id)
    {
        $post = DB::table('posts')
                    ->where('post_id', '=', $id)
                    ->first();
        return view('edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $post = DB::table('posts')
                    ->where('post_id', '=', $id)
                    ->update(['content' => $request->input('content')]);

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $post = DB::table('posts')
                    ->where('post_id', '=', $id)
                    ->delete();
        return redirect()->route('home');
    }
}
