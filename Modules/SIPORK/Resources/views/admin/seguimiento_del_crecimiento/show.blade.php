@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-chart-line"></i> Growth Tracking Details #{{ $growthTracking->id_tracking }}</h1>
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
                            <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-chart-line"></i> Growth Tracking
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Tracking Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Growth Tracking Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $growthTracking->id_tracking }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Pig</dt>
                            <dd class="col-sm-8">{{ $growthTracking->pig ? $growthTracking->pig->id_pig : 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Measurement Date</dt>
                            <dd class="col-sm-8">{{ $growthTracking->measurement_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Weight</dt>
                            <dd class="col-sm-8">{{ $growthTracking->weight }} kg</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Observations</dt>
                            <dd class="col-sm-8">{{ $growthTracking->observations ?? 'N/A' }}</dd>
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