@extends('sipork::layouts.masterAprendiz')

@section('title', 'Tools')

@section('content_header')
<h1>Tools</h1>
@stop

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Tools</h3>
                        <a href="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Add New Tool</a>
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
                        @if($tools->isEmpty())
                        <div class="alert alert-danger text-center">No tools registered yet.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tool Name</th>
                                        <th>Quantity</th>
                                        <th>Purchase Date</th>
                                        <th>Unit Cost</th>
                                        <th>Warehouse</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tools as $tool)
                                    <tr>
                                        <td>{{ $tool->id_tool }}</td>
                                        <td>{{ $tool->tool_name }}</td>
                                        <td>{{ $tool->quantity }}</td>
                                        <td>{{ $tool->purchase_date }}</td>
                                        <td>{{ $tool->unit_cost }}</td>
                                        <td>{{ $tool->warehouse->warehouse_name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.show', $tool->id_tool) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.edit', $tool->id_tool) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sipork.aprendiz.sipork.HERRAMIENTAS.destroy', $tool->id_tool) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                                {!! $tools->links('pagination::bootstrap-4') !!}
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
    console.log('Tools Page Loaded');
</script>
@stop
@endsection