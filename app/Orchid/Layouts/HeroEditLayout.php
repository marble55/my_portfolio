<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class HeroEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('hero.occupation')
            ->type('text')
            ->max(20)
            ->required()
            ->title(__('Occupation'))
            ->placeholder(__('Occupation Title')),

            Input::make('hero.name_title')
            ->type('text')
            ->max(25)
            ->required()
            ->title(__('Name'))
            ->placeholder(__('Name Title')),

            Input::make('hero.sub_title')
            ->type('text')
            ->max(45)
            ->required()
            ->title(__('Description'))
            ->placeholder(__('Sub Title')),
        ];
    }
}
