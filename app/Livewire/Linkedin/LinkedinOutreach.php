<?php

namespace App\Livewire\Linkedin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('LinkedIn Outreach')]
class LinkedinOutreach extends Component
{
    public function render()
    {
        return view('pages.linkedin.index');
    }
}
