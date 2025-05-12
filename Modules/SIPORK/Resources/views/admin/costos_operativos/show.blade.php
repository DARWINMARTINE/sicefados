@extends('sipork::layouts.master')

@section('content_header')
    <h1>Operational Cost Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $operationalCost->id_cost }}</p>
            <p><strong>Cost Type:</strong> {{ $operationalCost->cost_type }}</p>
            <p><strong>Amount:</strong> {{ number_format($operationalCost->amount, 2) }} {{ config('app.currency', 'USD') }}</p>
            <p><strong>Cost Date:</strong> {{ $operationalCost->cost_date }}</p>
            <p><strong>Description:</strong> {{ $operationalCost->description ?? 'No description provided' }}</p>
            <p><strong>Created At:</strong> {{ $operationalCost->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $operationalCost->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.costos_operativos.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Show Operational Cost Page Loaded');
    </script>
@stop