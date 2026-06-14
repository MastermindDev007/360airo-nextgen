<?php

namespace App\Livewire\EmailAccounts;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layout.app')]
#[Title('Email Accounts')]
class AccountList extends Component
{
    public function render()
    {
        return view('pages.email-accounts.index');
    }
}
