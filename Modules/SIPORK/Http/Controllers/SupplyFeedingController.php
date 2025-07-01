<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\SupplyFeeding;
use Modules\SIPORK\Entities\Feeding;
use Modules\SIPORK\Entities\SupplySipork;

class SupplyFeedingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $suppliesFeeding = SupplyFeeding::with(['feeding', 'supply'])->paginate(10);
        return view('sipork::admin.insumos_alimenticios.index', compact('suppliesFeeding'));
    }

    public function indexaprendiz()
    {
        $suppliesFeeding = SupplyFeeding::with(['feeding', 'supply'])->paginate(10);
        return view('sipork::aprendiz.INSUMOS_ALIMENTICIOS.index', compact('suppliesFeeding'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $feedings = Feeding::all();
        $supplies = SupplySipork::all();
        return view('sipork::admin.insumos_alimenticios.create', compact('feedings', 'supplies'));
    }
    public function createaprendiz()
    {
        $feedings = Feeding::all();
        $supplies = SupplySipork::all();
        return view('sipork::aprendiz.INSUMOS_ALIMENTICIOS.create', compact('feedings', 'supplies'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feeding_id' => 'required|exists:feeding,id_feeding',
            'supply_id' => 'required|exists:supplies_sipork,id_supply',
            'quantity_used' => 'required|numeric|min:0',
            'usage_date' => 'required|date',
        ]);

        $supplyFeeding = new SupplyFeeding();
        $supplyFeeding->feeding_id = $validated['feeding_id'];
        $supplyFeeding->supply_id = $validated['supply_id'];
        $supplyFeeding->quantity_used = $validated['quantity_used'];
        $supplyFeeding->usage_date = $validated['usage_date'];
        $supplyFeeding->save();

        return redirect()->route('sipork.admin.sipork.insumos_alimenticios.index')->with('success', 'Registro creado correctamente.');
    }

    public function storeaprendiz(Request $request)
    {
        $validated = $request->validate([
            'feeding_id' => 'required|exists:feeding,id_feeding',
            'supply_id' => 'required|exists:supplies_sipork,id_supply',
            'quantity_used' => 'required|numeric|min:0',
            'usage_date' => 'required|date',
        ]);

        $supplyFeeding = new SupplyFeeding();
        $supplyFeeding->feeding_id = $validated['feeding_id'];
        $supplyFeeding->supply_id = $validated['supply_id'];
        $supplyFeeding->quantity_used = $validated['quantity_used'];
        $supplyFeeding->usage_date = $validated['usage_date'];
        $supplyFeeding->save();

        return redirect()->route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index')->with('success', 'Registro creado correctamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $supplyFeeding = SupplyFeeding::with(['feeding', 'supply'])->findOrFail($id);
        return view('sipork::admin.insumos_alimenticios.show', compact('supplyFeeding'));
    }

    public function showaprendiz($id)
    {
        $supplyFeeding = SupplyFeeding::with(['feeding', 'supply'])->findOrFail($id);
        return view('sipork::aprendiz.INSUMOS_ALIMENTICIOS.show', compact('supplyFeeding'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $feedings = Feeding::all();
        $supplies = SupplySipork::all();
        return view('sipork::admin.insumos_alimenticios.edit', compact('supplyFeeding', 'feedings', 'supplies'));
    }

    public function editaprendiz($id)
    {
        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $feedings = Feeding::all();
        $supplies = SupplySipork::all();
        return view('sipork::aprendiz.INSUMOS_ALIMENTICIOS.edit', compact('supplyFeeding', 'feedings', 'supplies'));
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
            'feeding_id' => 'required|exists:feeding,id_feeding',
            'supply_id' => 'required|exists:supplies_sipork,id_supply',
            'quantity_used' => 'required|numeric|min:0',
            'usage_date' => 'required|date',
        ]);

        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $supplyFeeding->feeding_id = $validated['feeding_id'];
        $supplyFeeding->supply_id = $validated['supply_id'];
        $supplyFeeding->quantity_used = $validated['quantity_used'];
        $supplyFeeding->usage_date = $validated['usage_date'];
        $supplyFeeding->save();

        return redirect()->route('sipork.admin.sipork.insumos_alimenticios.index')->with('success', 'Registro actualizado correctamente.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $validated = $request->validate([
            'feeding_id' => 'required|exists:feeding,id_feeding',
            'supply_id' => 'required|exists:supplies_sipork,id_supply',
            'quantity_used' => 'required|numeric|min:0',
            'usage_date' => 'required|date',
        ]);

        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $supplyFeeding->feeding_id = $validated['feeding_id'];
        $supplyFeeding->supply_id = $validated['supply_id'];
        $supplyFeeding->quantity_used = $validated['quantity_used'];
        $supplyFeeding->usage_date = $validated['usage_date'];
        $supplyFeeding->save();

        return redirect()->route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index')->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $supplyFeeding->delete();

        return redirect()->route('sipork.admin.sipork.insumos_alimenticios.index')->with('success', 'Registro eliminado correctamente.');
    }

    public function destroyaprendiz($id)
    {
        $supplyFeeding = SupplyFeeding::findOrFail($id);
        $supplyFeeding->delete();

        return redirect()->route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index')->with('success', 'Registro eliminado correctamente.');
    }
}
