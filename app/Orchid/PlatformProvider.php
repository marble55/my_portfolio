<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Hero')
                ->title('Portfolio Sections')
                ->route('platform.hero'),

            Menu::make('About')
                ->route('platform.about')
                ->list([
                    Menu::make('Facts List')->route('platform.about.facts', ['category' => 'fact']),
                ]),

            Menu::make('Abilities')
                ->list([
                    Menu::make('Skill List')->route('platform.about.skill', ['category' => 'Skill']),
                    Menu::make('Experience List')->route('platform.about.experience', ['category' => 'Experience']),
                    Menu::make('Education List')->route('platform.about.education', ['category' => 'Education']),
                ]),

                Menu::make('Services')->route('platform.services'),
                Menu::make('Portfolio')->route('platform.portfolio'),
                Menu::make('Contact')->route('platform.contact')->list([
                Menu::make('Links')->route('platform.contact.links'),
                Menu::make('Messages')->route('platform.contact.messages'),
            ]),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
