<?php

namespace App\Livewire\Lists;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Email Lists')]
class EmailLists extends Component
{
    public $viewMode = 'Lists'; // Segmented control: Lists or Contacts
    public $layoutMode = 'Grid'; // Grid or List
    public $searchQuery = '';
    
    public function setViewMode($mode)
    {
        $this->viewMode = $mode;
    }

    public function setLayoutMode($mode)
    {
        $this->layoutMode = $mode;
    }

    public function render()
    {
        return view('pages.lists.index');
    }
}
