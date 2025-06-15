@extends('sipork::layouts.master')

@section('title', 'Tool Usage Details')

@section('content_header')
    <h1>Tool Usage Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $toolUsage->id_tool_pig }}</p>
            <p><strong>Tool:</strong> {{ $toolUsage->tool->tool_name ?? 'N/A' }}</p>
            <p><strong>Pig:</strong> {{ $toolUsage->pig->id_pig ?? 'N/A' }}</p>
            <p><strong>Usage Date:</strong> {{ $toolUsage->usage_date }}</p>
            <p><strong>Task Description:</strong> {{ $toolUsage->task_description ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $toolUsage->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $toolUsage->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Tool Usage Page Loaded'); </script>
@stop