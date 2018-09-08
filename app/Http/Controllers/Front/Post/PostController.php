<?php

namespace App\Http\Controllers\Front\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Front\Controller;

use App\Post;

class PostController extends Controller
{
    public function view(Request $request, Post $post)
    {
        $previous_post_id = Post::where('id', '<', $post->id)->max('id');

        $next_post_id = Post::where('id', '>', $post->id)->min('id');

        return view('front.posts.view', [
            'post' => $post,
            'previous_post_id' => $previous_post_id,
            'next_post_id' => $next_post_id,
        ]);
    }
}
