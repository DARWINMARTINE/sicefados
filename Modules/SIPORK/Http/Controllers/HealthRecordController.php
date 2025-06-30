<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Pig;
use Modules\SIPORK\Entities\HealthRecord;
use Modules\SIPORK\Entities\OperationalCost;

class HealthRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $healthRecords = HealthRecord::with('pig', 'cost')->paginate(10);
        return view('sipork::admin.registros_de_salud.index', compact('healthRecords'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pigs = Pig::all();
        $costs = OperationalCost::all();
        return view('sipork::admin.registros_de_salud.create', compact('pigs', 'costs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'record_type' => 'required|string|max:20',
            'description' => 'nullable|string',
            'application_date' => 'required|date',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        HealthRecord::create($request->all());
        return redirect()->route('sipork.admin.sipork.registros_de_salud.index')->with('success', 'Health Record created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $healthRecord = HealthRecord::with('pig', 'cost')->findOrFail($id);
        return view('sipork::admin.registros_de_salud.show', compact('healthRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $healthRecord = HealthRecord::with('pig', 'cost')->findOrFail($id);
        $pigs = Pig::all();
        $costs = OperationalCost::all();
        return view('sipork::admin.registros_de_salud.edit', compact('healthRecord', 'pigs', 'costs'));
    }

    // public function edit(HealthRecord $healthRecord)
    // {
    //     $pigs = Pig::all();
    //     $costs = OperationalCost::all();
    //     return view('sipork::admin.registros_de_salud.edit', compact('healthRecord', 'pigs', 'costs'));
    // }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'record_type' => 'required|string|max:20',
            'description' => 'nullable|string',
            'application_date' => 'required|date',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        $healthRecord = HealthRecord::findOrFail($id);
        $healthRecord->update($request->all());
        return redirect()->route('sipork.admin.sipork.registros_de_salud.index')->with('success', 'Health Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $healthRecord = HealthRecord::findOrFail($id);
        $healthRecord->delete();
        return redirect()->route('sipork.admin.sipork.registros_de_salud.index')->with('success', 'Health Record deleted successfully.');
    }
}
