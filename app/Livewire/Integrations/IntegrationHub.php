<?php

namespace App\Livewire\Integrations;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Integrations')]
class IntegrationHub extends Component
{
    public function render()
    {
        return view('pages.integrations.index');
    }
}
