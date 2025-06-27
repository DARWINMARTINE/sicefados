<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\ReproductiveCycle;
use Modules\SIPORK\Entities\Pig;

class ReproductiveCycleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reproductiveCycles = ReproductiveCycle::with('sow')->get();
        return view('sipork::admin.ciclos_reproductivos.index', compact('reproductiveCycles'));
        
    }

    public function indexaprendiz()
    {
        $reproductiveCycles = ReproductiveCycle::with('sow')->get();
        return view('sipork::aprendiz.CICLOS_REPRODUCTIVOS.index', compact('reproductiveCycles'));
        
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pigs = Pig::where('gender', 'F')->get(); // Solo cerdas
        return view('sipork::admin.ciclos_reproductivos.create', compact('pigs'));
    }

    public function createaprendiz()
    {
        $pigs = Pig::where('gender', 'F')->get(); // Solo cerdas
        return view('sipork::aprendiz.CICLOS_REPRODUCTIVOS.create', compact('pigs'));
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'sow_id' => 'required|exists:pigs,id_pig',
            'service_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'live_piglets' => 'nullable|integer|min:0',
            'dead_piglets' => 'nullable|integer|min:0',
            'lactation_end_date' => 'nullable|date',
        ]);

        ReproductiveCycle::create($request->all());
        return redirect()->route('sipork.admin.sipork.ciclos_reproductivos.index')->with('success', 'Reproductive Cycle created successfully.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'sow_id' => 'required|exists:pigs,id_pig',
            'service_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'live_piglets' => 'nullable|integer|min:0',
            'dead_piglets' => 'nullable|integer|min:0',
            'lactation_end_date' => 'nullable|date',
        ]);

        ReproductiveCycle::create($request->all());
        return redirect()->route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index')->with('success', 'Reproductive Cycle created successfully.');
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $reproductiveCycle = ReproductiveCycle::with('sow')->findOrFail($id);
        return view('sipork::admin.ciclos_reproductivos.show', compact('reproductiveCycle'));
    }

    public function showaprendiz($id)
    {
        $reproductiveCycle = ReproductiveCycle::with('sow')->findOrFail($id);
        return view('sipork::aprendiz.CICLOS_REPRODUCTIVOS.show', compact('reproductiveCycle'));
    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function edit($id)
{
    $reproductiveCycle = ReproductiveCycle::findOrFail($id);
    $pigs = Pig::where('gender', 'F')->get();
    return view('sipork::admin.ciclos_reproductivos.edit', compact('reproductiveCycle', 'pigs'));
}

    public function editaprendiz($id)
{
    $reproductiveCycle = ReproductiveCycle::findOrFail($id);
    $pigs = Pig::where('gender', 'F')->get();
    return view('sipork::aprendiz.CICLOS_REPRODUCTIVOS.edit', compact('reproductiveCycle', 'pigs'));
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
            'sow_id' => 'required|exists:pigs,id_pig',
            'service_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'live_piglets' => 'nullable|integer|min:0',
            'dead_piglets' => 'nullable|integer|min:0',
            'lactation_end_date' => 'nullable|date',
        ]);

        $reproductiveCycle = ReproductiveCycle::findOrFail($id);
        $reproductiveCycle->update($request->all());
        return redirect()->route('sipork.admin.sipork.ciclos_reproductivos.index')->with('success', 'Reproductive Cycle updated successfully.');
    }

public function updateaprendiz(Request $request, $id)
    {
        $request->validate([
            'sow_id' => 'required|exists:pigs,id_pig',
            'service_date' => 'nullable|date',
            'birth_date' => 'nullable|date',
            'live_piglets' => 'nullable|integer|min:0',
            'dead_piglets' => 'nullable|integer|min:0',
            'lactation_end_date' => 'nullable|date',
        ]);

        $reproductiveCycle = ReproductiveCycle::findOrFail($id);
        $reproductiveCycle->update($request->all());
        return redirect()->route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index')->with('success', 'Reproductive Cycle updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $reproductiveCycle = ReproductiveCycle::findOrFail($id);
        $reproductiveCycle->delete();
        return redirect()->route('sipork.admin.sipork.ciclos_reproductivos.index')->with('success', 'Reproductive Cycle deleted successfully.');
    }

    public function destroyaprendiz($id)
    {
        $reproductiveCycle = ReproductiveCycle::findOrFail($id);
        $reproductiveCycle->delete();
        return redirect()->route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index')->with('success', 'Reproductive Cycle deleted successfully.');
    }
}
