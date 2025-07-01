@extends('sipork::layouts.masterAprendiz')

@section('title', 'Pig Lot Assignment Details')

@section('content_header')
    <h1>Pig Lot Assignment Details</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-layer-group"></i> Pig Lot Assignment Details #{{ $pigLot->pig_id }}</h1>
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
                            <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-layer-group"></i> Assign Pigs to Lots
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Assignment Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Pig Lot Assignment Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">Pig ID</dt>
                            <dd class="col-sm-8">{{ $pigLot->pig_id }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Pig Breed</dt>
                            <dd class="col-sm-8">{{ $pig->breed }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Lot Name</dt>
                            <dd class="col-sm-8">{{ $lot->lot_name }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Entry Date</dt>
                            <dd class="col-sm-8">{{ $pigLot->entry_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Exit Date</dt>
                            <dd class="col-sm-8">{{ $pigLot->exit_date ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Created At</dt>
                            <dd class="col-sm-8">{{ $pigLot->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Updated At</dt>
                            <dd class="col-sm-8">{{ $pigLot->updated_at }}</dd>
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
    <script> console.log('Show Pig Lot Page Loaded'); </script>
@stop
@endsection