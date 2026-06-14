<?php

namespace App\Livewire\Events;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Scheduled Events')]
class ScheduledEvents extends Component
{
    // Dummy state for the frontend to render smoothly
    public $currentMonth = 'June 2026';
    public $viewMode = 'Month';
    
    public $stats = [
        'scheduled' => 0,
        'completed' => 0,
        'no_show' => 0,
        'cancelled' => 0,
    ];

    public function setViewMode($mode)
    {
        $this->viewMode = $mode;
    }

    public function refreshEvents()
    {
        // Simulate network delay
        sleep(1);
        $this->dispatch('events-refreshed');
    }

    public function render()
    {
        return view('pages.events.scheduled');
    }
}
