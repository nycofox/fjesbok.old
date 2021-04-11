<?php

namespace App\View\Components\User;

use App\Models\User;
use Illuminate\View\Component;

class Avatar extends Component
{

    public User $user;

    /**
     * Create the component instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.user.avatar');
    }
}
