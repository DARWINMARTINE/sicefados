@extends('sipork::layouts.master')

@section('title', 'Operational Cost Details')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-dollar-sign"></i> Detalles del Costo Operativo #{{ $operationalCost->id_cost }}</h1>
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
                            <a href="{{ route('sipork.admin.sipork.costos_operativos.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-dollar-sign"></i> Costos Operativos
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Detalles de Costo
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
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Información del Costo Operativo</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $operationalCost->id_cost }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Tipo de Costo</dt>
                            <dd class="col-sm-8">{{ $operationalCost->cost_type }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Monto</dt>
                            <dd class="col-sm-8">{{ number_format($operationalCost->amount, 2) }} {{ config('app.currency') }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha del Costo</dt>
                            <dd class="col-sm-8">{{ $operationalCost->cost_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Descripción</dt>
                            <dd class="col-sm-8">{{ $operationalCost->description ?? 'No description provided' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Creado en</dt>
                            <dd class="col-sm-8">{{ $operationalCost->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Actualizado en</dt>
                            <dd class="col-sm-8">{{ $operationalCost->updated_at }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .card {
        border-radius: 15px;
    }
    .breadcrumb {
        background-color: #f8f9fa;
    }
    .breadcrumb-item a {
        text-decoration: none;
    }
</style>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Show Operational Cost Page Loaded');
    </script>
@stop