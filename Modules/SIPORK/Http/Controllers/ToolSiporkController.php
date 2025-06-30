<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\ToolSipork;
use Modules\SIPORK\Entities\WarehouseSipork; // Assuming you have a Warehouse model

class ToolSiporkController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        $tools = ToolSipork::with('warehouse')->paginate(10);
        return view('sipork::admin.herramientas.index', compact('tools'));
    }

    public function indexaprendiz()
    {
        $tools = ToolSipork::with('warehouse')->get();
        return view('sipork::aprendiz.HERRAMIENTAS.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $warehouses = WarehouseSipork::all();
        return view('sipork::admin.herramientas.create', compact('warehouses'));
    }

    public function createaprendiz()
    {
        $warehouses = WarehouseSipork::all();
        return view('sipork::aprendiz.HERRAMIENTAS.create', compact('warehouses'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'tool_name' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'unit_cost' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        ToolSipork::create($request->all());

        return redirect()->route('sipork.admin.sipork.herramientas.index')->with('success', 'Tool created successfully.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'tool_name' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'unit_cost' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        ToolSipork::create($request->all());

        return redirect()->route('sipork.aprendiz.sipork.HERRAMIENTAS.index')->with('success', 'Tool created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $tool = ToolSipork::with('warehouse')->findOrFail($id);
        return view('sipork::admin.herramientas.show', compact('tool'));
    }

    public function showaprendiz($id)
    {
        $tool = ToolSipork::with('warehouse')->findOrFail($id);
        return view('sipork::aprendiz.HERRAMIENTAS.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $tool = ToolSipork::with('warehouse')->findOrFail($id);
        $warehouses = WarehouseSipork::all();
        return view('sipork::admin.herramientas.edit', compact('tool', 'warehouses'));
    }

    public function editaprendiz($id)
    {
        $tool = ToolSipork::with('warehouse')->findOrFail($id);
        $warehouses = WarehouseSipork::all();
        return view('sipork::aprendiz.HERRAMIENTAS.edit', compact('tool', 'warehouses'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $tool = ToolSipork::findOrFail($id);

        $request->validate([
            'tool_name' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'unit_cost' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        $tool->update($request->all());

        return redirect()->route('sipork.admin.sipork.herramientas.index')->with('success', 'Tool updated successfully.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $tool = ToolSipork::findOrFail($id);

        $request->validate([
            'tool_name' => 'required|string|max:50',
            'quantity' => 'required|integer|min:1',
            'purchase_date' => 'required|date',
            'unit_cost' => 'required|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses_sipork,id_warehouse',
        ]);

        $tool->update($request->all());

        return redirect()->route('sipork.aprendiz.sipork.HERRAMIENTAS.index')->with('success', 'Tool updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $tool = ToolSipork::findOrFail($id);
        $tool->delete();

        return redirect()->route('sipork.admin.sipork.herramientas.index')->with('success', 'Tool deleted successfully.');
    }

    public function destroyaprendiz($id)
    {
        $tool = ToolSipork::findOrFail($id);
        $tool->delete();

        return redirect()->route('sipork.aprendiz.sipork.HERRAMIENTAS.index')->with('success', 'Tool deleted successfully.');
    }
}