@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Supply')

@section('content_header')
    <h1>Add Supply</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.SUMINISTROS.store') }}">
        @csrf

        <div class="form-group">
            <label for="supply_name">Nombre del suministro *</label>
            <input type="text" name="supply_name" id="supply_name" class="form-control @error('supply_name') is-invalid @enderror" value="{{ old('supply_name') }}" required>
            @error('supply_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="supply_type">Tipo de suministro *</label>
            <input type="text" name="supply_type" id="supply_type" class="form-control @error('supply_type') is-invalid @enderror" value="{{ old('supply_type') }}" required>
            @error('supply_type')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad *</label>
            <input type="number" step="0.01" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" required>
            @error('quantity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="unit_cost">Costo unitario *</label>
            <input type="number" step="0.01" name="unit_cost" id="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror" value="{{ old('unit_cost') }}" required>
            @error('unit_cost')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="entry_date">Fecha de entrada *</label>
            <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date') }}" required>
            @error('entry_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="warehouse_id">Almacén *</label>
            <select name="warehouse_id" id="warehouse_id" class="form-control @error('warehouse_id') is-invalid @enderror" required>
                <option value="">Select Warehouse</option>
                @foreach ($warehouses as $warehouse)
                    <option value="{{ $warehouse->id_warehouse }}" {{ old('warehouse_id') == $warehouse->id_warehouse ? 'selected' : '' }}>
                        {{ $warehouse->warehouse_name }}
                    </option>
                @endforeach
            </select>
            @error('warehouse_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('sipork.aprendiz.sipork.SUMINISTROS.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Supply Page Loaded'); </script>
@stop