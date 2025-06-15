@extends('sipork::layouts.master')

@section('title', 'Supplies Feeding')

@section('content_header')
    <h1>Supplies Feeding</h1>
@stop

@section('content')
    <br><br><br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.create') }}" class="btn btn-primary mb-3">Añadir nuevo suministro </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Feeding Event</th>
                <th>Supply</th>
                <th>Quantity Used</th>
                <th>Usage Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliesFeeding as $supplyFeeding)
                <tr>
                    <td>{{ $supplyFeeding->id_supply_feeding }}</td>
                    <td>{{ $supplyFeeding->feeding->id_feeding }}</td>
                    <td>{{ $supplyFeeding->supply->id_supply }}</td>
                    <td>{{ $supplyFeeding->quantity_used }}</td>
                    <td>{{ $supplyFeeding->usage_date }}</td>
                    <td>
                        <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.show', $supplyFeeding->id_supply_feeding) }}" class="text-info"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sipork.admin.sipork.insumos_alimenticios.edit', $supplyFeeding->id_supply_feeding) }}" class="text-warning"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sipork.admin.sipork.insumos_alimenticios.destroy', $supplyFeeding->id_supply_feeding) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
    <script> console.log('Supplies Feeding Page Loaded'); </script>
@stop