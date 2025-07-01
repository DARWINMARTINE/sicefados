@extends('sipork::layouts.masterAprendiz')

@section('title', 'Lot Details')

@section('content_header')
    <h1>Lot Details</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-layer-group"></i> Lot Details #{{ $lot->id_lot }}</h1>
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
                            <a href="{{ route('sipork.aprendiz.sipork.LOTES.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-layer-group"></i> Lots
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Lot Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Lot Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $lot->id_lot }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Lot Name</dt>
                            <dd class="col-sm-8">{{ $lot->lot_name }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Creation Date</dt>
                            <dd class="col-sm-8">{{ $lot->creation_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Status</dt>
                            <dd class="col-sm-8">{{ $lot->status == 1 ? 'Activo' : 'Inactivo' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Created At</dt>
                            <dd class="col-sm-8">{{ $lot->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Updated At</dt>
                            <dd class="col-sm-8">{{ $lot->updated_at }}</dd>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Show Lot Page Loaded'); </script>
@stop
@endsection