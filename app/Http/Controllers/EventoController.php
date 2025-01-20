<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventoCollection;
use App\Http\Resources\EventoResource;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.eventos', [ 'eventos' => Evento::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.evento_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date|after:today',
            'hora' => 'required|date_format:H:i',
            'aforo_maximo' => 'required|integer|min:10|max:10000',

        ]);

        $path = $request->file('url_imagen')->store('images_eventos');

        // Crear un nuevo evento usando $request->all()
        $evento = Evento::create($request->all());
        $evento->url_imagen = $path;
        $evento->save();

        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {

        Log::info('Showing the event : {id}', ['id' => $evento->id]);
        return view('admin.evento_detalle', ['evento' => $evento]);
    }

    public function ver($id) {
        return Evento::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return "Formulario de edición de eventos";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        return "Evento actualizado";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        Evento::destroy($evento->id);
        return "Evento eliminado";
    }

    public function delete(Evento $evento)
    {
        Evento::destroy($evento->id);
        return redirect()->route('eventos.index');;
    }

    ///// API METHODS

    public function api_index()
    {
        return new EventoCollection(Evento::paginate(3));
    }


}
