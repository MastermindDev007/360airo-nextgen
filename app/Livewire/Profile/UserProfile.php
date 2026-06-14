<?php

namespace App\Livewire\Profile;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('User Profile')]
class UserProfile extends Component
{
    public function render()
    {
        return view('pages.profile.index');
    }
}
