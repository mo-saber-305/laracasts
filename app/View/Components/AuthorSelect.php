<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class AuthorSelect extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $users = User::query()->get();
        return view('components.author-select', compact('users'));
    }
}
