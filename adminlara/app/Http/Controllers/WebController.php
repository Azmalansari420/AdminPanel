<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class WebController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $formData = [
            'name'    => $validated['name'],
            'email'   => $validated['email'],
            'mobile'  => $validated['mobile'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'addeddate' => now(),
        ];

        // Save to database
        DB::table('contact')->insert($formData);

        // Send email
        Mail::send(new ContactFormMail($formData));

        return redirect()->back()->with('success', 'Form submitted and email sent successfully!');
    }
}










