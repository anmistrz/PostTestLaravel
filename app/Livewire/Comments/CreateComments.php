<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;

class CreateComments extends Component
{
    public $getIdPost;
    public $getIdUser;
    public $message;

    public function mount($idPost, $idUser)
    {
        $this->getIdPost = $idPost;
        $this->getIdUser = $idUser;
    }


    public function render()
    {
        return view('livewire.comments.create-comments', [
            'idPost' => $this->getIdPost
        ]);
    }


    public function store()
    {

        // $this->validate([
        //     'message' => 'required|min:25',

        // ]);

        

        Comment::create([
            'post_id' => $this->getIdPost,
            'user_id' => $this->getIdUser,
            'message' => $this->message,
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('dashboard');

    }
}
