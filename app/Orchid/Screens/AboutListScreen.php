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
    protected $aboutList;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $this->category = request()->route('category');
        $this->aboutList = AboutList::where('category', '=', $this->category)->get();
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
                ->modal('createUpdateModal')->method('createUpdate', [$this->aboutList])->icon('plus')
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
            //Table
            Layout::table('aboutList', [
                TD::make('aboutList.title', 'Title')
                ->render(function (AboutList $aboutList){
                    return ModalToggle::make($aboutList->title)->modal('createUpdateModal')->method('createUpdate', [$this ,$aboutList]);
                }),
                TD::make('aboutList.description', "Description"),
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
                ])
            ])->title('Update/Edit')->applyButton('Apply'),
        ];
    }

    public function createUpdate(Request $request, AboutList $aboutList){
        
        dd($aboutList);
        $aboutList->fill($request->get('aboutList'))->save();

        //dd($request->input('aboutList.category'));
        
        //route switch depending on the category
        switch($request->input('aboutList.category')){
            case 'Skill';    
                $route = 'platform.about.skill';
                $routeAr = ['category' => 'Skill'];
                break;
            case 'Experience':
                $route = 'platform.about.experience';
                $routeAr = ['category' => 'Experience'];
                break;
            case 'Education';
                $route = 'platform.about.education';
                $routeAr = ['category' => 'Education'];
                break;
        }
        return redirect()->route($route, $routeAr);
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

        $abousList = new AboutList();
        $aboutList->fill($request->get('aboutList'))->save();

        return 
    }

    /**
     * @param Task $task
     *
     * @return void
     */
    public function delete(Task $task)
    {
        $task->delete();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Task $task
     *
     * @return void
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task.name' => 'required|max:225'
        ]);

        $task->update([
            'name' => $request->input('task.name')
        ]);
    }
}
