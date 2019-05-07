<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use DB;

class CommentController extends Controller
{
    public function show($id)
    {
        $comment = DB::table('comments')
                        ->leftJoin('users', 'comments.user_id', '=', 'users.id')
                        ->select('comments.*', 'users.name')
                        ->where('post_id', '=', $id)
                        ->get();

        return view('comment')->with('comments', $comment);
    }

    public function create(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->input('post_id');
        $comment->message = $request->input('message');
        $comment->save();

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $post = DB::table('comments')
                    ->where('comment_id', '=', $id)
                    ->delete();

        return redirect()->route('home');
    }
}
