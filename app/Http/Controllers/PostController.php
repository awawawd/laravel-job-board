<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    $data = Post::paginate(10);
    //pass data to the view
    return view('post.index',['posts' => $data,'pageTitle' => "Blog"]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view(view: "post.create",["PageTitle" => "create title"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //#TODO
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post,'PageTitle' => $post->title]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view("post.edit",["PageTitle" => "create title"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //#TODO
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //#TODO
    }
}
