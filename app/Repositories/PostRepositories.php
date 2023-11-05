<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepositories {

    public function __construct(Post $post){
        $this->post = $post;
    }

    public function get(){
        return Post::all();
    }

    public function tambahData($userId, $title, $description){
        try {
            $post = $this->post->create([
                'user_id' => $userId,
                'title' => $title,
                'description' => $description,
                'published_at' => now()
            ]);
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function getById($id){
        return $this->post->find($id);
    }

    public function updateData($postId, $userId, $title, $description){
        $update = $this->post->where('id', $postId)->update([
            'id' => $postId,
            'user_id' => $userId,
            'title' => $title,
            'description' => $description,
            'published_at' => now()
        ]);
        return $update;
    }

    public function deleteData($id) {
        $delete = $this->post->where('id', $id)->delete();
        return $delete;
    }
    



}