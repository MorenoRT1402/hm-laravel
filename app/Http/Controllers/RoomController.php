<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller{    
    protected $view_root = "rooms";
    protected $modelClass = Room::class;
    protected $userCheck = false;
    
    protected $validation = [
        'type' => 'required|string',
        'number' => 'required|integer',
        'picture' => 'nullable|string',
        'bed_type' => 'required|string',
        'floor_letter' => 'required|string',
        'floor_number' => 'required|integer',
        'facilities' => 'nullable|array',
        'facilities.*' => 'string', // Cada elemento dentro del JSON debe ser una cadena
        'rate' => 'required|numeric|min:0',
        'discount' => 'nullable|numeric|min:0|max:100',
        'status' => 'required|string',
    ];

    public function store(Request $request){

        $this->validation($request, $this->validation);

        $floor = $request->input('floor_letter') . $request->input('floor_number');

        Room::create([
            'type' => $request->input('type'),
            'number' => $request->input('number'),
            'picture' => $request->input('picture'),
            'bed_type' => $request->input('bed_type'),
            'floor' => $floor,
            'facilities' => json_encode($request->input('facilities', [])),
            'rate' => $request->input('rate'),
            'discount' => $request->input('discount', 0),
            'status' => $request->input('status'),
        ]);

        return redirect(route("$this->view_root.store"));
    }

    public function show($id)
    {
        // We try to find the activity by its ID, and if it doesn't exist, it will throw a 404.
        $activity = Activity::findOrFail($id);
    
        $this->checkUserPermission($activity);
        
        return view('activities.show', compact('activity'));
    }
    

    public function edit($id){
        $method = 'PUT';
        $activity = Activity::findOrFail($id);
        $back_index = true;
    
        $this->checkUserPermission($activity);
    
        return view('activities.edit', compact('method', 'activity', 'back_index'));
    }
    

    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);
    
        $this->checkUserPermission($activity);
    
        $this->validation($request);
    
        $activity->update([
            'type' => $request->input('type'),
            'datetime' => $request->input('datetime'),
            'notes' => $request->input('notes'),
        ]);
    
        return redirect()->route('activities.show', $activity->id)
                         ->with('success', 'Actividad actualizada correctamente.');
    }
    
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
    
        $this->checkUserPermission($activity);
    
        $activity->delete();
    
        return redirect()->route('activities.index')
                         ->with('success', 'Actividad eliminada correctamente.');
    }
    
}

