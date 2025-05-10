<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessageController extends ApiController
{
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:50',
                'email' => 'required|string|email',
                'subject' => 'required|string|min:8|max:50',
                'content' => 'required|string|min:20|max:150',
            ],
            [
                'name.required' => 'Name is required',
                'name.min' => 'Name must be more than 2 characters',
                'name.max' => 'Name must be less than 50 characters',
                'email.required' => 'Email is required',
                'email.email' => 'Invalid Email',
                'subject.required' => 'Subject is required',
                'subject.max' => 'Subject must be more than 7 characters',
                'subject.min' => 'Subject must be less than 50 characters',
                'content.required' => 'Contant is required',
                'content.max' => 'Content must be less than 150 characters',
                'content.min' => 'Content must be more than 19 characters',
            ]
        );
        if ($validator->fails()) {
            return $this->apiResponse(error: $validator->errors(), message: "Validation Error", status: 422);
        }
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject; 
        $message->content = $request->content;
        $message->user_id = auth()->user()->id;
        $message->save();
        return $this->apiResponse(message: "Message Sent Successfully");

    }
}
