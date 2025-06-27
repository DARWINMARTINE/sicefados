@extends('sipork::layouts.masterAprendiz')

@section('title', 'Supply Feeding Details')

@section('content_header')
    <h1>Supply Feeding Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $supplyFeeding->id_supply_feeding }}</p>
            <p><strong>Feeding Event:</strong> {{ $supplyFeeding->feeding->id_feeding }}</p>
            <p><strong>Supply:</strong> {{ $supplyFeeding->supply->id_supply }}</p>
            <p><strong>Quantity Used:</strong> {{ $supplyFeeding->quantity_used }}</p>
            <p><strong>Usage Date:</strong> {{ $supplyFeeding->usage_date }}</p>
            <p><strong>Created At:</strong> {{ $supplyFeeding->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $supplyFeeding->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Supply Feeding Page Loaded'); </script>
@stop