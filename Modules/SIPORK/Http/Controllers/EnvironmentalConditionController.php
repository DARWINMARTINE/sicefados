<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\EnvironmentalCondition;
use Modules\SIPORK\Entities\Lot;
use Carbon\Carbon;

class EnvironmentalConditionController extends Controller
{
    public function index()
    {
        $conditions = EnvironmentalCondition::with('lot')->get();
        return view('sipork::admin.condiciones_ambientales.index', compact('conditions'));
    }

    public function indexlider()
    {
        $conditions = EnvironmentalCondition::with('lot')->get();
        return view('sipork::liderDeUnidad.condiciones-ambientales.index', compact('conditions'));
    }

    public function create()
    {
        $lots = Lot::all();
        return view('sipork::admin.condiciones_ambientales.create', compact('lots'));
    }

    public function createlider()
    {
        $lots = Lot::all();
        return view('sipork::liderDeUnidad.condiciones-ambientales.create', compact('lots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_time' => 'required|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'ventilation' => 'nullable|string|max:20',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        EnvironmentalCondition::create([
            'date_time' => $request->date_time,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
            'ventilation' => $request->ventilation,
            'lot_id' => $request->lot_id,
        ]);

        return redirect()->route('sipork.admin.sipork.condiciones_ambientales.index')->with('success', 'Condición ambiental registrada correctamente.');
    }

    public function storelider(Request $request)
    {
        $request->validate([
            'date_time' => 'required|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'ventilation' => 'nullable|string|max:20',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        EnvironmentalCondition::create([
            'date_time' => $request->date_time,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
            'ventilation' => $request->ventilation,
            'lot_id' => $request->lot_id,
        ]);

        return redirect()->route('sipork.liderDeUnidad.sipork.condiciones-ambientales.index')->with('success', 'Condición ambiental registrada correctamente.');
    }
    
    public function show($id)
    {
        $condition = EnvironmentalCondition::with('lot')->findOrFail($id);
        return view('sipork::admin.condiciones_ambientales.show', compact('condition'));
    }

    public function showlider($id)
    {
        $condition = EnvironmentalCondition::with('lot')->findOrFail($id);
        return view('sipork::liderDeUnidad.condiciones-ambientales.show', compact('condition'));
    }

    public function edit($id)
    {
        $condition = EnvironmentalCondition::with('lot')->findOrFail($id);
        $lots = Lot::all();
        $condition->date_time = Carbon::parse($condition->date_time);
        return view('sipork::admin.condiciones_ambientales.edit', compact('condition', 'lots'));
    }

    public function editlider($id)
    {
        $condition = EnvironmentalCondition::with('lot')->findOrFail($id);
        $lots = Lot::all();
        $condition->date_time = Carbon::parse($condition->date_time);
        return view('sipork::liderDeUnidad.condiciones-ambientales.edit', compact('condition', 'lots'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date_time' => 'required|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'ventilation' => 'nullable|string|max:20',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $condition = EnvironmentalCondition::findOrFail($id);
        $condition->update([
            'date_time' => $request->date_time,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
            'ventilation' => $request->ventilation,
            'lot_id' => $request->lot_id,
        ]);

        return redirect()->route('sipork.admin.sipork.condiciones_ambientales.index')->with('success', 'Condición ambiental actualizada correctamente.');
    }

    public function updatelider(Request $request, $id)
    {
        $request->validate([
            'date_time' => 'required|date',
            'temperature' => 'nullable|numeric',
            'humidity' => 'nullable|numeric',
            'ventilation' => 'nullable|string|max:20',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $condition = EnvironmentalCondition::findOrFail($id);
        $condition->update([
            'date_time' => $request->date_time,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity,
            'ventilation' => $request->ventilation,
            'lot_id' => $request->lot_id,
        ]);

        return redirect()->route('sipork.liderDeUnidad.sipork.condiciones-ambientales.index')->with('success', 'Condición ambiental actualizada correctamente.');
    }

    public function destroy($id)
    {
        $condition = EnvironmentalCondition::findOrFail($id);
        $condition->delete();

        return redirect()->route('sipork.admin.sipork.condiciones_ambientales.index')->with('success', 'Condición ambiental eliminada correctamente.');
    }

    public function destroylider($id)
    {
        $condition = EnvironmentalCondition::findOrFail($id);
        $condition->delete();

        return redirect()->route('sipork.liderDeUnidad.sipork.condiciones-ambientales.index')->with('success', 'Condición ambiental eliminada correctamente.');
    }
}
