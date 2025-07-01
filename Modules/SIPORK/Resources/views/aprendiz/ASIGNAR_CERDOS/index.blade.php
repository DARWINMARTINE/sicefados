@extends('sipork::layouts.masterAprendiz')

@section('title', 'Assign Pigs to Lots')

@section('content_header')
<h1>Assign Pigs to Lots</h1>
@stop

@section('content')
<br><br><br>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 offset-md-0" style="margin-left: 5%;">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-center align-items-center">
                        <h3 class="card-title mb-0 text-center flex-grow-1">Assign Pigs to Lots</h3>
                        <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.create') }}" class="btn btn-success btn-sm ml-auto" style="transition: all 0.3s ease; color: white;">Assign New Pig to Lot</a>
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
                        @if($pigLots->isEmpty())
                        <div class="alert alert-danger text-center">No pig assignments yet.</div>
                        @else
                        <div class="table-responsive" style="margin-left: 10px;">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
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
                                            <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.show', [$pigLot->pig_id, $pigLot->lot_id]) }}" class="text-info"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.edit', [$pigLot->pig_id, $pigLot->lot_id]) }}" class="text-warning"
                                                style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;"
                                                onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';"
                                                onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.destroy', [$pigLot->pig_id, $pigLot->lot_id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
                                {!! $pigLots->links('pagination::bootstrap-4') !!}
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
    console.log('Pig Lots Page Loaded');
</script>
@stop
@endsection