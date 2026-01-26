<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
    //Eloquent ORM -> Get all data

    $data = Post::cursorPaginate(5);

    //pass data to the view
    return view('post.index',['posts' => $data,'pageTitle' => "Blog"]);
    }
    function show($id){
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post,'PageTitle' => $post->title]);
    }

    function create() {
        // $post = Post::create([
        //     'title' => 'My First post22',
        //     'body' => 'This is my content',
        //     'author' => 'ahmad',
        //     'published' => true
        // ]);
        Post::factory(100)->create();

        return redirect('/blog');
    }
    function delete(){
        Post::destroy(3);
    }
}
