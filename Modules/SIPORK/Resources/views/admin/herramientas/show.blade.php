@extends('sipork::layouts.master')

@section('title', 'Tool Details')

@section('content_header')
    <h1>Tool Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $tool->id_tool }}</p>
            <p><strong>Tool Name:</strong> {{ $tool->tool_name }}</p>
            <p><strong>Quantity:</strong> {{ $tool->quantity }}</p>
            <p><strong>Purchase Date:</strong> {{ $tool->purchase_date }}</p>
            <p><strong>Unit Cost:</strong> {{ $tool->unit_cost }}</p>
            <p><strong>Warehouse:</strong> {{ $tool->warehouse->warehouse_name ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $tool->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $tool->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.herramientas.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Tool Page Loaded'); </script>
@stop