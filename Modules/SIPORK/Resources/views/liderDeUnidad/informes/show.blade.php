@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Report Details')

@section('content_header')
    <h1>Report Details</h1>
@stop

@section('content')
<br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $report->id_report }}</p>
            <p><strong>Report Type:</strong> {{ $report->report_type }}</p>
            <p><strong>Report Date:</strong> {{ $report->report_date }}</p>
            <p><strong>Description:</strong> {{ $report->description ?? 'N/A' }}</p>
            <p><strong>Lot:</strong> {{ $report->lot ? $report->lot->lot_name : 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $report->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $report->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.liderDeUnidad.sipork.informes.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Report Page Loaded'); </script>
@stop