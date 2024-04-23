<?php

namespace App\Orchid\Screens;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PortfolioScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */


    public function query(): iterable
    {
        return [
            'portfolios' => Portfolio::get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Portfolio';
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
            Layout::table('portfolios', [
                //Title col
                TD::make('portfolios.title', 'Title')
                    ->render(function (Portfolio $portfolios) {
                        return ModalToggle::make($portfolios->title)
                            ->modal('createUpdateModal')
                            ->method('update', ['portfolios' => $portfolios->id]);
                    })->popover("Click on the title to edit"),

                //Description col
                TD::make('portfolios.description', "Description")->render(function (Portfolio $portfolios) {
                    return $portfolios->description;
                })->width('500px'),

                //Image col
                TD::make('portfolios.image_path', "Image")
                    ->render(fn (Portfolio $portfolios) => // Please use view('path')
                            "<img src='{$portfolios->getAttribute('image_path')}'
                            alt='sample'class='mw-50 d-block img-fluid rounded-1 w-50'>"),

                //Delete Button
                TD::make('delete', 'Delete')->render(function (Portfolio $portfolios) {
                    return Button::make('Delete')->method('delete', ['portfolios' => $portfolios->id])->confirm('Are you sure to delete ' . $portfolios->title . '?')->icon('trash');
                })->alignRight(),
            ])->title('Table'),

            //Modal
            Layout::modal('createUpdateModal', [

                Layout::rows([
                    Input::make('portfolios.title')
                        ->title('Title')
                        ->placeholder('Bananajoe')
                        ->required(),
                    TextArea::make('portfolios.description')
                        ->title('Description')
                        ->rows(10)
                        ->placeholder('Description')
                        ->required(),
                    Cropper::make('portfolios.image_path')
                        ->required()->width(650)->height(800),
                    Picture::make("post.image_path")
                        ->title('All Files'),
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

        $portfolios = new Portfolio();
        $portfolios->fill($request->get('portfolios'))->save();
    }


    /**
     * @param Portfolio $portfolios
     *
     * @return void
     */
    public function delete(Portfolio $portfolios)
    {
        $portfolios->delete();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * 
     *
     * @return void
     */
    public function update(Request $request, Portfolio $portfolios)
    {
        //Validation for the new data
        // $request->validate([
        //     'task.name' => 'required|max:225'
        // ]);

        $portfolios->update([
            'title' => $request->input('portfolios.title'),
            'description' => $request->input('portfolios.title'),
            'image_path' => $request->input('portfolios.image_path')
        ]);
    }
}
