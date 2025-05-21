@extends('sipork::layouts.master')

@section('title', 'Pig Lot Assignment Details')

@section('content_header')
    <h1>Pig Lot Assignment Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>Pig ID:</strong> {{ $pigLot->pig_id }}</p>
            <p><strong>Pig Breed:</strong> {{ $pig->breed }}</p>
            <p><strong>Lot Name:</strong> {{ $lot->lot_name }}</p>
            <p><strong>Entry Date:</strong> {{ $pigLot->entry_date }}</p>
            <p><strong>Exit Date:</strong> {{ $pigLot->exit_date ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $pigLot->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $pigLot->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Pig Lot Page Loaded'); </script>
@stop