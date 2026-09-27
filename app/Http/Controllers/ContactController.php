<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    public function index()
    {
        return View::make('pages.contact.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:160'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.email' => 'Format alamat email tidak valid.',
            'subject.required' => 'Subjek pesan wajib diisi.',
            'message.required' => 'Isi pesan wajib diisi.',
            'message.max' => 'Pesan maksimal 2000 karakter.',
        ]);

        Message::create($validated);

        return back()->with('success', 'Pesan Anda telah kami terima. Terima kasih telah menghubungi Wilayah Zaid bin Tsabit.');
    }
}