@extends('sipork::layouts.master')

@section('content_header')
    <h1 class="text-dark font-weight-bold">Operational Costs</h1>
@stop

@section('content')
    <br><br><br>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3 class="card-title m-0">Operational Costs</h3>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('sipork.admin.sipork.costos_operativos.create') }}" class="btn btn-primary mb-4">Create New Cost</a>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Cost Type</th>
                                        <th>Amount</th>
                                        <th>Cost Date</th>
                                        <th>Description</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($operationalCosts as $operationalCost)
                                        <tr class="{{ $loop->odd ? 'table-light' : '' }}">
                                            <td class="text-center">{{ $operationalCost->id_cost }}</td>
                                            <td>{{ $operationalCost->cost_type }}</td>
                                            <td>{{ number_format($operationalCost->amount, 2) }}</td>
                                            <td>{{ $operationalCost->cost_date }}</td>
                                            <td>{{ $operationalCost->description ?? 'N/A' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('sipork.admin.sipork.costos_operativos.show', $operationalCost->id_cost) }}" class="text-info" 
                                                        style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #17a2b8;" 
                                                        onmouseover="this.style.transform='scale(1.2)'; this.style.color='darkcyan';" 
                                                        onmouseout="this.style.transform='scale(1)'; this.style.color='#17a2b8';">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('sipork.admin.sipork.costos_operativos.edit', $operationalCost->id_cost) }}" class="text-warning" 
                                                        style="font-size: 1.5rem; transition: transform 0.3s ease, color 0.3s ease; color: #ffc107;" 
                                                        onmouseover="this.style.transform='scale(1.2)'; this.style.color='orange';" 
                                                        onmouseout="this.style.transform='scale(1)'; this.style.color='#ffc107';">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('sipork.admin.sipork.costos_operativos.destroy', $operationalCost->id_cost) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete(this);">
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
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        .form-card {
            background: #fefae0; /* Light beige, farm-inspired */
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #588157; /* Green border for farm theme */
            transition: transform 0.3s ease;
        }
        .form-card:hover {
            transform: translateY(-5px);
        }
        .bg-gradient-primary {
            background: linear-gradient(90deg, #3a5a40, #588157); /* Earthy green gradient */
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #e9ecef;
            border-color: #dee2e6;
            font-weight: 600;
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color: #e9f0e9; /* Subtle hover color */
        }
        .table-light {
            background-color: #f8f9fa;
        }
        .action-icon {
            margin: 0 0.5rem;
            font-size: 1.5rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }
        .action-icon:hover {
            transform: scale(1.2);
        }
        .text-info:hover { color: darkcyan; }
        .text-warning:hover { color: orange; }
        .text-danger:hover { color: darkred; }
        .alert-success {
            border-left: 4px solid #28a745;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .form-card {
                box-shadow: none;
                border: none;
            }
            .table th, .table td {
                font-size: 0.9rem;
                padding: 0.5rem;
            }
            .action-icon {
                font-size: 1.2rem;
            }
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        console.log('Operational Costs Page Loaded');

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
@stop