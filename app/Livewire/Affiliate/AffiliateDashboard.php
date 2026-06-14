<?php

namespace App\Livewire\Affiliate;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Affiliate Program')]
class AffiliateDashboard extends Component
{
    public function render()
    {
        return view('pages.affiliate.index');
    }
}
