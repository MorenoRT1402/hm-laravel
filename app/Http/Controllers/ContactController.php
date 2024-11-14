<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    protected $view_root = "contacts";
    protected $modelClass = Contact::class;
    protected $userCheck = false;
    
    protected $rules = [
        'customer' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'comment' => 'required|string|max:1000',
    ];

    protected function get_data(Request $request){
        return [
            'customer' => $request->input('customer'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'comment' => $request->input('comment'),
            'archived' => $request->input('archived', false),
        ];
    }
}
