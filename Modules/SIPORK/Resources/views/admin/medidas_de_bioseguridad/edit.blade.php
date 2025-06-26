@extends('sipork::layouts.master')

@section('title', 'Edit Biosecurity Measure')

@section('content_header')
<h1>Edit Biosecurity Measure</h1>
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

<form method="POST" action="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.update', $measure->id_biosecurity) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="measure_type">Measure Type *</label>
        <input type="text" name="measure_type" id="measure_type" class="form-control @error('measure_type') is-invalid @enderror" value="{{ old('measure_type', $measure->measure_type) }}" required>
        @error('measure_type')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="implementation_date">Implementation Date *</label>
        <input type="date" name="implementation_date" id="implementation_date" class="form-control @error('implementation_date') is-invalid @enderror" value="{{ old('implementation_date', $measure->implementation_date) }}" required>
        @error('implementation_date')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $measure->description) }}</textarea>
        @error('description')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="cost_id">Costo</label>
        <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror">
            <option value="">Select Cost</option>
            @foreach ($costs as $cost)
            <option value="{{ $cost->id_cost }}" {{ old('cost_id', $measure->cost_id) == $cost->id_cost ? 'selected' : '' }}>
                {{ $cost->id_cost }} ({{ $cost->cost_type }} - {{ $cost->amount }})
            </option>
            @endforeach
        </select>
        @error('cost_id')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="lot_id">Lot *</label>
        <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
            <option value="">Select Lot</option>
            @foreach ($lots as $lot)
            <option value="{{ $lot->id_lot }}" {{ old('lot_id', $measure->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                {{ $lot->lot_name }}
            </option>
            @endforeach
        </select>
        @error('lot_id')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Edit Biosecurity Measure Page Loaded');
</script>
@stop