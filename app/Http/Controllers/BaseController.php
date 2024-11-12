<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

abstract class BaseController extends Controller
{
    protected $validation = [];
    protected $view_root = "";
    protected $modelClass;
    protected $userCheck = true;

    protected function validateRequest(Request $request){
        $request->validate($this->validation);
    }

    // Verificación condicional de permisos de usuario
    protected function checkUserPermission($model)
    {
        if ($this->userCheck && isset($model->user_id) && $model->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a este recurso.');
        }
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Filtrar por usuario solo si se requiere verificar user_id
        $items = $this->userCheck
            ? Auth::user()->{$this->modelClass::tableName()}()->get()
            : $this->modelClass::all();

        return view("{$this->view_root}.index", [$this->view_root => $items]);
    }

    public function create()
    {
        $method = 'POST';
        return view("{$this->view_root}.create", compact('method'));
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        // Obtener datos dinámicamente
        $data = $request->only(array_keys($this->validation));
        
        // Asignar user_id automáticamente solo si $userCheck es true
        if ($this->userCheck && Auth::check()) {
            $data['user_id'] = Auth::id();
        }

        $this->modelClass::create($data);

        return redirect()->route("{$this->view_root}.index")->with('success', 'Creado correctamente.');
    }

    public function show($id)
    {
        $model = $this->modelClass::findOrFail($id);
        $this->checkUserPermission($model);

        return view("{$this->view_root}.show", compact('model'));
    }

    public function edit($id)
    {
        $method = 'PUT';
        $model = $this->modelClass::findOrFail($id);
        $back_index = true;

        $this->checkUserPermission($model);

        return view("{$this->view_root}.edit", compact('method', 'model', 'back_index'));
    }

    public function update(Request $request, $id)
    {
        $model = $this->modelClass::findOrFail($id);
        $this->checkUserPermission($model);
        $this->validateRequest($request);

        $data = $request->only(array_keys($this->validation));
        $model->update($data);

        return redirect()->route("{$this->view_root}.show", $model->id)
                         ->with('success', 'Actualizado correctamente.');
    }

    public function destroy($id)
    {
        $model = $this->modelClass::findOrFail($id);
        $this->checkUserPermission($model);
        $model->delete();

        return redirect()->route("{$this->view_root}.index")
                         ->with('success', 'Eliminado correctamente.');
    }
}
