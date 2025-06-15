<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\SupplySipork;
use Modules\SIPORK\Entities\WarehouseSipork; // Assuming you have a Warehouse model

class SupplySiporkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // public function index()
    // {
    //     return view('sipork::index');
    // }
    public function index()
    {
        $supplies = SupplySipork::with('warehouse')->get();
        return view('sipork::admin.suministros.index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    // public function create()
    // {
    //     return view('sipork::create');
    // }
    public function create()
    {
        $warehouses = WarehouseSipork::all();
        return view('sipork::admin.suministros.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supply_name'   => 'required|string|max:50',
            'supply_type'   => 'required|string|max:20',
            'quantity'      => 'required|numeric|min:0',
            'unit_cost'     => 'required|numeric|min:0',
            'entry_date'    => 'required|date',
            'warehouse_id'  => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        SupplySipork::create($validated);

        return redirect()->route('sipork.admin.sipork.suministros.index')->with('success', 'Suministro creado correctamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $supply = SupplySipork::with('warehouse')->findOrFail($id);
        return view('sipork::admin.suministros.show', compact('supply'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $supply = SupplySipork::findOrFail($id);
        $warehouses = WarehouseSipork::all();
        return view('sipork::admin.suministros.edit', compact('supply', 'warehouses'));
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
            'supply_name'   => 'required|string|max:50',
            'supply_type'   => 'required|string|max:20',
            'quantity'      => 'required|numeric|min:0',
            'unit_cost'     => 'required|numeric|min:0',
            'entry_date'    => 'required|date',
            'warehouse_id'  => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        $supply = SupplySipork::findOrFail($id);
        $supply->update($validated);

        return redirect()->route('sipork.admin.sipork.suministros.index')->with('success', 'Suministro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $supply = SupplySipork::findOrFail($id);
        $supply->delete();

        return redirect()->route('sipork.admin.sipork.suministros.index')->with('success', 'Suministro eliminado correctamente.');
    }
}
