@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Biosecurity Measure Details')

@section('content_header')
    <h1>Biosecurity Measure Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $measure->id_biosecurity }}</p>
            <p><strong>Measure Type:</strong> {{ $measure->measure_type }}</p>
            <p><strong>Implementation Date:</strong> {{ $measure->implementation_date }}</p>
            <p><strong>Description:</strong> {{ $measure->description ?? 'N/A' }}</p>
            <p><strong>Cost Type:</strong> {{ $measure->cost->cost_type ?? 'N/A' }}</p>
            <p><strong>Lot:</strong> {{ $measure->lot->lot_name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $measure->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $measure->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Biosecurity Measure Page Loaded'); </script>
@stop