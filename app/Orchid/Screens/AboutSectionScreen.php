<?php

namespace App\Orchid\Screens;

use App\Models\About;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class AboutSectionScreen extends Screen
{


    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'about' => About::first(),
            
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'About';
    }
    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Update the about section details';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create New List Detail')
                ->icon('pencil')
                ->method('save'),
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
            //Image and Description
            Layout::columns([
                Layout::rows([
                    Cropper::make('about.image_path')
                        ->width(624)
                        ->height(811)
                        ->title('Upload Image')->targetUrl()
                ])->title('Image About Me'),
                Layout::rows([
                    TextArea::make('about.description')
                        ->title('Write Your Description')
                        ->placeholder('Long description here')
                        ->rows(10),
                ])->title('About Description'),
                
            ]),
        ];
    }

    public function save(Request $request)
    {
        $about = About::first();
        $about->fill($request->input('about'));
        
        $about->save();

        Alert::info("Hero section updated successfully.");

        redirect(route('platform.about'));
    }
}
