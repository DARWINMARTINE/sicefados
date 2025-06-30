@extends('sipork::layouts.master')

@section('title', 'Biosecurity Measures')

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Medidas de Bioseguridad</h3>
                        <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Agregar Nueva Medida</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
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
                        <div class="alert alert-danger text-center">No hay medidas de bioseguridad registradas aún.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo de medida</th>
                                        <th>Fecha de implementación</th>
                                        <th>Descripción</th>
                                        <th>Costo</th>
                                        <th>Lote</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($measures as $measure)
                                    <tr>
                                        <td>{{ $measure->id_biosecurity }}</td>
                                        <td>{{ $measure->measure_type }}</td>
                                        <td>{{ $measure->implementation_date }}</td>
                                        <td>{{ $measure->description ?? 'N/A' }}</td>
                                        <td>
                                            @if($measure->cost)
                                                {{ $measure->cost->id_cost }} ({{ $measure->cost->cost_type }} - {{ $measure->cost->amount }})
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $measure->lot->lot_name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.show', $measure->id_biosecurity) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.edit', $measure->id_biosecurity) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sipork.admin.sipork.medidas_de_bioseguridad.destroy', $measure->id_biosecurity) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" style="border: none; background: none; font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: red;"
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
                            <div class="d-flex justify-content-center mt-4">
                                {!! $measures->links('pagination::bootstrap-4') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .swal-image-custom {
        border-radius: 10px;
    }
</style>

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
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Biosecurity Measures Page Loaded');
    </script>
@stop