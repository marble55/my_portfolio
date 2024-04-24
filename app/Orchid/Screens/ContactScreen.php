<?php

namespace App\Orchid\Screens;

use App\Models\Contact;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ContactScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'contact' => Contact::first()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Contact';
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
            Layout::rows([
                Input::make('contact.email')
                    ->type('email')
                    ->required()
                    ->title(__('Email'))
                    ->placeholder(__('email@example.com')),

                Input::make('contact.phoneNumber')
                    ->mask([
                        'mask' => '99999999999',
                        'numericInput' => true,
                    ])
                    ->required()
                    ->title(__('Contact Number'))
                    ->placeholder(__('')),
            ]),
        ];
    }

    public function save(Request $request)
    {   
        // Retrieve the HeroSection model instance from the database
        $heroSection = Contact::first();
        
        // Update the model instance with the new data from the request
        $heroSection->fill($request->input('contact'));
    
        // Save the updated model instance back to the database
        $heroSection->save();
    
        // Display a success message
        Alert::info("Contacts updated successfully.");
    
        // Redirect the user to the desired route
        return redirect()->route('platform.contact');
    }
}
