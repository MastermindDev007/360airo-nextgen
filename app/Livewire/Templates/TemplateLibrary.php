<?php

namespace App\Livewire\Templates;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Template Library')]
class TemplateLibrary extends Component
{
    public function render()
    {
        return view('pages.templates.index');
    }
}
