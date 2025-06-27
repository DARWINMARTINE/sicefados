@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Supply Feeding')

@section('content_header')
    <h1>Add Supply Feeding</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.store') }}">
        @csrf

        <div class="form-group">
            <label for="feeding_id">Feeding Event *</label>
            <select name="feeding_id" id="feeding_id" class="form-control @error('feeding_id') is-invalid @enderror" required>
                <option value="">Select Feeding Event</option>
                @foreach ($feedings as $feeding)
                    <option value="{{ $feeding->id_feeding }}" {{ old('feeding_id') == $feeding->id_feeding ? 'selected' : '' }}>
                        {{ $feeding->id_feeding }}
                    </option>
                @endforeach
            </select>
            @error('feeding_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="supply_id">Supply *</label>
            <select name="supply_id" id="supply_id" class="form-control @error('supply_id') is-invalid @enderror" required>
                <option value="">Select Supply</option>
                @foreach ($supplies as $supply)
                    <option value="{{ $supply->id_supply }}" {{ old('supply_id') == $supply->id_supply ? 'selected' : '' }}>
                        {{ $supply->id_supply }}
                    </option>
                @endforeach
            </select>
            @error('supply_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity_used">Quantity Used *</label>
            <input type="number" step="0.01" name="quantity_used" id="quantity_used" class="form-control @error('quantity_used') is-invalid @enderror" value="{{ old('quantity_used') }}" required>
            @error('quantity_used')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_date">Usage Date *</label>
            <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date') }}" required>
            @error('usage_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
        <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Supply Feeding Page Loaded'); </script>
@stop