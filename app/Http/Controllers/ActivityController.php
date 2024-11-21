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
}
