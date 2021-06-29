<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Content;
use App\Users;
use Session;


class CommentController extends Controller
{
    public function commentdb()
    {
        if(Session()->get('level') == 'admin'){
            $halaman = 'comment';
            $comment_list = Comment::orderBy('content_id', 'asc')->paginate(5);
            $comment_count = Comment::count(); 
            return view ('adminpage.comment_db', compact('halaman', 'comment_list', 'comment_count'));
        }else{
            return abort(404);
        }
    }

    public function comment()
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium'){
            $halaman = 'comment';
            $comment_list = Comment::where('user_id', Session()->get('id'))->orderBy('content_id', 'asc')->paginate(5);
            $comment_count = Comment::count(); 
            return view ('memberpage.comment', compact('halaman', 'comment_list', 'comment_count'));
        }else{
            return abort(404);
        }
    }

    public function store($id, Request $request)
    {
        if(Session()->get('level') == 'member' || Session()->get('level') == 'premium' ){
            Comment::create([
                'user_id' => Session()->get('id'),
                'content_id' => $id,
                'text' => $request->text,
            ]);
            return redirect()->back();
        }else{
            return abort(404);
        }
    }

    public function delete($id){
        if(Session()->get('level') == 'admin'){
            $comment = Comment::findOrFail($id);
            $comment->delete();
            return redirect('commentdb');
        }else{
            return abort(404);
        }
    }
}
