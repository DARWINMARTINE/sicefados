@extends('sipork::layouts.master')

@section('title', 'Diet Details')

@section('content_header')
    <h1>Diet Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $diet->id_diet }}</p>
            <p><strong>Diet Name:</strong> {{ $diet->diet_name }}</p>
            <p><strong>Min Age:</strong> {{ $diet->min_age ?? 'N/A' }}</p>
            <p><strong>Max Age:</strong> {{ $diet->max_age ?? 'N/A' }}</p>
            <p><strong>Min Weight:</strong> {{ $diet->min_weight ?? 'N/A' }}</p>
            <p><strong>Max Weight:</strong> {{ $diet->max_weight ?? 'N/A' }}</p>
            <p><strong>Physiological State:</strong> {{ $diet->physiological_state ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $diet->description ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $diet->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $diet->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.dietas.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Diet Page Loaded'); </script>
@stop