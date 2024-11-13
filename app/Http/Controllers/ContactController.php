<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
    protected $view_root = "contacts";
    protected $modelClass = Contact::class;
    protected $userCheck = false;
    
    protected $validation = [
        'customer' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'subject' => 'required|string|max:255',
        'comment' => 'required|string|max:1000',
    ];

    private function prepareData(Request $request){

        $this->validate($request, $this->validation);

        return [
            'date' => now(),
            'customer' => $request->input('customer'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'comment' => $request->input('comment'),
            'archived' => $request->input('archived', false),
        ];
    }

    public function store(Request $request){
        $data = $this->prepareData($request);

        Contact::create($data);

        return redirect(route("$this->view_root.index"))->with('success', 'Contacto creado correctamente.');
    }

    public function update(Request $request, $id){
        $data = $this->prepareData($request);

        $contact = Contact::findOrFail($id);

        $contact->update($data);

        return redirect(route("$this->view_root.show", $id))->with('success', 'Contacto actualizado correctamente.');
    }  
}
