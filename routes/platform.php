<?php

declare(strict_types=1);

use App\Http\Controllers\HeroSectionController;
use App\Orchid\Screens\AboutFacts;
use App\Orchid\Screens\AboutListEditScreen;
use App\Orchid\Screens\AboutListScreen;
use App\Orchid\Screens\AboutSectionScreen;
use App\Orchid\Screens\ContactLinksScreen;
use App\Orchid\Screens\ContactListScreen;
use App\Orchid\Screens\ContactMessageScreen;
use App\Orchid\Screens\ContactScreen;
use App\Orchid\Screens\Examples\ExampleActionsScreen;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleGridScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\HeroSectionScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\PortfolioScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\ServicesScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Hero
Route::screen('hero', HeroSectionScreen::class)->name('platform.hero');

// Hero update -not working
Route::put('/hero/update', [HeroSectionController::class, 'update'])
    ->name('hero.update');

// About
Route::screen('/about', AboutSectionScreen::class)->name('platform.about')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('About'), route('platform.about')));;

//About > {facts}
Route::screen('about/facts/{category}', AboutFacts::class)->name('platform.about.facts')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.about')
        ->push(__('Facts'), route('platform.about.facts', ['category' => 'fact'])));


//About > {Skill}
Route::screen('about/list1/{category}', AboutListScreen::class)->name('platform.about.skill')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.about')
        ->push(__('Skill'), route('platform.about.skill', ['category' => 'Skill'])));

//About > {Experience}
Route::screen('about/list2/{category}', AboutListScreen::class)->name('platform.about.experience')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.about')
        ->push(__('Experience'), route('platform.about.experience', ['category' => 'Experience'])));

//About > {Education}
Route::screen('about/list3/{category}', AboutListScreen::class)->name('platform.about.education')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.about')
        ->push(__('Education'), route('platform.about.education', ['category' => 'Education'])));


// About > {category} > Edit
Route::screen('about/list1/{category}/edit', AboutListEditScreen::class)
    ->name('platform.about.edit');

// Services
Route::screen('services', ServicesScreen::class)->name('platform.services')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Services'), route('platform.services')));;

// Portfolio
Route::screen('portfolio', PortfolioScreen::class)->name('platform.portfolio')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Portfolio'), route('platform.portfolio')));;

// Contact
Route::screen('contact', ContactScreen::class)->name('platform.contact')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Contact'), route('platform.contact')));;

// Contact > Links
Route::screen('contact/links', ContactLinksScreen::class)->name('platform.contact.links')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.contact')
        ->push(__('Links'), route('platform.contact.links')));;

// Contact > Messages
Route::screen('contact/messages', ContactMessageScreen::class)->name('platform.contact.messages')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.contact')
        ->push(__('Links'), route('platform.contact.messages')));
        
// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn (Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn (Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(fn (Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Example Screen'));

Route::screen('/examples/form/fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('/examples/form/advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');
Route::screen('/examples/form/editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('/examples/form/actions', ExampleActionsScreen::class)->name('platform.example.actions');

Route::screen('/examples/layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('/examples/grid', ExampleGridScreen::class)->name('platform.example.grid');
Route::screen('/examples/charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('/examples/cards', ExampleCardsScreen::class)->name('platform.example.cards');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
