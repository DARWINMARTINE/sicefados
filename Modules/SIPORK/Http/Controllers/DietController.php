<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Feeding;
use Modules\SIPORK\Entities\Pig;
use Modules\SIPORK\Entities\Lot;
use Modules\SIPORK\Entities\Diet;

class DietController extends Controller
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
        $diets = Diet::all();
        return view('sipork::admin.dietas.index', compact('diets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    // public function create()
    // {
    //     return view('sipork::create');
    // }
    public function create()
    {
        return view('sipork::admin.dietas.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'diet_name' => 'required|string|max:50',
            'min_age' => 'nullable|integer|min:0',
            'max_age' => 'nullable|integer|min:0|gte:min_age',
            'min_weight' => 'nullable|numeric|min:0',
            'max_weight' => 'nullable|numeric|min:0|gte:min_weight',
            'physiological_state' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        Diet::create($request->all());

        return redirect()->route('sipork.admin.sipork.dietas.index')->with('success', 'Dieta creada exitosamente.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $diet = Diet::findOrFail($id);
        return view('sipork::admin.dietas.show', compact('diet'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $diet = Diet::findOrFail($id);
        return view('sipork::admin.dietas.edit', compact('diet'));
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
            'diet_name' => 'required|string|max:50',
            'min_age' => 'nullable|integer|min:0',
            'max_age' => 'nullable|integer|min:0|gte:min_age',
            'min_weight' => 'nullable|numeric|min:0',
            'max_weight' => 'nullable|numeric|min:0|gte:min_weight',
            'physiological_state' => 'nullable|string|max:20',
            'description' => 'nullable|string',
        ]);

        $diet = Diet::findOrFail($id);
        $diet->update($request->all());

        return redirect()->route('sipork.admin.sipork.dietas.index')->with('success', 'Dieta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $diet = Diet::findOrFail($id);
        $diet->delete();

        return redirect()->route('sipork.admin.sipork.dietas.index')->with('success', 'Dieta eliminada exitosamente.');
    }
}
