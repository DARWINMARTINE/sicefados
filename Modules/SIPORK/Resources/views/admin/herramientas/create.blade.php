@extends('sipork::layouts.master')

@section('title', 'Add Tool')

@section('content_header')
    <h1>Add Tool</h1>
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

    <form method="POST" action="{{ route('sipork.admin.sipork.herramientas.store') }}">
        @csrf

        <div class="form-group">
            <label for="tool_name">Nombre de la herramienta *</label>
            <input type="text" name="tool_name" id="tool_name" class="form-control @error('tool_name') is-invalid @enderror" value="{{ old('tool_name') }}" required>
            @error('tool_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Cantidad *</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}" required>
            @error('quantity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="purchase_date">Fecha de compra *</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date') }}" required>
            @error('purchase_date')
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
            <label for="warehouse_id">Almacen *</label>
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
        <a href="{{ route('sipork.admin.sipork.herramientas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Tool Page Loaded'); </script>
@stop