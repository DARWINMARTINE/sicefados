@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Growth Tracking List</h3>
                        <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Create New</a>
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
                        @if($growthTrackings->isEmpty())
                        <div class="alert alert-danger text-center">No growth tracking records yet.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Pig</th>
                                        <th>Measurement Date</th>
                                        <th>Weight</th>
                                        <th>Observations</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($growthTrackings as $tracking)
                                    <tr>
                                        <td>{{ $tracking->id_tracking }}</td>
                                        <td>{{ $tracking->pig ? $tracking->pig->id_pig : 'N/A' }}</td>
                                        <td>{{ $tracking->measurement_date }}</td>
                                        <td>{{ $tracking->weight }} kg</td>
                                        <td>{{ $tracking->observations ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.show', $tracking->id_tracking) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.edit', $tracking->id_tracking) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.chart', $tracking->pig ? $tracking->pig->id_pig : 0) }}"
                                                class="text-success"
                                                style="font-size: 1.5rem; margin-left: 5px;"
                                                title="Ver gráfica de crecimiento">
                                                <i class="fas fa-chart-line"></i>
                                            </a>
                                            <form action="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.destroy', $tracking->id_tracking) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                                {!! $growthTrackings->links('pagination::bootstrap-4') !!}
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
@endsection