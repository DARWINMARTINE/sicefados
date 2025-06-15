@extends('sipork::layouts.master')

@section('title', 'Warehouse Details')

@section('content_header')
    <h1>Warehouse Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $warehouse->id_warehouse }}</p>
            <p><strong>Warehouse Name:</strong> {{ $warehouse->warehouse_name }}</p>
            <p><strong>Location:</strong> {{ $warehouse->location }}</p>
            <p><strong>Capacity:</strong> {{ $warehouse->capacity }}</p>
            <p><strong>Created At:</strong> {{ $warehouse->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $warehouse->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.bodegas.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Warehouse Page Loaded'); </script>
@stop