<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\WarehouseSipork;

class WarehouseSiporkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $warehouses = WarehouseSipork::paginate(10);
        return view('sipork::admin.bodegas.index', compact('warehouses'));
    }

    public function indexaprendiz()
    {
        $warehouses = WarehouseSipork::paginate(10);
        return view('sipork::aprendiz.BODEGAS.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sipork::admin.bodegas.create');
    }

    public function createaprendiz()
    {
        return view('sipork::aprendiz.BODEGAS.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'capacity' => 'required|numeric|min:0',
        ]);

        WarehouseSipork::create($request->all());

        return redirect()->route('sipork.admin.sipork.bodegas.index')->with('success', 'Warehouse created successfully.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'capacity' => 'required|numeric|min:0',
        ]);

        WarehouseSipork::create($request->all());

        return redirect()->route('sipork.aprendiz.sipork.BODEGAS.index')->with('success', 'Warehouse created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        return view('sipork::admin.bodegas.show', compact('warehouse'));
    }

    public function showaprendiz($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        return view('sipork::aprendiz.BODEGAS.show', compact('warehouse'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        return view('sipork::admin.bodegas.edit', compact('warehouse'));
    }

    public function editaprendiz($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        return view('sipork::aprendiz.BODEGAS.edit', compact('warehouse'));
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
            'warehouse_name' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'capacity' => 'required|numeric|min:0',
        ]);

        $warehouse = WarehouseSipork::findOrFail($id);
        $warehouse->update($request->all());

        return redirect()->route('sipork.admin.sipork.bodegas.index')->with('success', 'Warehouse updated successfully.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $request->validate([
            'warehouse_name' => 'required|string|max:50',
            'location' => 'required|string|max:100',
            'capacity' => 'required|numeric|min:0',
        ]);

        $warehouse = WarehouseSipork::findOrFail($id);
        $warehouse->update($request->all());

        return redirect()->route('sipork.aprendiz.sipork.BODEGAS.index')->with('success', 'Warehouse updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        $warehouse->delete();

        return redirect()->route('sipork.admin.sipork.bodegas.index')->with('success', 'Warehouse deleted successfully.');
    }

    public function destroyaprendiz($id)
    {
        $warehouse = WarehouseSipork::findOrFail($id);
        $warehouse->delete();

        return redirect()->route('sipork.aprendiz.sipork.BODEGAS.index')->with('success', 'Warehouse deleted successfully.');
    }
}
