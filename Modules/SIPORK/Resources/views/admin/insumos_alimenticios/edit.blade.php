@extends('sipork::layouts.master')

@section('title', 'Edit Supply Feeding')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Editar Insumo Alimenticio 
                    <small class="text-muted">#{{ $supplyFeeding->id_supply_feeding }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Insumos Alimenticios
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar Insumo Alimenticio
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
                            <i class="fas fa-edit"></i> Editar Detalles del Insumo Alimenticio
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.admin.sipork.insumos_alimenticios.update', $supplyFeeding->id_supply_feeding) }}">
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
                                <!-- Feeding Event -->
                                <div class="col-md-6 form-group">
                                    <label for="feeding_id" class="font-weight-bold">Evento de Alimentación <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-utensils"></i></span>
                                        </div>
                                        <select name="feeding_id" id="feeding_id" class="form-control @error('feeding_id') is-invalid @enderror" required>
                                            <option value="" disabled>Seleccionar Evento de Alimentación</option>
                                            @foreach ($feedings as $feeding)
                                                <option value="{{ $feeding->id_feeding }}" {{ old('feeding_id', $supplyFeeding->feeding_id) == $feeding->id_feeding ? 'selected' : '' }}>
                                                    {{ $feeding->id_feeding }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('feeding_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Supply -->
                                <div class="col-md-6 form-group">
                                    <label for="supply_id" class="font-weight-bold">Insumo <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-box"></i></span>
                                        </div>
                                        <select name="supply_id" id="supply_id" class="form-control @error('supply_id') is-invalid @enderror" required>
                                            <option value="" disabled>Seleccionar Insumo</option>
                                            @foreach ($supplies as $supply)
                                                <option value="{{ $supply->id_supply }}" {{ old('supply_id', $supplyFeeding->supply_id) == $supply->id_supply ? 'selected' : '' }}>
                                                    {{ $supply->id_supply }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('supply_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Quantity Used -->
                                <div class="col-md-6 form-group">
                                    <label for="quantity_used" class="font-weight-bold">Cantidad Usada <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-balance-scale"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="quantity_used" id="quantity_used" class="form-control @error('quantity_used') is-invalid @enderror" value="{{ old('quantity_used', $supplyFeeding->quantity_used) }}" required>
                                    </div>
                                    @error('quantity_used')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Usage Date -->
                                <div class="col-md-6 form-group">
                                    <label for="usage_date" class="font-weight-bold">Fecha de Uso <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date', $supplyFeeding->usage_date) }}" required>
                                    </div>
                                    @error('usage_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.index') }}" class="btn btn-secondary mr-2">
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
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
@stop

@section('js')
    <script>
        console.log('Edit Supply Feeding Page Loaded');
    </script>
@stop