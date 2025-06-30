@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Lots')

@section('content_header')
<h1 class="text-center font-weight-bold mb-4">Lotes</h1>
@stop

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                <h4 class="mb-0"><i class="fas fa-layer-group mr-2"></i> Lista de Lotes</h4>
                <a href="{{ route('sipork.liderDeUnidad.sipork.Lotes.create') }}" class="btn btn-primary shadow-sm">
                    <i class="fas fa-plus mr-1"></i> Nuevo Lote
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-bordered rounded shadow-sm bg-white">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Nombre del Lote</th>
                            <th>Fecha de Creación</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lots as $lot)
                        <tr>
                            <td class="text-center align-middle">{{ $lot->id_lot }}</td>
                            <td class="align-middle">{{ $lot->lot_name }}</td>
                            <td class="align-middle">{{ $lot->creation_date }}</td>
                            <td class="text-center align-middle">
                                @if($lot->status == 1)
                                <span class="badge badge-success px-3 py-2">Activo</span>
                                @else
                                <span class="badge badge-secondary px-3 py-2">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center align-middle">
                                <a href="{{ route('sipork.liderDeUnidad.sipork.Lotes.show', $lot->id_lot) }}" class="text-info"
                                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('sipork.liderDeUnidad.sipork.Lotes.edit', $lot->id_lot) }}" class="text-warning"
                                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('sipork.liderDeUnidad.sipork.Lotes.destroy', $lot->id_lot) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" style="border: none; background: none; font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: red;"
                                        onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkred';"
                                        onmouseout="this.style.transform='scale(1)'; this.style.color='red';"
                                        onclick="confirmDelete(this.form)">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>

                                <script>
                                    function confirmDelete(form) {
                                        Swal.fire({
                                            title: '¿Estás seguro?',
                                            text: "Esta acción no se puede deshacer.",
                                            imageUrl: "{{ asset('images/advertencia.jpg') }}",
                                            imageWidth: 160, // Increased width
                                            imageHeight: 150, // Increased height
                                            customClass: {
                                                image: 'swal-image-custom' // Add a custom class for styling
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
                                <style>
                                    .swal-image-custom {
                                        border-radius: 10px;
                                        /* Add border radius to the image */
                                    }
                                </style>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .table thead th {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: #fff;
        border: none;
        vertical-align: middle;
    }

    .table td,
    .table th {
        vertical-align: middle !important;
    }

    .badge-success {
        background: linear-gradient(90deg, #28a745, #218838);
        font-size: 1rem;
    }

    .badge-secondary {
        background: linear-gradient(90deg, #6c757d, #495057);
        font-size: 1rem;
    }

    .btn-info,
    .btn-warning,
    .btn-danger {
        box-shadow: 0 2px 6px #00000011;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .btn-info:hover,
    .btn-warning:hover,
    .btn-danger:hover {
        transform: scale(1.12);
        box-shadow: 0 4px 12px #00000022;
    }
</style>
@stop

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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