<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

abstract class Controller{

    protected $request = [];
    protected $userCheck = true;
    protected $resource = '';

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
        
        $resource = $this->resource;
        $create_route = "$this->resource.create";

        return view("{$this->resource}.index", compact('items', 'resource', 'create_route'));
    }

    public function create(){
        return view("$this->resource.create");
    }

    public function show($id){
        // We try to find the model by its ID, and if it doesn't exist, it will throw a 404.
        $data = $this->modelClass::findOrFail($id);
        $back_to = "$this->resource.index";
        
        return view("$this->resource.show", compact('data', 'back_to'));
    }

    public function edit($id){
        $data = $this->modelClass::findOrFail($id);
        $back_index = true;
        
        return view("$this->resource.edit", compact('data', 'back_index'));
    }
    
    public function update(Request $request, $id){
        $data = $this->prepareData($request);
        
        $to_update = $this->modelClass::findOrFail($id);
        
        $to_update->update($data);

        return redirect(route("$this->resource.show", $id))->with('success', 'Actualizado correctamente.');
    }  
}
