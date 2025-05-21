<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\SanitaryOutbreak;
use Modules\SIPORK\Entities\Lot;
use Illuminate\Support\Facades\DB;


class SanitaryOutbreakController extends Controller
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
        $sanitaryOutbreaks = SanitaryOutbreak::with('lot')->get();
        return view('sipork::admin.brotes_sanitarios.index', compact('sanitaryOutbreaks'));
    }
    

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    // public function create()
    // {
    //     return view('sipork::create');
    // }
    // public function create()
    // {
    //     $lots = Lot::where('status', 'Active')->get();
    //     return view('sipork::admin.brotes_sanitarios.create', compact('lots'));
    // }
public function create()
{
    $lots = DB::table('lots')->get();
    return view('sipork::admin.brotes_sanitarios.create', compact('lots'));
}
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'disease' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $sanitaryOutbreak = new SanitaryOutbreak();
        $sanitaryOutbreak->start_date = $request->start_date;
        $sanitaryOutbreak->end_date = $request->end_date;
        $sanitaryOutbreak->disease = $request->disease;
        $sanitaryOutbreak->description = $request->description;
        $sanitaryOutbreak->lot_id = $request->lot_id;
        $sanitaryOutbreak->save();

        return redirect()->route('sipork.admin.sipork.brotes_sanitarios.index')->with('success', 'Brotes sanitarios registrados correctamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    // public function show($id)
    // {
    //     return view('sipork::show');
    // }
    public function show($id)
    {
        $sanitaryOutbreak = SanitaryOutbreak::with('lot')->findOrFail($id);
        return view('sipork::admin.brotes_sanitarios.show', compact('sanitaryOutbreak'));
    }

    // public function show(SanitaryOutbreak $sanitaryOutbreak)
    // {
    //     $sanitaryOutbreak->load('lot');
    //     return view('sanitary_outbreaks.show', compact('sanitaryOutbreak'));
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
{
    $sanitaryOutbreak = SanitaryOutbreak::findOrFail($id);
    $lots = Lot::all(); // Make sure to import the Lot model at the top of the file
    return view('sipork::admin.brotes_sanitarios.edit', compact('sanitaryOutbreak', 'lots'));
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
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'disease' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'lot_id' => 'required|exists:lots,id_lot',
        ]);

        $sanitaryOutbreak = SanitaryOutbreak::findOrFail($id);
        $sanitaryOutbreak->start_date = $request->start_date;
        $sanitaryOutbreak->end_date = $request->end_date;
        $sanitaryOutbreak->disease = $request->disease;
        $sanitaryOutbreak->description = $request->description;
        $sanitaryOutbreak->lot_id = $request->lot_id;
        $sanitaryOutbreak->save();

        return redirect()->route('sipork.admin.sipork.brotes_sanitarios.index')->with('success', 'Brotes sanitarios actualizados correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sanitaryOutbreak = SanitaryOutbreak::findOrFail($id);
        $sanitaryOutbreak->delete();

        return redirect()->route('sipork.admin.sipork.brotes_sanitarios.index')->with('success', 'Brotes sanitarios eliminados correctamente.');
    }
}
