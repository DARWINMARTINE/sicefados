@extends('sipork::layouts.master')

@section('title', 'Tool Usage')

@section('content_header')
<h1>Tool Usage</h1>
@stop

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Tool Usage</h3>
                        <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Add New Tool Usage</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
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
                        @if($toolUsages->isEmpty())
                        <div class="alert alert-danger text-center">No tool usage records yet.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
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
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {!! $toolUsages->links('pagination::bootstrap-4') !!}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Tool Usage Page Loaded');
</script>
@stop
@endsection