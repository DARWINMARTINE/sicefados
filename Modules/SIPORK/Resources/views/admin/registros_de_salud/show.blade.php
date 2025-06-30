@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-medkit"></i> Health Record Details #{{ $healthRecord->id_health }}</h1>
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
                            <a href="{{ route('sipork.admin.sipork.registros_de_salud.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-medkit"></i> Health Records
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Record Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Health Record Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $healthRecord->id_health }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Pig</dt>
                            <dd class="col-sm-8">{{ $healthRecord->pig ? $healthRecord->pig->id_pig : 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Record Type</dt>
                            <dd class="col-sm-8">{{ $healthRecord->record_type }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Description</dt>
                            <dd class="col-sm-8">{{ $healthRecord->description ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Application Date</dt>
                            <dd class="col-sm-8">{{ $healthRecord->application_date }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Cost</dt>
                            <dd class="col-sm-8">{{ $healthRecord->cost ? $healthRecord->cost->amount : 'N/A' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete(form) {
        if (confirm("Are you sure you want to delete this record?")) {
            form.submit();
        }
    }
</script>

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