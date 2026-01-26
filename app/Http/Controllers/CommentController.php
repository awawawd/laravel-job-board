<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function index(){
    //Eloquent ORM -> Get all data

    $data = Comment::paginate(5);

    //pass data to the view
    return view('comment.index',['comments' => $data,'pageTitle' => "Blog"]);
    }


    function create() {
        // Comment::create([
        //     'author' => 'noor',
        //     'content' => 'This is a test comment',
        //     'post_id' => 3,
        // ]);
        Comment::factory(10)->create();
        return redirect('/comments');
    }
}
