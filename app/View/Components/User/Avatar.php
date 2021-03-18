<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class Avatar extends Component
{

    public $user;

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.user.avatar');
    }
}
