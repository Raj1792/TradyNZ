<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:120'],
            'phone' => ['nullable', 'string', 'max:40'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'string', 'max:1500'],
        ]);

        $contactMessage = ContactMessage::create($data);

        return view('static.submitted', [
            'title' => 'Contact message submitted',
            'message' => 'Thank you, ' . $contactMessage->name . '. Your message has been submitted. Reference number: CM-' . str_pad((string) $contactMessage->id, 5, '0', STR_PAD_LEFT) . '.',
        ]);
    }
}
