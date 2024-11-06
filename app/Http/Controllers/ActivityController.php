<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        return "Listado de actividades";
    }

    public function create()
    {
        return "Formulario para crear una nueva actividad";
    }

    public function store(Request $request)
    {
        return "Guardando nueva actividad";
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
