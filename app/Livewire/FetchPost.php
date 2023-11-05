<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Comment;

class FetchPost extends Component
{
    public $records;
    public $post_id, $title, $description, $user_id;
    public $comments;

    public function render()
    {
        $record = Post::all();
        $comment = Comment::all();
        return view('livewire.post.fetch-post', [
            'posts' => $this->records = $record,
            'comment' => $this->comments = $comment
        ]);
    }

    // public function fetchbyid(int $id)
    // {
    //     $data = Post::find($id);
    //     if($data){
    //         $this->post_id = $data->id;
    //         $this->title = $data->title;
    //         $this->description = $data->description;
    //         $this->user_id = $data->user_id;
    //     } else {
    //         return session()->flash('message', 'Data tidak ditemukan');
    //     }
    // }
}
