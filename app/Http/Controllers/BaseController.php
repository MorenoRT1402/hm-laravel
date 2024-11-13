<?php

namespace App\Http\Controllers;

abstract class BaseController extends Controller{

    public function destroy($id){
        $data = $this->modelClass::findOrFail($id);
        $data->delete();
        return redirect(route("$this->view_root.index"))
               ->with('success', 'Eliminado correctamente.');
    }
}