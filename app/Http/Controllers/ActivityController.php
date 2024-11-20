<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends BaseController
{
    protected $resource = "activities";
    protected $modelClass = Activity::class;
    protected $userCheck = true;

    protected $rules = [
        'type' => 'required|string',
        'datetime' => 'required|string',
        'notes' => 'nullable|string',
    ];

    protected function get_data(Request $request)
    {
        return [
            'type' => $request->input('type'),
            'user_id' => $request->user()->id,
            'datetime' => $request->input('datetime'),
            'notes' => $request->input('notes'),
        ];
    }

    private function checkUserPermission(Activity $activity){
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a esta actividad.');
        }
    }

    public function show($id){
        $data = $this->modelClass::findOrFail($id);
        $this->checkUserPermission($data);
        $back_to = "$this->resource.index";
        
        return view("$this->resource.show", compact('data', 'back_to'));
    }

    // public function edit($id)
    // {
    //     $method = 'PUT';
    //     $activity = $this->modelClass::findOrFail($id);
    //     $this->check($activity);

    //     return view('activities.edit', compact('method', 'activity'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $activity = $this->modelClass::findOrFail($id);
    //     $this->validateUserPermission($activity);

    //     $this->validateResource($request);

    //     $activity->update($this->get_data($request));

    //     return redirect()->route('activities.show', $activity->id)
    //         ->with('success', 'Actividad actualizada correctamente.');
    // }

    // public function destroy($id)
    // {
    //     $activity = $this->modelClass::findOrFail($id);
    //     $this->validateUserPermission($activity);

    //     $activity->delete();

    //     return redirect()->route('activities.index')
    //         ->with('success', 'Actividad eliminada correctamente.');
    // }
}
