@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Growth Tracking
                    <a href="" class="btn btn-primary btn-sm float-right">Create New</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
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
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection