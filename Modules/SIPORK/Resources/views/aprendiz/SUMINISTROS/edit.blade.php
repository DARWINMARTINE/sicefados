@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Supply')

@section('content_header')
    <h1>Edit Supply</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Supply
                    <small class="text-muted">#{{ $supply->id_supply }}</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded shadow-sm float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.aprendiz.sipork.SUMINISTROS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-box-open"></i> Supplies
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Supply
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="font-weight-bold m-0">
                            <i class="fas fa-edit"></i> Edit Supply Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.SUMINISTROS.update', $supply->id_supply) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <!-- Supply Name -->
                                <div class="col-md-6 form-group">
                                    <label for="supply_name" class="font-weight-bold">Nombre del suministro <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-box-open"></i></span>
                                        </div>
                                        <input type="text" name="supply_name" id="supply_name" class="form-control @error('supply_name') is-invalid @enderror" value="{{ old('supply_name', $supply->supply_name) }}" required>
                                    </div>
                                    @error('supply_name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Supply Type -->
                                <div class="col-md-6 form-group">
                                    <label for="supply_type" class="font-weight-bold">Tipo de suministro <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-cubes"></i></span>
                                        </div>
                                        <input type="text" name="supply_type" id="supply_type" class="form-control @error('supply_type') is-invalid @enderror" value="{{ old('supply_type', $supply->supply_type) }}" required>
                                    </div>
                                    @error('supply_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity -->
                                <div class="col-md-6 form-group">
                                    <label for="quantity" class="font-weight-bold">Cantidad <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-sort-numeric-up"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity', $supply->quantity) }}" required>
                                    </div>
                                    @error('quantity')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Unit Cost -->
                                <div class="col-md-6 form-group">
                                    <label for="unit_cost" class="font-weight-bold">Costo unitario <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="unit_cost" id="unit_cost" class="form-control @error('unit_cost') is-invalid @enderror" value="{{ old('unit_cost', $supply->unit_cost) }}" required>
                                    </div>
                                    @error('unit_cost')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Entry Date -->
                                <div class="col-md-6 form-group">
                                    <label for="entry_date" class="font-weight-bold">Fecha de entrada <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date', $supply->entry_date) }}" required>
                                    </div>
                                    @error('entry_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Warehouse -->
                                <div class="col-md-6 form-group">
                                    <label for="warehouse_id" class="font-weight-bold">Almacén <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-warehouse"></i></span>
                                        </div>
                                        <select name="warehouse_id" id="warehouse_id" class="form-control @error('warehouse_id') is-invalid @enderror" required>
                                            <option value="">Select Warehouse</option>
                                            @foreach ($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id_warehouse }}" {{ old('warehouse_id', $supply->warehouse_id) == $warehouse->id_warehouse ? 'selected' : '' }}>
                                                    {{ $warehouse->warehouse_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('warehouse_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.SUMINISTROS.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Supply Page Loaded'); </script>
@stop
@endsection