<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class AboutListEditScreen extends Screen
{


    public function Skill(){
        $this->category = request()->route('category');
    }
    protected $category;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        
        $this->category = request()->route('category');
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category;//$this->post->exists ? 'Edit detail' : 'Creating a new post';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create Post')
                ->icon('pencil')
                ->method('createOrUpdate'),
                //->canSee(!$this->post->exists),


            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate'),
                //->canSee($this->post->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove'),
                //->canSee($this->post->exists),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Select::make('aboutList.category')
                    ->title('category')
                    ->required()
                    ->options([
                        'Skill' => 'Skill',
                        'Experience' => 'Experience',
                        'Education' => 'Education',
                    ]),

                Input::make('aboutList.title')
                    ->title('Title')
                    ->placeholder('Write title'),
                Input::make('aboutList.description')
                    ->title('Description')
                    ->placeholder('Insert attractive title')
                    ->help('Specify short yet descriptive text'),
            ])
        ];
    }
}
