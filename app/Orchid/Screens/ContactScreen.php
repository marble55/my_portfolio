<?php

namespace App\Orchid\Screens;

use App\Models\Contact;
use App\Models\ContactLink;
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
            'contact' => Contact::first(),
            'contact-social' => ContactLink::first(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Message Me';
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
                        'mask' => '+63 999 999 9999',
                        'numericInput' => true,
                    ])
                    ->required()
                    ->title(__('Contact Number'))
                    ->placeholder(__('')),
            ])->title('Telephone and Email'),

            Layout::rows([
                Input::make('contact-social.platform')
                    ->type('text')
                    ->required()
                    ->title('Contact Social'),

                Input::make('contact-social.link')
                    ->title('Contact Link')
                    ->required(),

                Input::make('contact-social.icon_path')
                    ->title('Contact Icon')
                    ->required(),
            ])->title('Social Media Contact'),
        ];
    }

    public function save(Request $request)
    {   
        
        $contactInfo = Contact::first();
        $contactSocial = ContactLink::first();
        
        $contactInfo->fill($request->input('contact'));
        
        $data = $request->input('contact-social');
        $contactSocial->fill($data);
    
        $contactInfo->save();
        $contactSocial->save();
        
        Alert::info("Contacts updated successfully.");
    
        return redirect()->route('platform.contact');
    }
}
