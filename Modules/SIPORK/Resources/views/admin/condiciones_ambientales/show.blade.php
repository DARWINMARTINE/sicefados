@extends('sipork::layouts.master')

@section('title', 'Environmental Condition Details')

@section('content_header')
    <h1>Environmental Condition Details</h1>
@stop

@section('content')
<br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $condition->id_condition }}</p>
            <p><strong>Date Time:</strong> {{ $condition->date_time }}</p>
            <p><strong>Temperature:</strong> {{ $condition->temperature ?? 'N/A' }}</p>
            <p><strong>Humidity:</strong> {{ $condition->humidity ?? 'N/A' }}</p>
            <p><strong>Ventilation:</strong> {{ $condition->ventilation ?? 'N/A' }}</p>
            <p><strong>Lot:</strong> {{ $condition->lot->lot_name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $condition->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $condition->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.condiciones_ambientales.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Environmental Condition Page Loaded'); </script>
@stop