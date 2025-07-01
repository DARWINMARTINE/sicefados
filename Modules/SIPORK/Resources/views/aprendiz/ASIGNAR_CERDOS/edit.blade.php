@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Pig Lot Assignment')

@section('content_header')
    <h1>Edit Pig Lot Assignment</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Pig Lot Assignment
                    <small class="text-muted">#{{ $pigLot->pig_id }}</small>
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
                            <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-layer-group"></i> Assign Pigs to Lots
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Pig Lot Assignment
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
                            <i class="fas fa-edit"></i> Edit Pig Lot Assignment Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.update', [$pigLot->pig_id, $pigLot->lot_id]) }}" method="POST">
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
                                <!-- Pig -->
                                <div class="col-md-6 form-group">
                                    <label for="pig_id" class="font-weight-bold">Pig <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-piggy-bank"></i></span>
                                        </div>
                                        <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror" required>
                                            <option value="">Select Pig</option>
                                            @foreach ($pigs as $pig)
                                                <option value="{{ $pig->id_pig }}" {{ old('pig_id', $pigLot->pig_id) == $pig->id_pig ? 'selected' : '' }}>
                                                    {{ $pig->id_pig }} ({{ $pig->breed }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pig_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lot -->
                                <div class="col-md-6 form-group">
                                    <label for="lot_id" class="font-weight-bold">Lot <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                                            <option value="">Select Lot</option>
                                            @foreach ($lots as $lot)
                                                <option value="{{ $lot->id_lot }}" {{ old('lot_id', $pigLot->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                                    {{ $lot->lot_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Entry Date -->
                                <div class="col-md-6 form-group">
                                    <label for="entry_date" class="font-weight-bold">Entry Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date', $pigLot->entry_date) }}" required>
                                    </div>
                                    @error('entry_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Exit Date -->
                                <div class="col-md-6 form-group">
                                    <label for="exit_date" class="font-weight-bold">Exit Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="exit_date" id="exit_date" class="form-control @error('exit_date') is-invalid @enderror" value="{{ old('exit_date', $pigLot->exit_date) }}">
                                    </div>
                                    @error('exit_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.ASIGNAR_CERDOS.index') }}" class="btn btn-secondary mr-2">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Pig Lot Page Loaded'); </script>
@stop
@endsection