@extends('sipork::layouts.masterAprendiz')

@section('title', 'Supply Details')

@section('content_header')
    <h1>Supply Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $supply->id_supply }}</p>
            <p><strong>Supply Name:</strong> {{ $supply->supply_name }}</p>
            <p><strong>Supply Type:</strong> {{ $supply->supply_type }}</p>
            <p><strong>Quantity:</strong> {{ $supply->quantity }}</p>
            <p><strong>Unit Cost:</strong> {{ $supply->unit_cost }}</p>
            <p><strong>Entry Date:</strong> {{ $supply->entry_date }}</p>
            <p><strong>Warehouse:</strong> {{ $supply->warehouse->warehouse_name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $supply->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $supply->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.aprendiz.sipork.SUMINISTROS.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Supply Page Loaded'); </script>
@stop