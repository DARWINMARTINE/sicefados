@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Biosecurity Measures')

@section('content_header')
    <h1 class="text-center">Medidas de Bioseguridad</h1>
@stop

@section('content')
<br><br><br>

<style>
    .card-custom {
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card-header-custom {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
        padding: 1.2rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .btn-sm {
        border-radius: 8px;
        transition: all 0.3s ease;
        padding: 0.4rem 1rem;
        font-size: 0.875rem;
    }

    .table th,
    .table td {
        vertical-align: middle;
        text-align: center;
    }

    .swal-image-custom {
        border-radius: 10px;
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card card-custom animate__animated animate__fadeIn">
                    <div class="card-header card-header-custom">
                        <h3 class="card-title text-center flex-grow-1 mb-0">Listado de Medidas de Bioseguridad</h3>
                        <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.create') }}" class="btn btn-success btn-sm text-white">
                            <i class="fas fa-plus"></i> Agregar Nueva Medida
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Éxito',
                                text: "{{ session('success') }}",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                        @endif

                        @if($measures->isEmpty())
                        <div class="alert alert-danger text-center">No hay medidas registradas aún.</div>
                        @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo de Medida</th>
                                        <th>Fecha de Implementación</th>
                                        <th>Descripción</th>
                                        <th>Costo</th>
                                        <th>Lote</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($measures as $measure)
                                    <tr>
                                        <td>{{ $measure->id_biosecurity }}</td>
                                        <td>{{ $measure->measure_type }}</td>
                                        <td>{{ $measure->implementation_date }}</td>
                                        <td>{{ $measure->description ?? 'N/A' }}</td>
                                        <td>{{ $measure->cost->cost_type ?? 'N/A' }}</td>
                                        <td>{{ $measure->lot->lot_name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.show', $measure->id_biosecurity) }}" class="text-info mx-1"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.edit', $measure->id_biosecurity) }}" class="text-warning mx-1"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <form action="{{ route('sipork.liderDeUnidad.sipork.medidas-de-bioseguridad.destroy', $measure->id_biosecurity) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    style="border: none; background: none; font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: red;"
                                                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkred';"
                                                    onmouseout="this.style.transform='scale(1)'; this.style.color='red';"
                                                    onclick="confirmDelete(this.form)">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function confirmDelete(form) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            imageUrl: "{{ asset('images/advertencia.jpg') }}",
            imageWidth: 160,
            imageHeight: 150,
            customClass: {
                image: 'swal-image-custom'
            },
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    }
</script>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Biosecurity Measures Page Loaded');
</script>
@stop
