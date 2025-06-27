@extends('sipork::layouts.masterAprendiz')

@section('title', 'Lot Details')

@section('content_header')
    <h1>Lot Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $lot->id_lot }}</p>
            <p><strong>Lot Name:</strong> {{ $lot->lot_name }}</p>
            <p><strong>Creation Date:</strong> {{ $lot->creation_date }}</p>
            <p><strong>Status:</strong> {{ $lot->status == 1 ? 'Activo' : 'Inactivo' }}</p>
            <p><strong>Created At:</strong> {{ $lot->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $lot->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.aprendiz.sipork.LOTES.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Lot Page Loaded'); </script>
@stop