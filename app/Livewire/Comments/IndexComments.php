<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

class IndexComments extends Component
{

    public $records;
    public $getIdPost;
    public $recordPost;
    public $countPost;


    public function mount($idPost)
    {
        $this->getIdPost = $idPost;
    }

    public function render()
    {
        $comments = Comment::join('users', 'users.id', '=', 'comments.user_id')->join('posts', 'posts.id', '=', 'comments.post_id')->select('comments.*', 'users.name', 'posts.title')->where('post_id', $this->getIdPost)->get();
        $dataPost = Post::find($this->getIdPost);
        return view('livewire.comments.index-comments', [
            'comments' => $this->records = $comments,
            'idPost' => $this->recordPost = $dataPost
        ]);
    }

    public function delete($id)
    {
        $data = Comment::find($id);
        $data->delete();
        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('dashboard');
    }

    public function update()
    {
        $data = Comment::find($id);
        $this->comment_id = $data->id;
        $this->post_id = $data->post_id;
        $this->user_id = $data->user_id;
        $this->message = $data->message;
    }

    public function getById($id)
    {
        $data = Comment::find($id);
        if ($data) {
            $this->comment_id = $data->id;
            $this->post_id = $data->post_id;
            $this->user_id = $data->user_id;
            $this->message = $data->message;
        } else {
            return session()->flash('message', 'Data tidak ditemukan');
        }
    }
}
