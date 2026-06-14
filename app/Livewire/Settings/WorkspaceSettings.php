<?php

namespace App\Livewire\Settings;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Workspace Settings')]
class WorkspaceSettings extends Component
{
    public function render()
    {
        return view('pages.settings.index');
    }
}
