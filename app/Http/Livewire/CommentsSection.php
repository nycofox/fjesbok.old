<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public Post $post;

    public $body;

    protected $rules = [
        'body' => 'required|min:5'
    ];

    public function render()
    {
        return view('livewire.comments-section');
    }

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'body' => $this->body,
            'user_id' => auth()->id(),
            'commentable_id' => $this->post->getKey(),
            'commentable_type' => 'App\Models\Post',
        ]);

        $this->body = '';

        $this->post->refresh();

        session()->flash('success_message', 'Your comment has been posted!');

    }
}
