@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Environmental Conditions')

@section('content_header')
<h1>Environmental Conditions</h1>
@stop

@section('content')
<br><br><br>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.create') }}" class="btn btn-primary mb-3">Add New Condition</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha y hora</th>
            <th>Temperatura</th>
            <th>Humedad</th>
            <th>Ventilacion</th>
            <th>Lote</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($conditions as $condition)
        <tr>
            <td>{{ $condition->id_condition }}</td>
            <td>{{ $condition->date_time }}</td>
            <td>{{ $condition->temperature ?? 'N/A' }}</td>
            <td>{{ $condition->humidity ?? 'N/A' }}</td>
            <td>{{ $condition->ventilation ?? 'N/A' }}</td>
            <td>{{ $condition->lot->lot_name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.show', $condition->id_condition) }}" class="text-info"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.edit', $condition->id_condition) }}" class="text-warning"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sipork.liderDeUnidad.sipork.condiciones-ambientales.destroy', $condition->id_condition) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
    console.log('Environmental Conditions Page Loaded');
</script>
@stop