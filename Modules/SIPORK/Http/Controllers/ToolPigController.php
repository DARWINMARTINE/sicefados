<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\ToolPig;
use Modules\SIPORK\Entities\ToolSipork;
use Modules\SIPORK\Entities\Pig; // Assuming you have a Pig model

class ToolPigController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $toolUsages = ToolPig::with(['tool', 'pig'])->paginate(10);
        return view('sipork::admin.uso_de_herramientas.index', compact('toolUsages'));
    }

    public function indexaprendiz()
    {
        $toolUsages = ToolPig::with(['tool', 'pig'])->get();
        return view('sipork::aprendiz.USO_HERRAMIENTAS.index', compact('toolUsages'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $tools = ToolSipork::all();
        $pigs = Pig::all();
        return view('sipork::admin.uso_de_herramientas.create', compact('tools', 'pigs'));
    }

    public function createaprendiz()
    {
        $tools = ToolSipork::all();
        $pigs = Pig::all();
        return view('sipork::aprendiz.USO_HERRAMIENTAS.create', compact('tools', 'pigs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools_sipork,id_tool',
            'pig_id' => 'required|exists:pigs,id_pig',
            'usage_date' => 'required|date',
            'task_description' => 'nullable|string',
        ]);

        ToolPig::create([
            'tool_id' => $request->tool_id,
            'pig_id' => $request->pig_id,
            'usage_date' => $request->usage_date,
            'task_description' => $request->task_description,
        ]);

        return redirect()->route('sipork.admin.sipork.uso_de_herramientas.index')->with('success', 'Uso de herramienta registrado correctamente.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools_sipork,id_tool',
            'pig_id' => 'required|exists:pigs,id_pig',
            'usage_date' => 'required|date',
            'task_description' => 'nullable|string',
        ]);

        ToolPig::create([
            'tool_id' => $request->tool_id,
            'pig_id' => $request->pig_id,
            'usage_date' => $request->usage_date,
            'task_description' => $request->task_description,
        ]);

        return redirect()->route('sipork.aprendiz.sipork.USO_HERRAMIENTAS.index')->with('success', 'Uso de herramienta registrado correctamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $toolUsage = ToolPig::with(['tool', 'pig'])->findOrFail($id);
        return view('sipork::admin.uso_de_herramientas.show', compact('toolUsage'));
    }

    public function showaprendiz($id)
    {
        $toolUsage = ToolPig::with(['tool', 'pig'])->findOrFail($id);
        return view('sipork::aprendiz.USO_HERRAMIENTAS.show', compact('toolUsage'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $toolUsage = ToolPig::with(['tool', 'pig'])->findOrFail($id);
        $tools = ToolSipork::all();
        $pigs = Pig::all();
        return view('sipork::admin.uso_de_herramientas.edit', compact('toolUsage', 'tools', 'pigs'));
    }

    public function editaprendiz($id)
    {
        $toolUsage = ToolPig::with(['tool', 'pig'])->findOrFail($id);
        $tools = ToolSipork::all();
        $pigs = Pig::all();
        return view('sipork::aprendiz.USO_HERRAMIENTAS.edit', compact('toolUsage', 'tools', 'pigs'));
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
            'tool_id' => 'required|exists:tools_sipork,id_tool',
            'pig_id' => 'required|exists:pigs,id_pig',
            'usage_date' => 'required|date',
            'task_description' => 'nullable|string',
        ]);

        $toolUsage = ToolPig::findOrFail($id);
        $toolUsage->update([
            'tool_id' => $request->tool_id,
            'pig_id' => $request->pig_id,
            'usage_date' => $request->usage_date,
            'task_description' => $request->task_description,
        ]);

        return redirect()->route('sipork.admin.sipork.uso_de_herramientas.index')->with('success', 'Uso de herramienta actualizado correctamente.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $request->validate([
            'tool_id' => 'required|exists:tools_sipork,id_tool',
            'pig_id' => 'required|exists:pigs,id_pig',
            'usage_date' => 'required|date',
            'task_description' => 'nullable|string',
        ]);

        $toolUsage = ToolPig::findOrFail($id);
        $toolUsage->update([
            'tool_id' => $request->tool_id,
            'pig_id' => $request->pig_id,
            'usage_date' => $request->usage_date,
            'task_description' => $request->task_description,
        ]);

        return redirect()->route('sipork.aprendiz.sipork.USO_HERRAMIENTAS.index')->with('success', 'Uso de herramienta actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $toolUsage = ToolPig::findOrFail($id);
        $toolUsage->delete();

        return redirect()->route('sipork.admin.sipork.uso_de_herramientas.index')->with('success', 'Uso de herramienta eliminado correctamente.');
    }

    public function destroyaprendiz($id)
    {
        $toolUsage = ToolPig::findOrFail($id);
        $toolUsage->delete();

        return redirect()->route('sipork.aprendiz.sipork.USO_HERRAMIENTAS.index')->with('success', 'Uso de herramienta eliminado correctamente.');
    }
}
