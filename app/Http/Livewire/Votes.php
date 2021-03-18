<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Votes extends Component
{

    public $voteable;

    public function render()
    {
        return view('livewire.votes');
    }

    public function upvote()
    {
        $this->voteable->upvote();
    }

    public function downvote()
    {
        $this->voteable->downvote();
    }

}
