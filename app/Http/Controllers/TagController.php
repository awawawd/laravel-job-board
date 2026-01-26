<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class TagController extends Controller
{
    public function index(){
    //Eloquent ORM -> Get all data

    $data = Tag::all();

    //pass data to the view
    return view('tag.index',['tags' => $data,'pageTitle' => "Tags"]);
    }
    function create() {
        Tag::create([
            'title' => 'CSS',

        ]);
        return redirect('/tag');

    }

    function testManyToMany(){
        // $post1 = Post::find(1);
        // $post1->tags()->attach([1,2]);

        // return response()->json([
        //     'post1' => $post1->tags,
        // ]);
        $tag = Tag::find(1);
        $tag->posts()->attach(ids: [1]);
        return response()->json([
            "tag" => $tag->title,
            "posts" => $tag->posts
        ]);
    }


}
