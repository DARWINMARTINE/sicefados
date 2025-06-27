@extends('sipork::layouts.masterAprendiz')

@section('title', 'Diets')

@section('content_header')
<h1>Diets</h1>
@stop

@section('content')
<br><br><br>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('sipork.aprendiz.sipork.DIETAS.create') }}" class="btn btn-primary mb-3">Add New Diet</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de la dieta</th>
            <th>Edad mínima</th>
            <th>Edad máxima</th>
            <th>Min de peso</th>
            <th>Max de peso</th>
            <th>Estado fisiológico</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($diets as $diet)
        <tr>
            <td>{{ $diet->id_diet }}</td>
            <td>{{ $diet->diet_name }}</td>
            <td>{{ $diet->min_age ?? 'N/A' }}</td>
            <td>{{ $diet->max_age ?? 'N/A' }}</td>
            <td>{{ $diet->min_weight ?? 'N/A' }}</td>
            <td>{{ $diet->max_weight ?? 'N/A' }}</td>
            <td>{{ $diet->physiological_state ?? 'N/A' }}</td>
            <td>{{ $diet->description ?? 'Sin descripción' }}</td>
            <td>
                <a href="{{ route('sipork.aprendiz.sipork.DIETAS.show', $diet->id_diet) }}" class="text-info"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sipork.aprendiz.sipork.DIETAS.edit', $diet->id_diet) }}" class="text-warning"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sipork.aprendiz.sipork.DIETAS.destroy', $diet->id_diet) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Diets Page Loaded');
</script>
@stop