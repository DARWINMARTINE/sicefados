@extends('sipork::layouts.master')

@section('title', 'Add Environmental Condition')

@section('content_header')
    <h1>Add Environmental Condition</h1>
@stop

@section('content')
    <br><br><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sipork.admin.sipork.condiciones_ambientales.store') }}">
        @csrf

        <div class="form-group">
            <label for="date_time">Fecha y hora *</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control @error('date_time') is-invalid @enderror" value="{{ old('date_time') }}" required>
            @error('date_time')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="temperature">Temperatura</label>
            <input type="number" step="0.01" name="temperature" id="temperature" class="form-control @error('temperature') is-invalid @enderror" value="{{ old('temperature') }}">
            @error('temperature')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="humidity">Humedad</label>
            <input type="number" step="0.01" name="humidity" id="humidity" class="form-control @error('humidity') is-invalid @enderror" value="{{ old('humidity') }}">
            @error('humidity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="ventilation">Ventilacion</label>
            <input type="text" name="ventilation" id="ventilation" class="form-control @error('ventilation') is-invalid @enderror" value="{{ old('ventilation') }}">
            @error('ventilation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="lot_id">Lote *</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                <option value="">Select Lot</option>
                @foreach ($lots as $lot)
                    <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                        {{ $lot->lot_name }}
                    </option>
                @endforeach
            </select>
            @error('lot_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('sipork.admin.sipork.condiciones_ambientales.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Environmental Condition Page Loaded'); </script>
@stop