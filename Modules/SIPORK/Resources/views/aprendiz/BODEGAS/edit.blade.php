@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Warehouse')

@section('content_header')
    <h1>Edit Warehouse</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.BODEGAS.update', $warehouse->id_warehouse) }}
">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="warehouse_name">Warehouse Name *</label>
            <input type="text" name="warehouse_name" id="warehouse_name" class="form-control @error('warehouse_name') is-invalid @enderror" value="{{ old('warehouse_name', $warehouse->warehouse_name) }}" required>
            @error('warehouse_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="location">Location *</label>
            <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $warehouse->location) }}" required>
            @error('location')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="capacity">Capacity *</label>
            <input type="number" step="0.01" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $warehouse->capacity) }}" required>
            @error('capacity')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Warehouse Page Loaded'); </script>
@stop