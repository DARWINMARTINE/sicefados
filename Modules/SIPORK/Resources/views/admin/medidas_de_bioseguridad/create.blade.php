@extends('sipork::layouts.master')

@section('title', 'Add Biosecurity Measure')

@section('content_header')
<h1>Add Biosecurity Measure</h1>
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

<form method="POST" action="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.store') }}">
    @csrf

    <div class="form-group">
        <label for="measure_type">Tipo de medida *</label>
        <input type="text" name="measure_type" id="measure_type" class="form-control @error('measure_type') is-invalid @enderror" value="{{ old('measure_type') }}" required>
        @error('measure_type')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="implementation_date">Fecha de implementación *</label>
        <input type="date" name="implementation_date" id="implementation_date" class="form-control @error('implementation_date') is-invalid @enderror" value="{{ old('implementation_date') }}" required>
        @error('implementation_date')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="cost_id">Costo</label>
        <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror">
            <option value="">Select Cost</option>
            @foreach ($costs as $cost)
            <option value="{{ $cost->id_cost }}" {{ old('cost_id') == $cost->id_cost ? 'selected' : '' }}>
                {{ $cost->id_cost }} ({{ $cost->cost_type }} - {{ $cost->amount }})
            </option>
            @endforeach
        </select>
        @error('cost_id')
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
    <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Create Biosecurity Measure Page Loaded');
</script>
@stop