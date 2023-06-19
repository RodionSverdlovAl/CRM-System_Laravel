<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $data['likes'] = 0;
        $tags = $data['tags'];
        unset($data['tags']);
        $post =  Post::create($data);
        $post->tags()->attach($tags);
    }

    public function update($data, Post $post)
    {
        $data['likes'] = 0;
        $tags = $data['tags'];
        unset($data['tags']);
        $post->update($data);
        $post->tags()->sync($tags);
    }
}
