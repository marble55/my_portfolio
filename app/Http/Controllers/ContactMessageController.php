<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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

    public function sendEmail(ContactMessageRequest $request){
        
        $values = $request->all();
        // dd($request->input('message'));
        Mail::to("zellerbustamante@gmail.com")->send(new ContactMessageMail($values));

        return redirect()->route('index')->with('message', 'Your message here');

    }
}
