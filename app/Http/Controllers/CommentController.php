<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Eloquent ORM -> Get all data

    $data = Comment::paginate(5);

    //pass data to the view
    return view('comment.index',['comments' => $data,'pageTitle' => "Blog"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Comment::factory(5)->create();
        return response(["message" => "Successful created!","createdCount" => 5], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment,'pageTitle' => 'view comment']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
            $comment = Comment::findOrFail($id);
        return view('comment.show', ['comment' => $comment,'PageTitle' => 'view comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
