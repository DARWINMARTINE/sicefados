@extends('sipork::layouts.masterAprendiz')

@section('title', 'Feeding Event Details')

@section('content_header')
    <h1>Feeding Event Details</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-utensils"></i> Feeding Event Details #{{ $feeding->id_feeding }}</h1>
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
                            <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Feeding Events
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Feeding Event Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Feeding Event Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $feeding->id_feeding }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Pig</dt>
                            <dd class="col-sm-8">{{ $feeding->pig ? $feeding->pig->id_pig . ' (' . $feeding->pig->breed . ')' : 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Lot</dt>
                            <dd class="col-sm-8">{{ $feeding->lot ? $feeding->lot->lot_name : 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Diet</dt>
                            <dd class="col-sm-8">{{ $feeding->diet->diet_name }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Feeding Date</dt>
                            <dd class="col-sm-8">{{ $feeding->feeding_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Food Amount</dt>
                            <dd class="col-sm-8">{{ $feeding->food_amount }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">FCR</dt>
                            <dd class="col-sm-8">{{ $feeding->fcr ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Cost</dt>
                            <dd class="col-sm-8">{{ $feeding->cost->id_cost }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Created At</dt>
                            <dd class="col-sm-8">{{ $feeding->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Updated At</dt>
                            <dd class="col-sm-8">{{ $feeding->updated_at }}</dd>
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
    <script> console.log('Show Feeding Event Page Loaded'); </script>
@stop
@endsection