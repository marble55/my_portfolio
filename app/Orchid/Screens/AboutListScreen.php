<?php

namespace App\Orchid\Screens;

use App\Models\AboutList;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Psy\Util\Str;

class AboutListScreen extends Screen
{
    protected $category;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->category = request()->route('category');
        return [
            'aboutList' => AboutList::where('category', '=', $this->category)->get()
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
        return $this->category . ' List';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Add New List')
                ->modal('createUpdateModal')
                ->method('create')
                ->icon('plus')
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
            //Table to display list
            Layout::table('aboutList', [
                //Title col
                TD::make('aboutList.title', 'Title')
                    ->render(function (AboutList $aboutList) {
                        return ModalToggle::make($aboutList->title)
                            ->modal('createUpdateModal')
                            ->method('update', ['aboutList' => $aboutList->id]);
                    })->popover("Click on the title to edit"),

                //Description col
                TD::make('aboutList.description', "Description")->render(function (AboutList $aboutList) {
                    return $aboutList->description;
                }),

                TD::make("aboutList.icon","Icon")->render(function (AboutList $aboutList){
                    return $aboutList->icon;
                }),

                //Delete Button
                TD::make('delete', 'Delete')->render(function (AboutList $aboutList) {
                    return Button::make('Delete')->method('delete', ['aboutList' => $aboutList->id])->confirm('Are you sure to delete ' . $aboutList->title . '?')->icon('trash');
                })->alignRight(),
            ])->title('Table'),

            //Modal
            Layout::modal('createUpdateModal', [
                
                Layout::rows([
                    Select::make('aboutList.category')
                        ->options([
                            $this->category  => $this->category,
                        ]),

                    Input::make('aboutList.title')
                        ->title('Title')
                        ->placeholder('Write title')
                        ->required(),

                    Input::make('aboutList.description')
                        ->title('Description')
                        ->placeholder('Insert attractive text')
                        ->help('Specify short yet descriptive text')
                        ->required(),

                    Input::make('aboutList.icon')
                        ->title('Icon')
                ])
            ])->title('Create/Update')->applyButton('Apply'),
        ];
    }

    //---------CRUD Functions--------//
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function create(Request $request)
    {
        // Validate form data, save task to database, etc.
        // $request->validate([
        //     'task.name' => 'required|max:255',
        // ]);

        $aboutList = new AboutList();
        $aboutList->fill($request->get('aboutList'))->save();
    }


    /**
     * @param AboutList $aboutList
     *
     * @return void
     */
    public function delete(AboutList $aboutList)
    {
        $aboutList->delete();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     *
     * @return void
     */
    public function update(Request $request, AboutList $aboutList)
    {
        //Validation for the new data
        // $request->validate([
        //     'task.name' => 'required|max:225'
        // ]);

        $aboutList->update([
            'title' => $request->input('aboutList.title'),
            'description' => $request->input('aboutList.description'),
            'icon' => $request->input('aboutList.icon'),
        ]);
    }
}
