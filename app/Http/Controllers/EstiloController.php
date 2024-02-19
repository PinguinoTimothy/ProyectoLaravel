<?php

namespace App\Http\Controllers;

use App\Models\Estilo;
use Illuminate\Http\Request;

/**
 * Class EstiloController
 * @package App\Http\Controllers
 */
class EstiloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estilos = Estilo::paginate();

        return view('estilo.index', compact('estilos'))
            ->with('i', (request()->input('page', 1) - 1) * $estilos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estilo = new Estilo();
        return view('estilo.create', compact('estilo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Estilo::$rules);

        $estilo = Estilo::create($request->all());

        return redirect()->route('estilos.index')
            ->with('success', 'Estilo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estilo = Estilo::find($id);

        return view('estilo.show', compact('estilo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estilo = Estilo::find($id);

        return view('estilo.edit', compact('estilo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Estilo $estilo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estilo $estilo)
    {
        request()->validate(Estilo::$rules);

        $estilo->update($request->all());

        return redirect()->route('estilos.index')
            ->with('success', 'Estilo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estilo = Estilo::find($id)->delete();

        return redirect()->route('estilos.index')
            ->with('success', 'Estilo deleted successfully');
    }
}
