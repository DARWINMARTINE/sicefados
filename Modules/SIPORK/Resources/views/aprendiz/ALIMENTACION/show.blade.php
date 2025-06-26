@extends('sipork::layouts.masterAprendiz')

@section('title', 'Feeding Event Details')

@section('content_header')
    <h1>Feeding Event Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $feeding->id_feeding }}</p>
            <p><strong>Pig:</strong> {{ $feeding->pig ? $feeding->pig->id_pig . ' (' . $feeding->pig->breed . ')' : 'N/A' }}</p>
            <p><strong>Lot:</strong> {{ $feeding->lot ? $feeding->lot->lot_name : 'N/A' }}</p>
            <p><strong>Diet:</strong> {{ $feeding->diet->diet_name }}</p>
            <p><strong>Feeding Date:</strong> {{ $feeding->feeding_date }}</p>
            <p><strong>Food Amount:</strong> {{ $feeding->food_amount }}</p>
            <p><strong>FCR:</strong> {{ $feeding->fcr ?? 'N/A' }}</p>
            <p><strong>Cost:</strong> {{ $feeding->cost->id_cost }}</p>
            <p><strong>Created At:</strong> {{ $feeding->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $feeding->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Feeding Event Page Loaded'); </script>
@stop