<?php

namespace App\Livewire\Contacts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Contacts')]
class ContactList extends Component
{
    public function render()
    {
        return view('pages.contacts.index');
    }
}
