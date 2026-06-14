<?php

namespace App\Livewire\Warmup;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Email Warmup')]
class WarmupDashboard extends Component
{
    public function render()
    {
        return view('pages.warmup.index');
    }
}
