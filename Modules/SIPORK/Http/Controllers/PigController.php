<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Pig;
use Barryvdh\DomPDF\Facade\Pdf; // Import the PDF facade

class PigController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $pigs = Pig::paginate(10); // 10 registros por página
        return view('sipork::admin.gestion_de_cerdos.index', compact('pigs'));
    }

    public function indexlider()
    {
        $pigs = pig::all(); // Fetch all pigs from the database
        return view('sipork::liderDeUnidad.gestion_de_cerdos.index', ['pigs' => $pigs]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $mothers = []; // Fetch or define $mothers data, e.g., from a model
        return view('sipork::admin.gestion_de_cerdos.create', ['mothers' => $mothers]);
    }

     public function createlider(){
        $mothers = []; // Fetch or define $mothers data, e.g., from a model
        return view('sipork::liderDeUnidad.gestion_de_cerdos.create', ['mothers' => $mothers]);
     }
    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'birth_date' => 'required|date',
            'initial_weight' => 'required|numeric|min:0',
            'gender' => 'required|in:M,F',
            'status' => 'required|in:Active,Weaned,Sold,Deceased',
            'breed' => 'required|in:Pietrain,Duroc,Landrace,Hampshire,Large-White',
            'weaning_date' => 'nullable|date|after_or_equal:birth_date',
            'sale_date' => 'nullable|date|after_or_equal:birth_date',
        ]);

        Pig::create($validated);

        return redirect()->route('sipork.admin.sipork.gestion_de_cerdos.index')->with('success', 'Pig registered successfully.');
    }

    public function storelider(Request $request)
    {
        $validated = $request->validate([
            'birth_date' => 'required|date',
            'initial_weight' => 'required|numeric|min:0',
            'gender' => 'required|in:M,F',
            'status' => 'required|in:Active,Weaned,Sold,Deceased',
            'breed' => 'required|in:Pietrain,Duroc,Landrace,Hampshire,Large-White',
            'weaning_date' => 'nullable|date|after_or_equal:birth_date',
            'sale_date' => 'nullable|date|after_or_equal:birth_date',
        ]);

        Pig::create($validated);

        return redirect()->route('sipork.liderDeUnidad.sipork.gestion_de_cerdos.index')->with('success', 'Pig registered successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $pig = Pig::findOrFail($id); // Fetch the pig by ID or fail
        return view('sipork::admin.gestion_de_cerdos.show', ['pig' => $pig]); // Pass the pig data to the view
    }

    public function showlider($id)
    {
        $pig = Pig::findOrFail($id); // Fetch the pig by ID or fail
        return view('sipork::liderDeUnidad.gestion_de_cerdos.show', ['pig' => $pig]); // Pass the pig data to the view
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $pig = Pig::findOrFail($id); // Fetch the pig by ID or fail
        $mothers = []; // Fetch or define $mothers data, e.g., from a model
        return view('sipork::admin.gestion_de_cerdos.edit', ['pig' => $pig, 'mothers' => $mothers]);
    }

    public function editlider($id)
    {
        $pig = Pig::findOrFail($id); // Fetch the pig by ID or fail
        $mothers = []; // Fetch or define $mothers data, e.g., from a model
        return view('sipork::liderDeUnidad.gestion_de_cerdos.edit', ['pig' => $pig, 'mothers' => $mothers]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $pig = Pig::findOrFail($id);

        $validated = $request->validate([
            'birth_date' => 'required|date',
            'initial_weight' => 'required|numeric|min:0',
            'gender' => 'required|in:M,F',
            'breed' => 'required|in:Pietrain,Duroc,Landrace,Hampshire,Large-White',
            'status' => 'required|in:Active,Weaned,Sold,Deceased',
            'weaning_date' => 'nullable|date|after_or_equal:birth_date',
            'sale_date' => 'nullable|date|after_or_equal:birth_date',
        ]);

        $pig->update($validated);

        return redirect()->route('sipork.admin.sipork.gestion_de_cerdos.index')->with('success', 'Pig updated successfully.');
    }

    public function updatelider(Request $request, $id)
    {
        $pig = Pig::findOrFail($id);

        $validated = $request->validate([
            'birth_date' => 'required|date',
            'initial_weight' => 'required|numeric|min:0',
            'gender' => 'required|in:M,F',
            'breed' => 'required|in:Pietrain,Duroc,Landrace,Hampshire,Large-White',
            'status' => 'required|in:Active,Weaned,Sold,Deceased',
            'weaning_date' => 'nullable|date|after_or_equal:birth_date',
            'sale_date' => 'nullable|date|after_or_equal:birth_date',
        ]);

        $pig->update($validated);

        return redirect()->route('sipork.liderDeUnidad.sipork.gestion_de_cerdos.index')->with('success', 'Pig updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $pig = Pig::findOrFail($id);
        $pig->delete();

        return redirect()->route('sipork.admin.sipork.gestion_de_cerdos.index')->with('success', 'Pig deleted successfully.');
    }

    public function destroylider($id)
    {
        $pig = Pig::findOrFail($id);
        $pig->delete();

        return redirect()->route('sipork.liderDeUnidad.sipork.gestion_de_cerdos.index')->with('success', 'Pig deleted successfully.');
    }

    public function exportPdf()
{
    $pigs = \Modules\SIPORK\Entities\Pig::all(); // Ajusta el namespace si es necesario
    $pdf = Pdf::loadView('sipork::admin.gestion_de_cerdos.pdf', compact('pigs'));
    return $pdf->download('lista_cerdos.pdf');
}
}
