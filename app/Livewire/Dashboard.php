<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('pages.dashboard');
    }
}
