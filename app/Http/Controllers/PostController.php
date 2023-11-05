<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\PostRepositories;

class PostController extends Controller
{

    public function __construct(PostRepositories $postRepositories) {
        $this->postRepositories = $postRepositories;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->postRepositories->get();
        return view('livewire.post.blogCard', ['data' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('blog.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $this->postRepositories->tambahData($request->userId, $request->title, $request->description);
        dd($data);
        if ($data) {
        return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput(request()->all())->withErrors("messages","Gagal Menambahkan Data");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = $this->postRepositories->getById($id);
        return view('blog.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = $this->postRepositories->getById($id);
        // dd($data);
        return view('blog.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $this->postRepositories->updateData($request->postId, $request->userId, $request->title, $request->description);

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
        $this->postRepositories->deleteData($id);
        return redirect()->route('dashboard');
    }
}
