@extends('sipork::layouts.master')

@section('title', 'Edit Operational Cost')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Editar Costo Operativo 
                    <small class="text-muted">#{{ $operationalCost->id_cost }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.costos_operativos.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-dollar-sign"></i> Costos Operativos
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Editar Costo
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
                            <i class="fas fa-edit"></i> Editar Detalles del Costo Operativo
                        </h5>
                    </div>
                    <form method="POST" action="{{ route('sipork.admin.sipork.costos_operativos.update', $operationalCost->id_cost) }}">
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
                                <!-- Tipo de costo -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_type" class="font-weight-bold">Tipo de costo <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-tags"></i></span>
                                        </div>
                                        <input type="text" name="cost_type" id="cost_type" class="form-control @error('cost_type') is-invalid @enderror" value="{{ old('cost_type', $operationalCost->cost_type) }}" required>
                                    </div>
                                    @error('cost_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Monto -->
                                <div class="col-md-6 form-group">
                                    <label for="amount" class="font-weight-bold">Monto <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $operationalCost->amount) }}" required>
                                    </div>
                                    @error('amount')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Fecha del costo -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_date" class="font-weight-bold">Fecha del costo <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="cost_date" id="cost_date" class="form-control @error('cost_date') is-invalid @enderror" value="{{ old('cost_date', $operationalCost->cost_date) }}" required>
                                    </div>
                                    @error('cost_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Descripción -->
                                <div class="col-md-6 form-group">
                                    <label for="description" class="font-weight-bold">Descripción</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-sticky-note"></i></span>
                                        </div>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $operationalCost->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.costos_operativos.index') }}" class="btn btn-secondary mr-2">
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
        console.log('Edit Operational Cost Page Loaded');
    </script>
@stop