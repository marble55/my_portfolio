<?php

namespace App\Orchid\Screens;

use App\Models\HeroSection;
use App\Orchid\Layouts\HeroEditLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Attach;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class HeroSectionScreen extends Screen
{

    public $heroSection;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        return [
            'hero' => HeroSection::first(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Hero Section';
    }
    
    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Update the hero section details';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Save')
                ->icon('note')
                ->method('save')
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
            Layout::block(HeroEditLayout::class)
                ->title('Hero Information')
                ->description('Update the Hero section details'),
            
            Layout::rows([
                Cropper::make('hero.image_path'),

                Upload::make('hero.attachment')
                    ->title('CV File')
                    ->maxFiles(1)
                    ->maxFileSize('2')
                    ->acceptedFiles('.pdf'),
            ]),
        ];
    }
    
    public function save(Request $request)
    {   
        // Retrieve the HeroSection model instance from the database
        $heroSection = HeroSection::first();
        

        // dd($request);
        $heroSection->attachment()->syncWithoutDetaching($request->input('hero.attachment', []));
        
        // Update the model instance with the new data from the request
        $heroSection->fill($request->input('hero'));
        
        $heroSection->fill($request->all());
        
        // Save the updated model instance back to the database
        $heroSection->save();
    
        // Display a success message
        Alert::info("Hero section updated successfully.");
    
        // Redirect the user to the desired route
        return redirect()->route('platform.hero');
    }
}