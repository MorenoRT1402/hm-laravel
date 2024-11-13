<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller{

    protected $request = [];
    protected $userCheck = true;
    protected $view_root = '';

    protected function validation($request, $rules){
        $request->validate($rules);
    }

    public function index(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Filter by user only if checking user_id is required
        $items = $this->userCheck
            ? Auth::user()->{$this->modelClass::tableName()}()->get()
            : $this->modelClass::all();

        return view("{$this->view_root}.index", [$this->view_root => $items]);
    }

    public function create(){
        $method = 'POST';
        return view("$this->view_root.create", compact('method'));
    }
}
