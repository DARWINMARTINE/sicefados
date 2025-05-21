@extends('sipork::layouts.master')

@section('title', 'Sanitary Outbreak Details')

@section('content_header')
    <h1>Sanitary Outbreak Details</h1>
@stop

@section('content')
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $sanitaryOutbreak->id_outbreak }}</p>
            <p><strong>Lot:</strong> {{ $sanitaryOutbreak->lot->lot_name }}</p>
            <p><strong>Disease:</strong> {{ $sanitaryOutbreak->disease }}</p>
            <p><strong>Start Date:</strong> {{ $sanitaryOutbreak->start_date }}</p>
            <p><strong>End Date:</strong> {{ $sanitaryOutbreak->end_date ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $sanitaryOutbreak->description ?? 'N/A' }}</p>
            <p><strong>Created At:</strong> {{ $sanitaryOutbreak->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $sanitaryOutbreak->updated_at }}</p>
        </div>
    </div>
    <a href="{{ route('sipork.admin.sipork.brotes_sanitarios.index') }}" class="btn btn-secondary">Back</a>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Sanitary Outbreak Page Loaded'); </script>
@stop