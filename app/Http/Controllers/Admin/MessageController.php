<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(10);
        return view('admin.pages.messages.index', compact('messages'));
    }

    public function destroy(Message $message)
    {
        $message = Message::where('id', $message->id)->first();
        if ($message) {
            $message->delete();
            return to_route('messages.index')->with('success', 'Message Deleted Successfully');
        }
        return to_route('messages.index')->with('error', 'No Such Message');
    }
}
