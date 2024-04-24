<?php

namespace App\Orchid\Screens;

use App\Models\ContactMessage;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ContactMessageScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'messages' => ContactMessage::get()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Contact Message Screen';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [];
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
            Layout::table('messages', [
                //Title col
                TD::make('messages.name', 'Name')->render(function (ContactMessage $contactMessage) {
                    return $contactMessage->name;
                }),


                //Description col
                TD::make('contactLinks.email', "Email")->render(function (ContactMessage $contactMessage) {
                    return $contactMessage->email;
                }),

                //Description col
                TD::make('contactLinks.message', "Message")->render(function (ContactMessage $contactMessage) {
                    return $contactMessage->message;
                }),

                //Delete Button
                TD::make('delete', 'Delete')->render(function (ContactMessage $contactLinks) {
                    return Button::make('Delete')->method('delete', ['contactLinks' => $contactLinks->id])->confirm('Are you sure to delete ' . $contactLinks->title . '?')->icon('trash');
                })->alignRight(),
            ])->title('Table'),

        ];
    }
}
