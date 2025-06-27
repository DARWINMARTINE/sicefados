<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Lot; // Asegúrate de importar el modelo Lot

class LotController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $lots = Lot::all();
        return view('sipork::admin.lotes.index', compact('lots'));
    }

    public function indexaprendiz()
    {
        $lots = Lot::all();
        return view('sipork::aprendiz.LOTES.index', compact('lots'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sipork::admin.lotes.create');
    }

    public function createaprendiz()
    {
        return view('sipork::aprendiz.LOTES.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'lot_name' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        Lot::create($request->all());
        return redirect()->route('sipork.admin.sipork.lotes.index')->with('success', 'Lot created successfully.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'lot_name' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        Lot::create($request->all());
        return redirect()->route('sipork.aprendiz.sipork.LOTES.index')->with('success', 'Lot created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $lot = Lot::findOrFail($id);
        return view('sipork::admin.lotes.show', compact('lot'));
    }

    public function showaprendiz($id)
    {
        $lot = Lot::findOrFail($id);
        return view('sipork::aprendiz.LOTES.show', compact('lot'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $lot = Lot::findOrFail($id);
        return view('sipork::admin.lotes.edit', compact('lot'));
    }

    public function editaprendiz($id)
    {
        $lot = Lot::findOrFail($id);
        return view('sipork::aprendiz.LOTES.edit', compact('lot'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'lot_name' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $lot = Lot::findOrFail($id);
        $lot->update($request->all());
        return redirect()->route('sipork.admin.sipork.lotes.index')->with('success', 'Lot updated successfully.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $request->validate([
            'lot_name' => 'required|string|max:255',
            'creation_date' => 'required|date',
            'status' => 'required|boolean',
        ]);

        $lot = Lot::findOrFail($id);
        $lot->update($request->all());
        return redirect()->route('sipork.aprendiz.sipork.LOTES.index')->with('success', 'Lot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $lot = Lot::findOrFail($id);
        $lot->delete();
        return redirect()->route('sipork.admin.sipork.lotes.index')->with('success', 'Lot deleted successfully.');
    }

    public function destroyaprendiz($id)
    {
        $lot = Lot::findOrFail($id);
        $lot->delete();
        return redirect()->route('sipork.aprendiz.sipork.LOTES.index')->with('success', 'Lot deleted successfully.');
    }
}
