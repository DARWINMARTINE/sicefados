@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Editar Reporte')

@section('content_header')
<h1>Editar Reporte</h1>
@stop

@section('content')
<br><br><br>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-file-alt"></i> Editar Reporte 
                    <small class="text-muted">#{{ $report->id_report }}</small>
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
                            <a href="{{ route('sipork.liderDeUnidad.sipork.informes.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-list"></i> Reportes
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
                            <i class="fas fa-edit"></i> Editar Detalles del Reporte
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.informes.update', $report->id_report) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">

                                <!-- Tipo de reporte -->
                                <div class="col-md-6 form-group">
                                    <label for="report_type" class="font-weight-bold">Tipo de reporte <span class="text-danger">*</span></label>
                                    <input type="text" name="report_type" id="report_type" class="form-control @error('report_type') is-invalid @enderror" value="{{ old('report_type', $report->report_type) }}" required>
                                    @error('report_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha del informe -->
                                <div class="col-md-6 form-group">
                                    <label for="report_date" class="font-weight-bold">Fecha del informe <span class="text-danger">*</span></label>
                                    <input type="date" name="report_date" id="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date', $report->report_date) }}" required>
                                    @error('report_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-12 form-group">
                                    <label for="description" class="font-weight-bold">Descripción</label>
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $report->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lote -->
                                <div class="col-md-6 form-group">
                                    <label for="lot_id" class="font-weight-bold">Lote</label>
                                    <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror">
                                        <option value="">Seleccionar lote (opcional)</option>
                                        @foreach ($lots as $lot)
                                            <option value="{{ $lot->id_lot }}" {{ old('lot_id', $report->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                                {{ $lot->lot_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.informes.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar reporte
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
    console.log('Edit Report Page Loaded');
</script>
@stop
