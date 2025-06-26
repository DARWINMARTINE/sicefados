@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Feeding Event')

@section('content_header')
    <h1>Add Feeding Event</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.ALIMENTACION.store') }}">
        @csrf

        <div class="form-group">
            <label for="pig_id">Cerdo</label>
            <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror">
                <option value="">Select Pig (Optional)</option>
                @foreach ($pigs as $pig)
                    <option value="{{ $pig->id_pig }}" {{ old('pig_id') == $pig->id_pig ? 'selected' : '' }}>
                        {{ $pig->id_pig }} ({{ $pig->breed }})
                    </option>
                @endforeach
            </select>
            @error('pig_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="lot_id">Lote</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror">
                <option value="">Select Lot (Optional)</option>
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

        <div class="form-group">
            <label for="diet_id">Dieta *</label>
            <select name="diet_id" id="diet_id" class="form-control @error('diet_id') is-invalid @enderror" required>
                <option value="">Select Diet</option>
                @foreach ($diets as $diet)
                    <option value="{{ $diet->id_diet }}" {{ old('diet_id') == $diet->id_diet ? 'selected' : '' }}>
                        {{ $diet->diet_name }}
                    </option>
                @endforeach
            </select>
            @error('diet_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="feeding_date">Fecha de alimentación *</label>
            <input type="date" name="feeding_date" id="feeding_date" class="form-control @error('feeding_date') is-invalid @enderror" value="{{ old('feeding_date') }}" required>
            @error('feeding_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="food_amount">Cantidad de alimento *</label>
            <input type="number" step="0.01" name="food_amount" id="food_amount" class="form-control @error('food_amount') is-invalid @enderror" value="{{ old('food_amount') }}" required>
            @error('food_amount')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="fcr">FCR</label>
            <input type="number" step="0.01" name="fcr" id="fcr" class="form-control @error('fcr') is-invalid @enderror" value="{{ old('fcr') }}">
            @error('fcr')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="cost_id">Costo *</label>
            <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror" required>
                <option value="">Select Cost</option>
                @foreach ($costs as $cost)
                    <option value="{{ $cost->id_cost }}" {{ old('cost_id') == $cost->id_cost ? 'selected' : '' }}>
                        {{ $cost->id_cost }}
                    </option>
                @endforeach
            </select>
            @error('cost_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Feeding Event Page Loaded'); </script>
@stop