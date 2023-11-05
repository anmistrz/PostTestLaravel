<?php

namespace App\Repositories;

use App\Models\Comment;

class CommentRepositories {

    public function __construct(Comment $comment){
        $this->comment = $comment;
    }

    public function get(){
        return Comment::all();
    }


    public function getById($id){
        return $this->comment->find($id);
    }

    public function updateData($id, $postId, $userId, $message){
        $update = $this->comment->where('id', $id)->update([
            'user_id' => $userId,
            'post_id' => $postId,
            'message' => $message,
            'created_at' => now()
        ]);
        return $update;
    }

    public function deleteData($id) {
        $delete = $this->comment->where('id', $id)->delete();
        return $delete;
    }
    



}