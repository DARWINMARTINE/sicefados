@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Biosecurity Measure Details')

@section('content_header')
<h1>Biosecurity Measure Details</h1>
@stop

@section('content')
<br><br><br>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-shield-virus"></i> Detalles de Medida #{{ $measure->id_biosecurity }}</h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right bg-white shadow-sm p-3 rounded">
                        <li class="breadcrumb-item">
                            <a href="" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-shield-alt"></i> Bioseguridad
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Detalles
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-lg" style="border-radius: 15px;">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center w-100"><i class="fas fa-info-circle"></i> Información de la Medida de Bioseguridad</h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $measure->id_biosecurity }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Tipo de Medida</dt>
                            <dd class="col-sm-8">{{ $measure->measure_type }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha de Implementación</dt>
                            <dd class="col-sm-8">{{ $measure->implementation_date }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Descripción</dt>
                            <dd class="col-sm-8">{{ $measure->description ?? 'N/A' }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Costo</dt>
                            <dd class="col-sm-8">{{ $measure->cost->cost_type ?? 'N/A' }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Lote</dt>
                            <dd class="col-sm-8">{{ $measure->lot->lot_name ?? 'N/A' }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha de Creación</dt>
                            <dd class="col-sm-8">{{ $measure->created_at }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Última Actualización</dt>
                            <dd class="col-sm-8">{{ $measure->updated_at }}</dd>
                        </dl>
                        <div class="mt-4">
                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .breadcrumb {
        background-color: #f8f9fa;
    }
    .breadcrumb-item a {
        text-decoration: none;
    }
    .swal-image-custom {
        border-radius: 10px;
    }
</style>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Show Biosecurity Measure Page Loaded');
</script>
@stop
