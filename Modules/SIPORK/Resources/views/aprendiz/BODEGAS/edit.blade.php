@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Warehouse')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Editar Almacén 
                    <small class="text-muted">#{{ $warehouse->id_warehouse }}</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-2 rounded shadow-sm float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="" class="text-primary font-weight-bold">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-warehouse"></i> Almacenes
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar Almacén
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-0">
                    <div class="card-header bg-primary text-white text-center rounded-top">
                        <h5 class="font-weight-bold m-0">
                            <i class="fas fa-edit"></i> Editar Detalles del Almacén
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.aprendiz.sipork.BODEGAS.update', $warehouse->id_warehouse) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <!-- Nombre del almacén -->
                                <div class="col-md-6 form-group">
                                    <label for="warehouse_name" class="font-weight-bold">Nombre del almacén <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-warehouse"></i></span>
                                        </div>
                                        <input type="text" name="warehouse_name" id="warehouse_name" class="form-control @error('warehouse_name') is-invalid @enderror" value="{{ old('warehouse_name', $warehouse->warehouse_name) }}" required>
                                    </div>
                                    @error('warehouse_name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Ubicación -->
                                <div class="col-md-6 form-group">
                                    <label for="location" class="font-weight-bold">Ubicación <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location', $warehouse->location) }}" required>
                                    </div>
                                    @error('location')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Capacidad -->
                                <div class="col-md-6 form-group">
                                    <label for="capacity" class="font-weight-bold">Capacidad <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-boxes"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $warehouse->capacity) }}" required>
                                    </div>
                                    @error('capacity')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
@stop

@section('js')
    <script>
        console.log('Edit Warehouse Page Loaded');
    </script>
@stop