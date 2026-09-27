<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\View;

class MessageController extends Controller
{
    public function index()
    {
        return View::make('admin.messages.index', [
            'messages' => Message::latest()->paginate(15),
        ]);
    }

    public function show(Message $pesan)
    {
        if (!$pesan->is_read) {
            $pesan->update(['is_read' => true]);
        }

        return View::make('admin.messages.show', ['pesan' => $pesan]);
    }

    public function destroy(Message $pesan)
    {
        $pesan->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }
}