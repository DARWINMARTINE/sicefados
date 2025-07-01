@extends('sipork::layouts.master')

@section('title', 'Supply Feeding Details')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-utensils"></i> Detalles del Insumo Alimenticio #{{ $supplyFeeding->id_supply_feeding }}</h1>
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
                            <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Insumos Alimenticios
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Detalles del Insumo Alimenticio
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Información del Insumo Alimenticio</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->id_supply_feeding }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Evento de Alimentación</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->feeding->id_feeding }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Insumo</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->supply->id_supply }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Cantidad Usada</dt>
                            <dd class="col-sm-8">{{ number_format($supplyFeeding->quantity_used, 2) }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Fecha de Uso</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->usage_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Creado en</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Actualizado en</dt>
                            <dd class="col-sm-8">{{ $supplyFeeding->updated_at }}</dd>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
@stop

@section('js')
    <script>
        console.log('Show Supply Feeding Page Loaded');
    </script>
@stop