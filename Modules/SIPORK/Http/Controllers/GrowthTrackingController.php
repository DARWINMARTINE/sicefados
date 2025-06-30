<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\GrowthTracking;
use Modules\SIPORK\Entities\Pig;

class GrowthTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $growthTrackings = GrowthTracking::with('pig')->paginate(10);
        return view('sipork::admin.seguimiento_del_crecimiento.index', compact('growthTrackings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pigs = Pig::all();
        return view('sipork::admin.seguimiento_del_crecimiento.create', compact('pigs'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
         $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'measurement_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'observations' => 'nullable|string',
        ]);

        GrowthTracking::create($request->all());
        return redirect()->route('sipork.admin.sipork.seguimiento_del_crecimiento.index')->with('success', 'Growth Tracking created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $growthTracking = GrowthTracking::with('pig')->findOrFail($id);
        return view('sipork::admin.seguimiento_del_crecimiento.show', compact('growthTracking'));
    }

    // public function show(GrowthTracking $growthTracking)
    // {
    //     $growthTracking->load('pig');
    //     return view('sipork::admin.seguimiento_del_crecimiento.show', compact('growthTracking'));
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $growthTracking = GrowthTracking::with('pig')->findOrFail($id);
        $pigs = Pig::all();
        return view('sipork::admin.seguimiento_del_crecimiento.edit', compact('growthTracking', 'pigs'));
    }

    // public function edit(GrowthTracking $growthTracking)
    // {
    //     $pigs = Pig::all();
    //     return view('sipork::admin.seguimiento_del_crecimiento.edit', compact('growthTracking', 'pigs'));
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
            'measurement_date' => 'required|date',
            'weight' => 'required|numeric|min:0',
            'observations' => 'nullable|string',
        ]);

        $growthTracking = GrowthTracking::findOrFail($id);
        $growthTracking->update($request->all());
        return redirect()->route('sipork.admin.sipork.seguimiento_del_crecimiento.index')->with('success', 'Growth Tracking updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $growthTracking = GrowthTracking::findOrFail($id);
        $growthTracking->delete();
        return redirect()->route('sipork.admin.sipork.seguimiento_del_crecimiento.index')->with('success', 'Growth Tracking deleted successfully.');
    }

    public function showChart($id_pig)
    {
        $pig = Pig::with('growthTracking')->findOrFail($id_pig);
        $trackings = $pig->growthTracking->sortBy('measurement_date');

        // Prepara los datos para la gráfica
        $labels = $trackings->pluck('measurement_date')->map(function($d) {
            return \Carbon\Carbon::parse($d)->format('d/m/Y');
        })->values();

        $weights = $trackings->pluck('weight')->values();

        return view('sipork::admin.seguimiento_del_crecimiento.growth_chart', compact('pig', 'trackings', 'labels', 'weights'));
    }
}
