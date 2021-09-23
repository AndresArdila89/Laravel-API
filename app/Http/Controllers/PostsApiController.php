<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsApiController extends Controller
{
    public function Index(){
        
        return Post::all();

    }

    public function AddPost(){

        request()->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ]
            );
        return Post::create(
            [
                'title' => request('title'),
                'content' => request('content'),
            ]
        );
    }

    public function UpdatePost(Post $post){
        request()->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ]
            );

        $success = $post->update(
            [
                'title' => request('title'),
                'content' => request('content'),
            ]
            );
        
            return ["success" => $success];
    }

    public function DeletePost(Post $post){
        $success = $post->delete();
        return ["success" => $success];
    }
}

