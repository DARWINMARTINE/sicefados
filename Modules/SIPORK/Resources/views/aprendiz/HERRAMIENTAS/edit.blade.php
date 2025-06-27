@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Tool')

@section('content_header')
    <h1>Edit Tool</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.update', $tool->id_tool) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tool_name">Tool Name *</label>
            <input type="text" name="tool_name" id="tool_name" class="form-control @error('tool_name') is-invalid @enderror" value="{{ old('tool_name', $tool->tool_name) }}" required>
            @error('tool_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="quantity">Quantity *</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $tool->quantity) }}" required>
            @error('quantity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="purchase_date">Purchase Date *</label>
            <input type="date" name="purchase_date" id="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror" value="{{ old('purchase_date', $tool->purchase_date) }}" required>
            @error('purchase_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="unit_cost">Unit Cost *</label>
            <input type="number" step="0.01" name="unit_cost" id="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror" value="{{ old('unit_cost', $tool->unit_cost) }}" required>
            @error('unit_cost')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="warehouse_id">Warehouse *</label>
            <select name="warehouse_id" id="warehouse_id" class="form-control @error('warehouse_id') is-invalid @enderror" required>
                <option value="">Select Warehouse</option>
                @foreach ($warehouses as $warehouse)
                    <option value="{{ $warehouse->id_warehouse }}" {{ old('warehouse_id', $tool->warehouse_id) == $warehouse->id_warehouse ? 'selected' : '' }}>
                        {{ $warehouse->warehouse_name }}
                    </option>
                @endforeach
            </select>
            @error('warehouse_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Tool Page Loaded'); </script>
@stop