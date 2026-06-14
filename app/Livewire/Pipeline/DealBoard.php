<?php

namespace App\Livewire\Pipeline;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Pipeline CRM')]
class DealBoard extends Component
{
    public function render()
    {
        return view('pages.pipeline.index');
    }
}
