@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Edit Environmental Condition')

@section('content_header')
    <h1>Edit Environmental Condition</h1>
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

    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.update', $condition->id_condition) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_time">Date Time *</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control @error('date_time') is-invalid @enderror" value="{{ old('date_time', $condition->date_time->format('Y-m-d\TH:i')) }}" required>
            @error('date_time')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="temperature">Temperature</label>
            <input type="number" step="0.01" name="temperature" id="temperature" class="form-control @error('temperature') is-invalid @enderror" value="{{ old('temperature', $condition->temperature) }}">
            @error('temperature')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="humidity">Humidity</label>
            <input type="number" step="0.01" name="humidity" id="humidity" class="form-control @error('humidity') is-invalid @enderror" value="{{ old('humidity', $condition->humidity) }}">
            @error('humidity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="ventilation">Ventilation</label>
            <input type="text" name="ventilation" id="ventilation" class="form-control @error('ventilation') is-invalid @enderror" value="{{ old('ventilation', $condition->ventilation) }}">
            @error('ventilation')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="lot_id">Lot *</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                <option value="">Select Lot</option>
                @foreach ($lots as $lot)
                    <option value="{{ $lot->id_lot }}" {{ old('lot_id', $condition->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                        {{ $lot->lot_name }}
                    </option>
                @endforeach
            </select>
            @error('lot_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Environmental Condition Page Loaded'); </script>
@stop