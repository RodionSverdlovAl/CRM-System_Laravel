<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $category = Category::find(1);
//        dd($category->posts);

//        $post = Post::find(2);
//        dd($post->tags);

//        $tags = Tag::find(1);
//        dd($tags->posts);

        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories','tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title'=>'required | string',
            'body'=>'required | string',
            'image'=> 'required | string',
            'category_id'=>'',
            'tags'=>''
        ]);
        $data['likes'] = 0;
        $tags = $data['tags'];
        unset($data['tags']);
        $post =  Post::create($data);
        $post->tags()->attach($tags);


        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title'=>'string',
            'body'=>'string',
            'image'=> 'string',
            'category_id'=>'',
            'tags' => ''
        ]);
        $data['likes'] = 0;
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show',$post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function firstOrCreate()
    {
        $post = Post::find(1);
        $anotherPost = [
            'title' => 'bam bam bam',
            'body' => 'Бам бам бам мы стреляем по хохлам',
            'image' => 'bambam.jpeg',
            'likes' => 68,
            'is_published' => 1,
        ];
        $myPost = Post::firstOrCreate(
            [
                'title' => 'bam bam bam'
            ],
            $anotherPost
        );
        dd($myPost);
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'dfghbam bam bam',
            'body' => 'updateorcreate Бам бам бам мы стреляем по хохлам',
            'image' => 'updateorcreatebambam.jpeg',
            'likes' => 68,
            'is_published' => 1,
        ];
        $myPost = Post::updateOrCreate(
            [
                'title' => 'dfghbam bam bam'
            ],
            $anotherPost
        );
        dd(22222);
    }
}
