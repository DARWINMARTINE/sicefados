<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Feeding;
use Modules\SIPORK\Entities\Pig;
use Modules\SIPORK\Entities\Lot;
use Modules\SIPORK\Entities\Diet;
use Modules\SIPORK\Entities\OperationalCost;

class FeedingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $feedings = Feeding::with(['pig', 'lot', 'diet', 'cost'])->paginate(10);
        return view('sipork::admin.alimentacion.index', compact('feedings'));
    }

    public function indexaprendiz()
    {
        $feedings = Feeding::with(['pig', 'lot', 'diet', 'cost'])->paginate(10);
        return view('sipork::aprendiz.ALIMENTACION.index', compact('feedings'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
{
    $pigs = Pig::all();
    $lots = Lot::all(); // Make sure to fetch lots
    $diets = Diet::all();
    $costs = OperationalCost::all();
    return view('sipork::admin.alimentacion.create', compact('pigs', 'lots', 'diets', 'costs'));
}
    public function createaprendiz()
{
    $pigs = Pig::all();
    $lots = Lot::all(); // Make sure to fetch lots
    $diets = Diet::all();
    $costs = OperationalCost::all();
    return view('sipork::aprendiz.ALIMENTACION.create', compact('pigs', 'lots', 'diets', 'costs'));
}

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'pig_id' => 'nullable|exists:pigs,id_pig',
            'lot_id' => 'nullable|exists:lots,id_lot',
            'diet_id' => 'required|exists:diets,id_diet',
            'feeding_date' => 'required|date',
            'food_amount' => 'required|numeric|min:0',
            'fcr' => 'nullable|numeric|min:0',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        Feeding::create($request->all());

        return redirect()->route('sipork.admin.sipork.alimentacion.index')->with('success', 'Evento de alimentación registrado exitosamente.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'pig_id' => 'nullable|exists:pigs,id_pig',
            'lot_id' => 'nullable|exists:lots,id_lot',
            'diet_id' => 'required|exists:diets,id_diet',
            'feeding_date' => 'required|date',
            'food_amount' => 'required|numeric|min:0',
            'fcr' => 'nullable|numeric|min:0',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        Feeding::create($request->all());

        return redirect()->route('sipork.aprendiz.sipork.ALIMENTACION.index')->with('success', 'Evento de alimentación registrado exitosamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $feeding = Feeding::with(['pig', 'lot', 'diet', 'cost'])->findOrFail($id);
        return view('sipork::admin.alimentacion.show', compact('feeding'));
    }

    public function showaprendiz($id)
    {
        $feeding = Feeding::with(['pig', 'lot', 'diet', 'cost'])->findOrFail($id);
        return view('sipork::aprendiz.ALIMENTACION.show', compact('feeding'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $feeding = Feeding::findOrFail($id);
        $pigs = Pig::all();
        $lots = Lot::all();
        $diets = Diet::all();
        $costs = OperationalCost::all();
        return view('sipork::admin.alimentacion.edit', compact('feeding', 'pigs', 'lots', 'diets', 'costs'));
    }

    public function editaprendiz($id)
    {
        $feeding = Feeding::findOrFail($id);
        $pigs = Pig::all();
        $lots = Lot::all();
        $diets = Diet::all();
        $costs = OperationalCost::all();
        return view('sipork::aprendiz.ALIMENTACION.edit', compact('feeding', 'pigs', 'lots', 'diets', 'costs'));
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
            'pig_id' => 'nullable|exists:pigs,id_pig',
            'lot_id' => 'nullable|exists:lots,id_lot',
            'diet_id' => 'required|exists:diets,id_diet',
            'feeding_date' => 'required|date',
            'food_amount' => 'required|numeric|min:0',
            'fcr' => 'nullable|numeric|min:0',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        $feeding = Feeding::findOrFail($id);
        $feeding->update($request->all());

        return redirect()->route('sipork.admin.sipork.alimentacion.index')->with('success', 'Evento de alimentación actualizado exitosamente.');
    }

    public function updateaprendiz(Request $request, $id)
    {
        $request->validate([
            'pig_id' => 'nullable|exists:pigs,id_pig',
            'lot_id' => 'nullable|exists:lots,id_lot',
            'diet_id' => 'required|exists:diets,id_diet',
            'feeding_date' => 'required|date',
            'food_amount' => 'required|numeric|min:0',
            'fcr' => 'nullable|numeric|min:0',
            'cost_id' => 'required|exists:operational_costs,id_cost',
        ]);

        $feeding = Feeding::findOrFail($id);
        $feeding->update($request->all());

        return redirect()->route('sipork.aprendiz.sipork.ALIMENTACION.index')->with('success', 'Evento de alimentación actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $feeding = Feeding::findOrFail($id);
        $feeding->delete();

        return redirect()->route('sipork.admin.sipork.alimentacion.index')->with('success', 'Evento de alimentación eliminado exitosamente.');
    }

    public function destroyaprendiz($id)
    {
        $feeding = Feeding::findOrFail($id);
        $feeding->delete();

        return redirect()->route('sipork.aprendiz.sipork.ALIMENTACION.index')->with('success', 'Evento de alimentación eliminado exitosamente.');
    }
}
