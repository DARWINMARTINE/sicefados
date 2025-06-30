<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\BiosecurityMeasure;
use Modules\SIPORK\Entities\OperationalCost;
use Modules\SIPORK\Entities\Lot;

class BiosecurityMeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $measures = BiosecurityMeasure::with(['cost', 'lot'])->paginate(10);
        return view('sipork::admin.medidas_de_bioseguridad.index', compact('measures'));
    }

    public function indexlider()
    {
        $measures = BiosecurityMeasure::with(['cost', 'lot'])->get();
        return view('sipork::liderDeUnidad.medidas-de-bioseguridad.index', compact('measures'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $costs = OperationalCost::select('id_cost', 'cost_type')->get(); // Replace 'name' with the actual column for display
        $lots = Lot::select('id_lot', 'lot_name')->get(); // Replace 'lot_name' with the actual column for display
        return view('sipork::admin.medidas_de_bioseguridad.create', compact('costs', 'lots'));
    }

    public function createlider()
    {
        $costs = OperationalCost::select('id_cost', 'cost_type')->get(); // Replace 'name' with the actual column for display
        $lots = Lot::select('id_lot', 'lot_name')->get(); // Replace 'lot_name' with the actual column for display
        return view('sipork::liderDeUnidad.medidas-de-bioseguridad.create', compact('costs', 'lots'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'measure_type' => 'required|string|max:50',
            'implementation_date' => 'required|date',
            'description' => 'nullable|string',
            'cost_id' => 'required|exists:operational_costs,id_cost',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        BiosecurityMeasure::create([
            'measure_type' => $validated['measure_type'],
            'implementation_date' => $validated['implementation_date'],
             'description' => $validated['description'] ?? null,
            'cost_id' => $validated['cost_id'],
            'lot_id' => $validated['lot_id'],
        ]);

        return redirect()->route('sipork.admin.sipork.medidas_de_bioseguridad.index')->with('success', 'Medida de bioseguridad creada correctamente.');
    }

    public function storelider(Request $request)
    {
        $validated = $request->validate([
            'measure_type' => 'required|string|max:50',
            'implementation_date' => 'required|date',
            'description' => 'nullable|string',
            'cost_id' => 'required|exists:operational_costs,id_cost',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        BiosecurityMeasure::create([
            'measure_type' => $validated['measure_type'],
            'implementation_date' => $validated['implementation_date'],
             'description' => $validated['description'] ?? null,
            'cost_id' => $validated['cost_id'],
            'lot_id' => $validated['lot_id'],
        ]);

        return redirect()->route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index')->with('success', 'Medida de bioseguridad creada correctamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $measure = BiosecurityMeasure::with(['cost', 'lot'])->findOrFail($id);
        return view('sipork::admin.medidas_de_bioseguridad.show', compact('measure'));
    }

    public function showlider($id)
    {
        $measure = BiosecurityMeasure::with(['cost', 'lot'])->findOrFail($id);
        return view('sipork::liderDeUnidad.medidas-de-bioseguridad.show', compact('measure'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $measure = BiosecurityMeasure::findOrFail($id);
        $costs = OperationalCost::select('id_cost', 'cost_type')->get();
        $lots = Lot::select('id_lot', 'lot_name')->get();
        return view('sipork::admin.medidas_de_bioseguridad.edit', compact('measure', 'costs', 'lots'));
    }

    public function editlider($id)
    {
        $measure = BiosecurityMeasure::findOrFail($id);
        $costs = OperationalCost::select('id_cost', 'cost_type')->get();
        $lots = Lot::select('id_lot', 'lot_name')->get();
        return view('sipork::liderDeUnidad.medidas-de-bioseguridad.edit', compact('measure', 'costs', 'lots'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'measure_type' => 'required|string|max:50',
            'implementation_date' => 'required|date',
            'description' => 'nullable|string',
            'cost_id' => 'required|exists:operational_costs,id_cost',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $measure = BiosecurityMeasure::findOrFail($id);
        $measure->update([
            'measure_type' => $validated['measure_type'],
            'implementation_date' => $validated['implementation_date'],
            'description' => $validated['description'] ?? null,
            'cost_id' => $validated['cost_id'],
            'lot_id' => $validated['lot_id'],
        ]);

        return redirect()->route('sipork.admin.sipork.medidas_de_bioseguridad.index')->with('success', 'Medida de bioseguridad actualizada correctamente.');
    }

    public function updatelider(Request $request, $id)
    {
        $validated = $request->validate([
            'measure_type' => 'required|string|max:50',
            'implementation_date' => 'required|date',
            'description' => 'nullable|string',
            'cost_id' => 'required|exists:operational_costs,id_cost',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $measure = BiosecurityMeasure::findOrFail($id);
        $measure->update([
            'measure_type' => $validated['measure_type'],
            'implementation_date' => $validated['implementation_date'],
            'description' => $validated['description'] ?? null,
            'cost_id' => $validated['cost_id'],
            'lot_id' => $validated['lot_id'],
        ]);

        return redirect()->route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index')->with('success', 'Medida de bioseguridad actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    
    public function destroy($id)
    {
        $measure = BiosecurityMeasure::findOrFail($id);
        $measure->delete();

        return redirect()->route('sipork.admin.sipork.medidas_de_bioseguridad.index')->with('success', 'Medida de bioseguridad eliminada correctamente.');
    }

    public function destroylider($id)
    {
        $measure = BiosecurityMeasure::findOrFail($id);
        $measure->delete();

        return redirect()->route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index')->with('success', 'Medida de bioseguridad eliminada correctamente.');
    }
}
