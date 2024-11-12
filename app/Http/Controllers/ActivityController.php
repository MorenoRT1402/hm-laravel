<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    private function validation($request){
        $request->validate([
            'type' => 'required|string',
            'datetime' => 'required|string',
            'notes' => 'nullable|string',
        ]);
    }

    private function checkUserPermission(Activity $activity){
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a esta actividad.');
        }
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        return view("activities.index", ['activities' => Auth::user()->activities()->get()]);
    }
    

    public function create(){
        $method = 'POST';
        return view("activities.create", compact('method'));
    }

    public function store(Request $request)
    {

        $this->validation($request);

        Activity::create([
            'type' => $request->input('type'),
            'user_id' => $request->user()->id,
            'datetime' => $request->input('datetime'),
            'notes' => $request->input('notes'),
        ]);
        return redirect(route('activities.store'));
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
