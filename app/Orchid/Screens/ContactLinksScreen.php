<?php

namespace App\Orchid\Screens;

use App\Models\ContactLink;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ContactLinksScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'contactLinks' => ContactLink::get(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Contact Links';
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
            Layout::table('contactLinks', [
                //Title col
                TD::make('contactLinks.platform', 'Platform')
                    ->render(function (ContactLink $contactLinks) {
                        return ModalToggle::make($contactLinks->platform)
                            ->modal('createUpdateModal')
                            ->method('update', ['contactLinks' => $contactLinks->id]);
                    })->popover("Click on the title to edit"),

                //Description col
                TD::make('contactLinks.link', "Profile Link")->render(function (ContactLink $contactLinks) {
                    return $contactLinks->link;
                }),

                //Description col
                TD::make('contactLinks.icon_path', "Icon")->render(function (ContactLink $contactLinks) {
                    return $contactLinks->icon_path;
                }),

                //Delete Button
                TD::make('delete', 'Delete')->render(function (ContactLink $contactLinks) {
                    return Button::make('Delete')->method('delete', ['contactLinks' => $contactLinks->id])->confirm('Are you sure to delete ' . $contactLinks->title . '?')->icon('trash');
                })->alignRight(),
            ])->title('Table'),

            //Modal
            Layout::modal('createUpdateModal', [
               
                Layout::rows([
                    Input::make('contactLinks.platform')
                        ->title('Platform')
                        ->placeholder('fakebook')
                        ->required(),
                    Input::make('contactLinks.link')
                        ->title('Link')
                        ->required()
                        ->popover('Leave # if no link to input yet')
                        ->placeholder('#'),
                    Input::make('contactLinks.icon_path')
                        ->title('Icon')
                        ->popover('refer to fa icon for icons')
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

        $contactLinks = new ContactLink();
        $contactLinks->fill($request->get('contactLinks'))->save();
    }


    /**
     * @param ContactLink $contactLinks
     *
     * @return void
     */
    public function delete(ContactLink $contactLinks)
    {
        $contactLinks->delete();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     *
     * @return void
     */
    public function update(Request $request, ContactLink $contactLinks)
    {
        //Validation for the new data
        // $request->validate([
        //     'task.name' => 'required|max:225'
        // ]);

        $contactLinks->update([
            'title' => $request->input('contactLinks.title'),
            'description' => $request->input('contactLinks.title'),
            'image_path' => $request->input('contactLinks.image_path')
        ]);
    }
}
