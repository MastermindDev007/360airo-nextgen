<?php

namespace App\Livewire\Campaigns;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Campaigns')]
class CampaignList extends Component
{
    public function render()
    {
        return view('pages.campaigns.index');
    }
}
