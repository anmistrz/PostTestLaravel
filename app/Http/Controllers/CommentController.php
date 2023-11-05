<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Repositories\CommentRepositories;

class CommentController extends Controller
{
    public function __construct(CommentRepositories $commentRepositories) {
        $this->commentRepositories = $commentRepositories;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->commentRepositories->getById($id);
        return view('comments.edit', ['data' => $data]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $this->commentRepositories->updateData($request->commentId, $request->postId, $request->userId, $request->message);
        if ($data) {
            return redirect()->route('dashboard');
            } else {
            return redirect()->back()->withInput(request()->all())->withErrors("messages","Gagal Menambahkan Data");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->commentRepositories->deleteData($id);
        return redirect()->route('dashboard');
    }
}
