<?php

namespace App\Livewire\Campaigns;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('New Campaign')]
class CampaignWizard extends Component
{
    public $currentStep = 1;

    public function render()
    {
        return view('pages.campaigns.create');
    }
}
