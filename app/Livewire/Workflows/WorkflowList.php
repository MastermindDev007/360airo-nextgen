<?php

namespace App\Livewire\Workflows;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('AI Workflows')]
class WorkflowList extends Component
{
    public function render()
    {
        return view('pages.workflows.index');
    }
}
