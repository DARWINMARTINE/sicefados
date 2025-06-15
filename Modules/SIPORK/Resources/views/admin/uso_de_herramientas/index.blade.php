@extends('sipork::layouts.master')

@section('title', 'Tool Usage')

@section('content_header')
<h1>Tool Usage</h1>
@stop

@section('content')
<br><br><br>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="{{ route('sipork.admin.sipork.uso_de_herramientas.create') }}" class="btn btn-primary mb-3">Add New Tool Usage</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tool</th>
            <th>Pig</th>
            <th>Usage Date</th>
            <th>Task Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($toolUsages as $toolUsage)
        <tr>
            <td>{{ $toolUsage->id_tool_pig }}</td>
            <td>{{ $toolUsage->tool->tool_name ?? 'N/A' }}</td>
            <td>{{ $toolUsage->pig->id_pig ?? 'N/A' }}</td>
            <td>{{ $toolUsage->usage_date }}</td>
            <td>{{ $toolUsage->task_description ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.show', $toolUsage->id_tool_pig) }}" class="text-info"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.edit', $toolUsage->id_tool_pig) }}" class="text-warning"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sipork.admin.sipork.uso_de_herramientas.destroy', $toolUsage->id_tool_pig) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
    console.log('Tool Usage Page Loaded');
</script>
@stop