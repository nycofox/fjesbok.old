<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('post.create');
    }

    public function show(Post $post)
    {
        return view('post.show')->with([
            'post' => $post,
      ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => ['required', 'min:3'],
            'upload' => ['mimes:jpeg,png,gif,webp'],
        ]);

        if ($request->file('upload')) {
            $media = Media::storeRequest($request->file('upload'), auth()->id());
        }

        $post = Post::create([
            'body' => $request->body,
            'user_id' => auth()->id(),
            'media_id' => $media->id ?? null,
        ]);

        $post->upvote();

        // Todo: Add self-like

        return redirect(route('home'));
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect()->back();
    }

    public function addComment(Post $post, Request $request)
    {
        $post->addComment($request->body);

        return redirect(route('post.show', $post));
    }
}
