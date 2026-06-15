<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Dashboard;
use App\Livewire\Campaigns\CampaignList;
use App\Livewire\Campaigns\CampaignWizard;
use App\Livewire\Contacts\ContactList;
use App\Livewire\Contacts\ProspectFinder;
use App\Livewire\Inbox\UnifiedInbox;
use App\Livewire\Pipeline\DealBoard;
use App\Livewire\EmailAccounts\AccountList;
use App\Livewire\Warmup\WarmupDashboard;
use App\Livewire\Templates\TemplateLibrary;
use App\Livewire\Workflows\WorkflowList;
use App\Livewire\Lists\EmailLists;
use App\Livewire\Linkedin\LinkedinOutreach;
use App\Livewire\Events\EventTriggers;
use App\Livewire\Events\ScheduledEvents;
use App\Livewire\Integrations\IntegrationHub;
use App\Livewire\Settings\WorkspaceSettings;
use App\Livewire\Billing\BillingSubscription;
use App\Livewire\Profile\UserProfile;
use App\Livewire\Affiliate\AffiliateDashboard;
use App\Livewire\Help\HelpCenter;

/*
|--------------------------------------------------------------------------
| 360Airo NextGen — Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/campaigns', CampaignList::class)->name('campaigns');
Route::get('/campaigns/create', CampaignWizard::class)->name('campaigns.create');
Route::get('/contacts', ContactList::class)->name('contacts');
Route::get('/contacts/prospect-finder', ProspectFinder::class)->name('contacts.finder');
Route::get('/inbox', UnifiedInbox::class)->name('inbox');
Route::get('/pipeline', DealBoard::class)->name('pipeline');
Route::get('/accounts', AccountList::class)->name('accounts');
Route::get('/warmup', WarmupDashboard::class)->name('warmup');
Route::get('/templates', TemplateLibrary::class)->name('templates');
Route::get('/workflows', WorkflowList::class)->name('workflows');

Route::get('/linkedin', LinkedinOutreach::class)->name('linkedin');
Route::get('/lists', EmailLists::class)->name('lists');
Route::get('/events', EventTriggers::class)->name('events');
Route::get('/scheduled', ScheduledEvents::class)->name('scheduled');
Route::get('/integrations', IntegrationHub::class)->name('integrations');
Route::get('/settings', WorkspaceSettings::class)->name('settings');
Route::get('/billing', BillingSubscription::class)->name('billing');
Route::get('/profile', UserProfile::class)->name('profile');
Route::get('/affiliate', AffiliateDashboard::class)->name('affiliate');
Route::get('/help', HelpCenter::class)->name('help');

