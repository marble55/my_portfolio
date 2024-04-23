<?php

namespace App\Orchid\Screens;

use App\Models\Service;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ServicesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */


    public function query(): iterable
    {
        return [
            'services' => Service::get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Services';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Add New Sevices')
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
            //Table
            Layout::table('services', [
                //Title col
                TD::make('services.title', 'Title')
                    ->render(function (Service $services) {
                        return ModalToggle::make($services->title)
                            ->modal('createUpdateModal')
                            ->method('update', ['services' => $services->id]);
                    })->popover("Click on the title to edit"),

                //Description col
                TD::make('services.description', "Description")->render(function (Service $services) {
                    return $services->description;
                })->width('500px'),

                TD::make('services.icon_path', "Icon Path")->render(function (Service $services) {
                    return $services->icon_path;}),

                //Delete Button
                TD::make('delete', 'Delete')->render(function (Service $services) {
                    return Button::make('Delete')->method('delete', ['services' => $services->id])->confirm('Are you sure to delete ' . $services->title . '?')->icon('trash');
                })->alignRight(),
            ])->title('Table'),

            //Modal
            Layout::modal('createUpdateModal', [
                
                Layout::rows([
                    Input::make('services.title')
                        ->title('Title')
                        ->placeholder('Write title')
                        ->required(),
                    TextArea::make('services.description')
                        ->title('Description')
                        ->rows(10)
                        ->placeholder('Insert attractive description')
                        ->required(),
                    Input::make('services.icon_path')
                        ->title('Icon')
                        ->placeholder('Set icon link')
                        ->popover('Refer to FA icons for the icons')
                        ->required(),
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

        $services = new Service();
        $services->fill($request->get('services'))->save();
    }


    /**
     * @param Service $services
     *
     * @return void
     */
    public function delete(Service $services)
    {
        $services->delete();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     *
     * @return void
     */
    public function update(Request $request, Service $services)
    {
        //Validation for the new data
        // $request->validate([
        //     'task.name' => 'required|max:225'
        // ]);

        $services->update([
            'title' => $request->input('services.title'),
            'description' => $request->input('services.title'),
            'icon_path' => $request->input('services.icon_path')
        ]);
    }
}
