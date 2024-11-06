<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return view("activities/index");
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
        return "Mostrando la actividad con ID: $id";
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
