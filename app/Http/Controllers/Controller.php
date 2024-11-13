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

    public function show($id){
        // We try to find the model by its ID, and if it doesn't exist, it will throw a 404.
        $data = $this->modelClass::findOrFail($id);
            
        return view("$this->view_root.show", compact('data'));
    }

    public function edit($id){
        $method = 'PUT';
        $data = $this->modelClass::findOrFail($id);
        $back_index = true;
        
        return view("$this->view_root.edit", compact('method', 'data', 'back_index'));
    }

    public function destroy($id){
        $data = $this->modelClass::findOrFail($id);
        $data->delete();
        return redirect(route("$this->view_root.index"))
               ->with('success', 'Eliminado correctamente.');
    }
}
