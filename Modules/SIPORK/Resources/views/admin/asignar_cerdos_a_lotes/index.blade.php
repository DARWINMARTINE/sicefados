@extends('sipork::layouts.master')

@section('title', 'Assign Pigs to Lots')

@section('content_header')
<h1>Assign Pigs to Lots</h1>
@stop

@section('content')
<br><br><br>
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<a href="" class="btn btn-primary mb-3">Assign New Pig to Lot</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Pig ID</th>
            <th>Pig Breed</th>
            <th>Lot Name</th>
            <th>Entry Date</th>
            <th>Exit Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pigLots as $pigLot)
        <tr>
            <td>{{ $pigLot->pig_id }}</td>
            <td>{{ $pigLot->pig_breed }}</td>
            <td>{{ $pigLot->lot_name }}</td>
            <td>{{ $pigLot->entry_date }}</td>
            <td>{{ $pigLot->exit_date ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.show', [$pigLot->pig_id, $pigLot->lot_id]) }}" class="text-info"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.edit', [$pigLot->pig_id, $pigLot->lot_id]) }}" class="text-warning"
                    style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                    onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                    onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.destroy', [$pigLot->pig_id, $pigLot->lot_id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
    console.log('Pig Lots Page Loaded');
</script>
@stop