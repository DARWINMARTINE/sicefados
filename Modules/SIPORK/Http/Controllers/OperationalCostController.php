<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\OperationalCost;

class OperationalCostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $operationalCosts = OperationalCost::all();
        return view('sipork::admin.costos_operativos.index', compact('operationalCosts'));
    }
    public function indexlider()
    {
        $operationalCosts = OperationalCost::all();
        return view('sipork::liderDeUnidad.costos-operativos.index', compact('operationalCosts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sipork::admin.costos_operativos.create');
    }
    public function createlider()
    {
        return view('sipork::liderDeUnidad.costos-operativos.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'cost_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'cost_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        OperationalCost::create($request->all());

        return redirect()->route('sipork.admin.sipork.costos_operativos.index')->with('success', 'Costo operativo creado exitosamente.');
    }

    public function storelider(Request $request)
    {
        $request->validate([
            'cost_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'cost_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        OperationalCost::create($request->all());

        return redirect()->route('sipork.liderDeUnidad.sipork.costos-operativos.index')->with('success', 'Costo operativo creado exitosamente.');
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        return view('sipork::admin.costos_operativos.show', compact('operationalCost'));
    }

    public function showlider($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        return view('sipork::liderDeUnidad.costos-operativos.show', compact('operationalCost'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        return view('sipork::admin.costos_operativos.edit', compact('operationalCost'));
    }

    public function editlider($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        return view('sipork::liderDeUnidad.costos-operativos.edit', compact('operationalCost'));
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
            'cost_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'cost_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $operationalCost = OperationalCost::findOrFail($id);
        $operationalCost->update($request->all());

        return redirect()->route('sipork.admin.sipork.costos_operativos.index')->with('success', 'Costo operativo actualizado exitosamente.');
    }

    public function updatelider(Request $request, $id)
    {
        $request->validate([
            'cost_type' => 'required|string|max:50',
            'amount' => 'required|numeric|min:0',
            'cost_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $operationalCost = OperationalCost::findOrFail($id);
        $operationalCost->update($request->all());

        return redirect()->route('sipork.liderDeUnidad.sipork.costos-operativos.index')->with('success', 'Costo operativo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        $operationalCost->delete();

        return redirect()->route('sipork.admin.sipork.costos_operativos.index')->with('success', 'Costo operativo eliminado exitosamente.');
    }
    public function destroylider($id)
    {
        $operationalCost = OperationalCost::findOrFail($id);
        $operationalCost->delete();

        return redirect()->route('sipork.liderDeUnidad.sipork.costos-operativos.index')->with('success', 'Costo operativo eliminado exitosamente.');
    }
}
