<?php

namespace App\Livewire\Help;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Help Center')]
class HelpCenter extends Component
{
    public function render()
    {
        return view('pages.help.index');
    }
}
