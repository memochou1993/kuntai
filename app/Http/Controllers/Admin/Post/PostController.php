<?php

namespace App\Http\Controllers\Admin\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\Controller;

use Jenssegers\Agent\Agent;
use Gate;
use App\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $agent = new Agent();

        $posts = Post::orderBy('pin', 'desc')->orderBy('id', 'desc')->paginate(10);

        return view('admin.posts.index', [
            'agent' => $agent,
            'posts' => $posts->appends(request()->input()),
        ]);
    }

    public function showAddForm(Request $request)
    {
        return view('admin.posts.add');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'pin' => 'required',
        ]);
        
        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->content = $request->input('content');
        $posts->pin = $request->input('pin');
        $posts->user_id = Auth::user()->id;
        $posts->save();

        return redirect()->route('admin.posts.view', $posts->id);
    }

    public function view(Request $request, Post $post)
    {
        $previous_post_id = Post::where('id', '<', $post->id)->max('id');

        $next_post_id = Post::where('id', '>', $post->id)->min('id');

        return view('admin.posts.view', [
            'post' => $post,
            'previous_post_id' => $previous_post_id,
            'next_post_id' => $next_post_id,
        ]);
    }

    public function showUpdateForm(Request $request, Post $post)
    {
        return view('admin.posts.update', [
            'post' => $post,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'pin' => 'nullable',
        ]);

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'pin' => $request->input('pin'),
            'editor' => Auth::user()->name,
        ]);
            
        return redirect()->route('admin.posts.view', $post);
    }

    public function destroy(Request $request, Post $post)
    {
        if (Gate::denies('destroy', $post)) {
            abort(403);
        }
        
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
