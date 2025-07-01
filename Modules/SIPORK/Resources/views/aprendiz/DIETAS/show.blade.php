@extends('sipork::layouts.masterAprendiz')

@section('title', 'Diet Details')

@section('content_header')
    <h1>Diet Details</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-utensils"></i> Diet Details #{{ $diet->id_diet }}</h1>
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
                            <a href="{{ route('sipork.aprendiz.sipork.DIETAS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Diets
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Diet Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Diet Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $diet->id_diet }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Diet Name</dt>
                            <dd class="col-sm-8">{{ $diet->diet_name }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Min Age</dt>
                            <dd class="col-sm-8">{{ $diet->min_age ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Max Age</dt>
                            <dd class="col-sm-8">{{ $diet->max_age ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Min Weight</dt>
                            <dd class="col-sm-8">{{ $diet->min_weight ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Max Weight</dt>
                            <dd class="col-sm-8">{{ $diet->max_weight ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Physiological State</dt>
                            <dd class="col-sm-8">{{ $diet->physiological_state ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Description</dt>
                            <dd class="col-sm-8">{{ $diet->description ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Created At</dt>
                            <dd class="col-sm-8">{{ $diet->created_at }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Updated At</dt>
                            <dd class="col-sm-8">{{ $diet->updated_at }}</dd>
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
    <script> console.log('Show Diet Page Loaded'); </script>
@stop
@endsection