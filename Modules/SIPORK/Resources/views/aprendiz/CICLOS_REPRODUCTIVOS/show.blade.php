@extends('sipork::layouts.masterAprendiz')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-primary"><i class="fas fa-heart"></i> Reproductive Cycle Details #{{ $reproductiveCycle->id_cycle }}</h1>
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
                            <a href="{{ route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-heart"></i> Reproductive Cycles
                            </a>
                        </li>
                        <li class="breadcrumb-item active font-weight-bold text-secondary" aria-current="page">
                            <i class="fas fa-info-circle"></i> Cycle Details
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
                            <h3 class="card-title text-center w-100"><i class="fas fa-info-circle"></i> Reproductive Cycle Information</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <dl class="row">
                            <dt class="col-sm-4 font-weight-bold text-secondary">ID</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->id_cycle }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Sow</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->sow ? $reproductiveCycle->sow->id_pig : 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Service Date</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->service_date ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Birth Date</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->birth_date ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Live Piglets</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->live_piglets ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Dead Piglets</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->dead_piglets ?? 'N/A' }}</dd>
                            <dt class="col-sm-4 font-weight-bold text-secondary">Lactation End Date</dt>
                            <dd class="col-sm-8">{{ $reproductiveCycle->lactation_end_date ?? 'N/A' }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete(event) {
        event.preventDefault();
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡Esta acción no se puede deshacer!",
            imageUrl: "{{ asset('images/image.jpg') }}",
            imageWidth: 160,
            imageHeight: 150,
            customClass: {
                image: 'swal-image-custom'
            },
            imageAlt: 'Cycle Warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.submit();
            }
        });
    }

    document.querySelectorAll('form[onsubmit="return confirmDelete();"]').forEach(form => {
        form.onsubmit = function(event) {
            confirmDelete(event);
        };
    });
</script>

<style>
    .swal-image-custom {
        border-radius: 10px;
    }
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