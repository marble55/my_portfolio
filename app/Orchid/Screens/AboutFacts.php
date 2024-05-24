<?php

namespace App\Orchid\Screens;

use App\Models\AboutList;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\TD;

class AboutFacts extends Screen
{
    private $category;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->category = request()->route('category');

        return [
            'fact1' => AboutList::find(1),
            'fact2' => AboutList::find(2),
            'fact3' => AboutList::find(3),
            //'aboutList' => AboutList::where('category', '=', $this->category)->first() // Assuming there's only one record
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Facts About Me';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
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
            //====FACT1===//
            Layout::rows([
                Input::make('fact1.title')
                    ->title('Title')
                    ->placeholder('Write title')
                    ->required(),

                Input::make('fact1.description')
                    ->title('Description')
                    ->placeholder('Insert attractive text')
                    ->help('Specify short yet descriptive text')
                    ->required(),

                Input::make('fact1.icon')
                    ->title('Icon'),

                Button::make('Save')->method('save', ['id' => 1])
            ])->title('Fact 1'),

            //====FACT2===//
            Layout::rows([
                Input::make('fact2.title')
                    ->title('Title')
                    ->placeholder('Write title')
                    ->required(),

                Input::make('fact2.description')
                    ->title('Description')
                    ->placeholder('Insert attractive text')
                    ->help('Specify short yet descriptive text')
                    ->required(),

                Input::make('fact2.icon')
                    ->title('Icon'),

                Button::make('Save')->method('save', ['id' => 2])
            ])->title('Fact 2'),

            //====FACT3===//
            Layout::rows([
                Input::make('fact3.title')
                    ->title('Title')
                    ->placeholder('Write title')
                    ->required(),

                Input::make('fact3.description')
                    ->title('Description')
                    ->placeholder('Insert attractive text')
                    ->help('Specify short yet descriptive text')
                    ->required(),

                Input::make('fact3.icon')
                    ->title('Icon'),

                Button::make('Save')->method('save', ['id' => 3])
            ])->title('Fact 3')
        ];
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     *
     * @return void
     */
    public function save(Request $request, $id)
    {
        
        $inputs = $request->all();
        
        if($id == 1)
        $input = $inputs['fact1'];
        elseif($id ==  2)
        $input = $inputs['fact2'];
        else
        $input = $inputs['fact3'];
        
        $data = AboutList::find($id);
        $data->fill($input);
        $data->save();

        Alert::info('Fact '.$id.' has been updated');

    }
}
