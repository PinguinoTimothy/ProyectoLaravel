<?php

namespace App\Http\Controllers;

use App\Models\Campeone;
use App\Models\Estilo;
use App\Models\Posicione;
use Illuminate\Http\Request;

/**
 * Class CampeoneController
 * @package App\Http\Controllers
 */
class CampeoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campeones = Campeone::paginate();

        return view('campeone.index', compact('campeones'))
            ->with('i', (request()->input('page', 1) - 1) * $campeones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campeone = new Campeone();
        $estilo = Estilo::pluck("nombre","id");
        $posicion = Posicione::pluck("nombre","id");
        return view('campeone.create', compact('campeone',"estilo","posicion"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Campeone::$rules);

        $campeone = Campeone::create($request->all());

        return redirect()->route('campeones.index')
            ->with('success', 'Campeone created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campeone = Campeone::find($id);

        return view('campeone.show', compact('campeone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campeone = Campeone::find($id);
        $estilo = Estilo::pluck("nombre","id");
        $posicion = Posicione::pluck("nombre","id");

        return view('campeone.edit', compact('campeone',"estilo","posicion"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Campeone $campeone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campeone $campeone)
    {
        request()->validate(Campeone::$rules);

        $campeone->update($request->all());

        return redirect()->route('campeones.index')
            ->with('success', 'Campeone updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $campeone = Campeone::find($id)->delete();

        return redirect()->route('campeones.index')
            ->with('success', 'Campeone deleted successfully');
    }

    
}
