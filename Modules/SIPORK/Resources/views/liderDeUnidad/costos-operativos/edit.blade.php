@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Editar Costo Operativo')

@section('content_header')
<h1>Editar Costo Operativo</h1>
@stop

@section('content')
<br><br><br>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-dollar-sign"></i> Editar Costo
                    <small class="text-muted">#{{ $operationalCost->id_cost }}</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded shadow-sm float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.costos-operativos.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-coins"></i> Costos
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar
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
                            <i class="fas fa-edit"></i> Editar Detalles del Costo Operativo
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.costos-operativos.update', $operationalCost->id_cost) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Tipo de Costo -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_type" class="font-weight-bold">Tipo de Costo <span class="text-danger">*</span></label>
                                    <input type="text" name="cost_type" id="cost_type" class="form-control @error('cost_type') is-invalid @enderror" value="{{ old('cost_type', $operationalCost->cost_type) }}" required>
                                    @error('cost_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Monto -->
                                <div class="col-md-6 form-group">
                                    <label for="amount" class="font-weight-bold">Monto <span class="text-danger">*</span></label>
                                    <input type="number" step="0.01" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $operationalCost->amount) }}" required>
                                    @error('amount')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_date" class="font-weight-bold">Fecha <span class="text-danger">*</span></label>
                                    <input type="date" name="cost_date" id="cost_date" class="form-control @error('cost_date') is-invalid @enderror" value="{{ old('cost_date', $operationalCost->cost_date) }}" required>
                                    @error('cost_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <label for="description" class="font-weight-bold">Descripción</label>
                                    <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $operationalCost->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.costos-operativos.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar costo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Edit Operational Cost Page Loaded');
</script>
@stop
