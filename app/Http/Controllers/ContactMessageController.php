<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactMessageRequest $request)
    {
        Log::info('Before store method'); // Add this line
        $validated = $request->validated();
        // ContactMessage::create([
        //     'name' => $validated->get('name'),
        //     'email' => $validated->get('email'),
        //     'message'  => $validated->get('message'),
        // ]);
        Log::info('After store method'); // Add this line
        ContactMessage::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactMessage $contactMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactMessage $contactMessage)
    {
        //
    }
}
