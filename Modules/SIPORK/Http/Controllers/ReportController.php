<?php

namespace Modules\SIPORK\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\SIPORK\Entities\Report;
use Modules\SIPORK\Entities\Lot;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $reports = Report::with('lot')->paginate(10);
        return view('sipork::admin.reportes.index', compact('reports'));
    }
    public function indexlider()
    {
        $reports = Report::with('lot')->get();
        return view('sipork::liderDeUnidad.informes.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $lots = Lot::all();
        return view('sipork::admin.reportes.create', compact('lots'));
    }

    public function createlider()
    {
        $lots = Lot::all();
        return view('sipork::liderDeUnidad.informes.create', compact('lots'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string|max:50',
            'report_date' => 'required|date',
            'description' => 'nullable|string',
            'lot_id' => 'nullable|exists:lots,id_lot',
        ]);

        Report::create($request->all());

        return redirect()->route('sipork.admin.sipork.reportes.index')->with('success', 'Report created successfully.');
    }

    public function storelider(Request $request)
    {
        $request->validate([
            'report_type' => 'required|string|max:50',
            'report_date' => 'required|date',
            'description' => 'nullable|string',
            'lot_id' => 'nullable|exists:lots,id_lot',
        ]);

        Report::create($request->all());

        return redirect()->route('sipork.liderDeUnidad.sipork.informes.index')->with('success', 'Report created successfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('sipork::admin.reportes.show', compact('report'));
    }

    public function showlider($id)
    {
        $report = Report::findOrFail($id);
        return view('sipork::liderDeUnidad.informes.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        $lots = Lot::all();
        return view('sipork::admin.reportes.edit', compact('report', 'lots'));
    }

    public function editlider($id)
    {
        $report = Report::findOrFail($id);
        $lots = Lot::all();
        return view('sipork::liderDeUnidad.informes.edit', compact('report', 'lots'));
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
            'report_type' => 'required|string|max:50',
            'report_date' => 'required|date',
            'description' => 'nullable|string',
            'lot_id' => 'nullable|exists:lots,id_lot',
        ]);

        $report = Report::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('sipork.admin.sipork.reportes.index')->with('success', 'Report updated successfully.');
    }

    public function updatelider(Request $request, $id)
    {
        $request->validate([
            'report_type' => 'required|string|max:50',
            'report_date' => 'required|date',
            'description' => 'nullable|string',
            'lot_id' => 'nullable|exists:lots,id_lot',
        ]);

        $report = Report::findOrFail($id);
        $report->update($request->all());

        return redirect()->route('sipork.liderDeUnidad.sipork.informes.index')->with('success', 'Report updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('sipork.admin.sipork.reportes.index')->with('success', 'Report deleted successfully.');
      }

    public function destroylider($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->route('sipork.liderDeUnidad.sipork.informes.index')->with('success', 'Report deleted successfully.');
      }
}