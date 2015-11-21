<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Article;
use Auth;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CommentRequest $request)
    {
        $comment = new Comment($request->all());
        Auth::user()->comments()->save($comment);

        $flash = ['flash_message' => 'Comment has been added successfully!'];
        if ($request->ajax()) {
            return response()->json($flash + [ 'html' => view('comments._single', compact('comment'))->render() ]);
        } else {
            return redirect()->back()->with($flash);
        }
    }

    public function destroy(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        $flash = ['flash_message' => 'Comment has been deleted successfully!'];
        if ($request->ajax()) {
            return response()->json($flash);
        } else {
            return redirect()->back()->with($flash);
        }
    }
}
