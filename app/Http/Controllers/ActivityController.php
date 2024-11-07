<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        return view("activities.index", ['activities' => Auth::user()->activities()->get()]);
    }
    

    public function create()
    {
        return view("activities.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => ['required', 'string'],
            'datetime' => ['required', 'string'],
            'notes' => ['required', 'string'],
        ]);

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
    
        if ($activity->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta actividad.');
        }
        
        return view('activities.show', compact('activity'));
    }
    

    public function edit($id)
    {
        return "Formulario para editar la actividad con ID: $id";
    }

    public function update(Request $request, $id)
    {
        return "Actualizando la actividad con ID: $id";
    }

    public function destroy($id)
    {
        return "Eliminando la actividad con ID: $id";
    }
}
