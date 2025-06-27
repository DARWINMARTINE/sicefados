<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\SIPORK\Entities\Pig;
use Modules\SIPORK\Entities\Lot;
use Modules\SIPORK\Entities\PigLot;

class PigLotController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pigLots = DB::table('pigs_lots')
            ->join('pigs', 'pigs_lots.pig_id', '=', 'pigs.id_pig')
            ->join('lots', 'pigs_lots.lot_id', '=', 'lots.id_lot')
            ->select('pigs_lots.*', 'pigs.breed as pig_breed', 'lots.lot_name')
            ->get();
        return view('sipork::admin.asignar_cerdos_a_lotes.index', compact('pigLots'));
    }
    
    public function indexaprendiz()
    {
        $pigLots = DB::table('pigs_lots')
            ->join('pigs', 'pigs_lots.pig_id', '=', 'pigs.id_pig')
            ->join('lots', 'pigs_lots.lot_id', '=', 'lots.id_lot')
            ->select('pigs_lots.*', 'pigs.breed as pig_breed', 'lots.lot_name')
            ->get();
        return view('sipork::aprendiz.ASIGNAR_CERDOS.index', compact('pigLots'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $pigs = Pig::all();
        $lots = Lot::all();
        return view('sipork::admin.asignar_cerdos_a_lotes.create', compact('pigs', 'lots'));
    }
    public function createaprendiz()
    {
        $pigs = Pig::all();
        $lots = Lot::all();
        return view('sipork::aprendiz.ASIGNAR_CERDOS.create', compact('pigs', 'lots'));
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
            'lot_id' => 'required|exists:lots,id_lot',
            'entry_date' => 'required|date',
            // 'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        DB::table('pigs_lots')->insert([
            'pig_id' => $request->pig_id,
            'lot_id' => $request->lot_id,
            'entry_date' => $request->entry_date,
            // 'exit_date' => $request->exit_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('sipork.admin.sipork.asignar_cerdos_a_lotes.index')->with('success', 'Pig assigned to lot successfully.');
    }

    public function storeaprendiz(Request $request)
    {
        $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'lot_id' => 'required|exists:lots,id_lot',
            'entry_date' => 'required|date',
            // 'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        DB::table('pigs_lots')->insert([
            'pig_id' => $request->pig_id,
            'lot_id' => $request->lot_id,
            'entry_date' => $request->entry_date,
            // 'exit_date' => $request->exit_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index')->with('success', 'Pig assigned to lot successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($pig_id, $lot_id)
    {
        $pigLot = DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->first();

        if (!$pigLot) {
            abort(404);
        }

        $pig = Pig::where('id_pig', $pigLot->pig_id)->first();
        $lot = Lot::where('id_lot', $pigLot->lot_id)->first();

        return view('sipork::admin.asignar_cerdos_a_lotes.show', compact('pigLot', 'pig', 'lot'));
    }

    public function showaprendiz($pig_id, $lot_id)
    {
        $pigLot = DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->first();

        if (!$pigLot) {
            abort(404);
        }

        $pig = Pig::where('id_pig', $pigLot->pig_id)->first();
        $lot = Lot::where('id_lot', $pigLot->lot_id)->first();

        return view('sipork::aprendiz.ASIGNAR_CERDOS.show', compact('pigLot', 'pig', 'lot'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($pig_id, $lot_id)
    {
        $pigLot = DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->first();

        if (!$pigLot) {
            abort(404);
        }

        $pigs = Pig::all();
        $lots = Lot::all();

        return view('sipork::admin.asignar_cerdos_a_lotes.edit', compact('pigLot', 'pigs', 'lots'));
    }

    public function editaprendiz($pig_id, $lot_id)
    {
        $pigLot = DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->first();

        if (!$pigLot) {
            abort(404);
        }

        $pigs = Pig::all();
        $lots = Lot::all();

        return view('sipork::aprendiz.ASIGNAR_CERDOS.edit', compact('pigLot', 'pigs', 'lots'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $pig_id, $lot_id)
    {
        $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'lot_id' => 'required|exists:lots,id_lot',
            'entry_date' => 'required|date',
            'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        // Eliminar el registro anterior
        DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->delete();

        // Insertar el nuevo registro con los valores actualizados
        DB::table('pigs_lots')->insert([
            'pig_id' => $request->pig_id,
            'lot_id' => $request->lot_id,
            'entry_date' => $request->entry_date,
            'exit_date' => $request->exit_date,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('sipork.admin.sipork.asignar_cerdos_a_lotes.index')->with('success', 'Pig lot updated successfully.');
    }

    public function updateaprendiz(Request $request, $pig_id, $lot_id)
    {
        $request->validate([
            'pig_id' => 'required|exists:pigs,id_pig',
            'lot_id' => 'required|exists:lots,id_lot',
            'entry_date' => 'required|date',
            'exit_date' => 'nullable|date|after_or_equal:entry_date',
        ]);

        // Eliminar el registro anterior
        DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->delete();

        // Insertar el nuevo registro con los valores actualizados
        DB::table('pigs_lots')->insert([
            'pig_id' => $request->pig_id,
            'lot_id' => $request->lot_id,
            'entry_date' => $request->entry_date,
            'exit_date' => $request->exit_date,
            'updated_at' => now(),
            'created_at' => now(),
        ]);

        return redirect()->route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index')->with('success', 'Pig lot updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($pig_id, $lot_id)
    {
        DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->delete();

        return redirect()->route('sipork.admin.sipork.asignar_cerdos_a_lotes.index')->with('success', 'Pig lot assignment deleted successfully.');
    }

    public function destroyaprendiz($pig_id, $lot_id)
    {
        DB::table('pigs_lots')
            ->where('pig_id', $pig_id)
            ->where('lot_id', $lot_id)
            ->delete();

        return redirect()->route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index')->with('success', 'Pig lot assignment deleted successfully.');
    }
}