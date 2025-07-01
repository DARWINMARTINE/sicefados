@extends('sipork::layouts.masterAprendiz')

@section('title', 'Supplies Feeding')

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Todos los Insumos Alimenticios</h3>
                        <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Añadir Nuevo Suministro</a>
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
                        @if($suppliesFeeding->isEmpty())
                        <div class="alert alert-danger text-center">No hay insumos alimenticios registrados aún.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Evento de Alimentación</th>
                                        <th>Insumo</th>
                                        <th>Cantidad Usada</th>
                                        <th>Fecha de Uso</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliesFeeding as $supplyFeeding)
                                    <tr>
                                        <td class="text-center">{{ $supplyFeeding->id_supply_feeding }}</td>
                                        <td>{{ $supplyFeeding->feeding->id_feeding }}</td>
                                        <td>{{ $supplyFeeding->supply->id_supply }}</td>
                                        <td>{{ number_format($supplyFeeding->quantity_used, 2) }}</td>
                                        <td>{{ $supplyFeeding->usage_date }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.show', $supplyFeeding->id_supply_feeding) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.edit', $supplyFeeding->id_supply_feeding) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sipork.aprendiz.sipork.INSUMOS_ALIMENTICIOS.destroy', $supplyFeeding->id_supply_feeding) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                                {!! $suppliesFeeding->links('pagination::bootstrap-4') !!}
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
    .table-responsive {
        overflow-x: auto;
    }
    .table {
        border-radius: 8px;
        overflow: hidden;
    }
    .table thead th {
        background-color: #343a40;
        border-color: #454d55;
        color: white;
        font-weight: 600;
        text-align: center;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }
    .alert-success {
        border-left: 4px solid #28a745;
        border-radius: 8px;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('Supplies Feeding Page Loaded');
    </script>
@stop