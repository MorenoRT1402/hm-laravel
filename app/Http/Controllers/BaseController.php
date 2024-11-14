<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController extends Controller{

    protected abstract function get_data(Request $request);

    protected function prepareData(Request $request){

        $this->validation($request, $this->rules);
        return $this->get_data($request);
    }
    
    public function store(Request $request){
        $data = $this->prepareData($request);

        $this->modelClass::create($data);

        return redirect(route("$this->view_root.index"))->with('success', 'Creado correctamente.');
    }

    public function destroy($id){
        $data = $this->modelClass::findOrFail($id);
        $data->delete();
        return redirect(route("$this->view_root.index"))
               ->with('success', 'Eliminado correctamente.');
    }
}