<?php

namespace App\Livewire\Contacts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Buy Prospects')]
class BuyProspects extends Component
{
    public function render()
    {
        return view('pages.contacts.buy-prospects');
    }
}
