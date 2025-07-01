@extends('sipork::layouts.masterAprendiz')

@section('title', 'Feeding Events')

@section('content_header')
<h1>Feeding Events</h1>
@stop

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Feeding Events</h3>
                        <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Add New Feeding Event</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: "{{ session('success') }}",
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                        @endif
                        @if($feedings->isEmpty())
                        <div class="alert alert-danger text-center">No feeding events yet.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cerdo</th>
                                        <th>Lote</th>
                                        <th>Dieta</th>
                                        <th>Fecha de alimentación</th>
                                        <th>Cantidad de alimentos</th>
                                        <th>FCR-(Índice de Conversión Alimenticia)</th>
                                        <th>Costo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedings as $feeding)
                                    <tr>
                                        <td>{{ $feeding->id_feeding }}</td>
                                        <td>{{ $feeding->pig ? $feeding->pig->id_pig . ' (' . $feeding->pig->breed . ')' : 'N/A' }}</td>
                                        <td>{{ $feeding->lot ? $feeding->lot->lot_name : 'N/A' }}</td>
                                        <td>{{ $feeding->diet->diet_name }}</td>
                                        <td>{{ $feeding->feeding_date }}</td>
                                        <td>{{ $feeding->food_amount }}</td>
                                        <td>{{ $feeding->fcr ?? 'N/A' }}</td>
                                        <td>{{ $feeding->cost ? $feeding->cost->description : 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.show', $feeding->id_feeding) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.aprendiz.sipork.ALIMENTACION.edit', $feeding->id_feeding) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sipork.aprendiz.sipork.ALIMENTACION.destroy', $feeding->id_feeding) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                                {!! $feedings->links('pagination::bootstrap-4') !!}
                            </div>
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

<style>
    .swal-image-custom {
        border-radius: 10px;
    }
</style>

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Feeding Events Page Loaded');
</script>
@stop
@endsection