@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Lot')

@section('content_header')
    <h1>Edit Lot</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Lot
                    <small class="text-muted">#{{ $lot->id_lot }}</small>
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
                            <a href="{{ route('sipork.aprendiz.sipork.LOTES.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-layer-group"></i> Lots
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Lot
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
                            <i class="fas fa-edit"></i> Edit Lot Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.LOTES.update', $lot->id_lot) }}" method="POST">
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
                                <!-- Lot Name -->
                                <div class="col-md-6 form-group">
                                    <label for="lot_name" class="font-weight-bold">Lot Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                        </div>
                                        <input type="text" name="lot_name" id="lot_name" class="form-control @error('lot_name') is-invalid @enderror" value="{{ old('lot_name', $lot->lot_name) }}" required>
                                    </div>
                                    @error('lot_name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Creation Date -->
                                <div class="col-md-6 form-group">
                                    <label for="creation_date" class="font-weight-bold">Creation Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="creation_date" id="creation_date" class="form-control @error('creation_date') is-invalid @enderror" value="{{ old('creation_date', $lot->creation_date) }}" required>
                                    </div>
                                    @error('creation_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 form-group">
                                    <label for="status" class="font-weight-bold">Status <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-toggle-on"></i></span>
                                        </div>
                                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                            <option value="">Select Status</option>
                                            <option value="1" {{ old('status', $lot->status) == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $lot->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.LOTES.index') }}" class="btn btn-secondary mr-2">
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
    <script> console.log('Edit Lot Page Loaded'); </script>
@stop
@endsection