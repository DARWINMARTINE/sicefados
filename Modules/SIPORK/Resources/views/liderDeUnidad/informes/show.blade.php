@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Detalles del Reporte')

@section('content_header')
<h1>Detalles del Reporte</h1>
@stop

@section('content')
<br><br><br>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary">
                    <i class="fas fa-file-alt"></i> Detalles del Reporte #{{ $report->id_report }}
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb float-sm-right bg-white shadow-sm p-3 rounded">
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
                        <h3 class="card-title mb-0 text-center w-100">
                            <i class="fas fa-info-circle"></i> Información del Reporte
                        </h3>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $report->id_report }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Tipo de Reporte</dt>
                            <dd class="col-sm-8">{{ $report->report_type }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha del Reporte</dt>
                            <dd class="col-sm-8">{{ $report->report_date }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Descripción</dt>
                            <dd class="col-sm-8">{{ $report->description ?? 'N/A' }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Lote</dt>
                            <dd class="col-sm-8">{{ $report->lot ? $report->lot->lot_name : 'N/A' }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha de Creación</dt>
                            <dd class="col-sm-8">{{ $report->created_at }}</dd>

                            <dt class="col-sm-4 font-weight-bold text-secondary">Última Actualización</dt>
                            <dd class="col-sm-8">{{ $report->updated_at }}</dd>
                        </dl>
                    </div>
                   
                        </a>
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
</style>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Show Report Page Loaded');
</script>
@stop
