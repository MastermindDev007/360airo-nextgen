<?php

namespace App\Livewire\Events;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Events & Triggers')]
class EventTriggers extends Component
{
    public function render()
    {
        return view('pages.events.index');
    }
}
