<?php

namespace App\Livewire\Billing;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Billing & Subscription')]
class BillingSubscription extends Component
{
    public function render()
    {
        return view('pages.billing.index');
    }
}
