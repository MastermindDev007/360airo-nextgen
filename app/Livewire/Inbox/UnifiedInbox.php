<?php

namespace App\Livewire\Inbox;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Unified Inbox')]
class UnifiedInbox extends Component
{
    public function render()
    {
        return view('pages.inbox.index');
    }
}
