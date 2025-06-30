@extends('sipork::layouts.master')

@section('title', 'Edit Sanitary Outbreak')

@section('content_header')
    <h1>Edit Sanitary Outbreak</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Sanitary Outbreak
                    <small class="text-muted">#{{ $sanitaryOutbreak->id_outbreak }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.brotes_sanitarios.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-virus"></i> Sanitary Outbreaks
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Sanitary Outbreak
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
                            <i class="fas fa-edit"></i> Edit Sanitary Outbreak Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.admin.sipork.brotes_sanitarios.update', $sanitaryOutbreak->id_outbreak) }}" method="POST">
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
                                                <option value="{{ $lot->id_lot }}" {{ old('lot_id', $sanitaryOutbreak->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                                    {{ $lot->lot_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Disease -->
                                <div class="col-md-6 form-group">
                                    <label for="disease" class="font-weight-bold">Disease <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-virus"></i></span>
                                        </div>
                                        <input type="text" name="disease" id="disease" class="form-control @error('disease') is-invalid @enderror" value="{{ old('disease', $sanitaryOutbreak->disease) }}" required>
                                    </div>
                                    @error('disease')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-6 form-group">
                                    <label for="start_date" class="font-weight-bold">Start Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $sanitaryOutbreak->start_date) }}" required>
                                    </div>
                                    @error('start_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="col-md-6 form-group">
                                    <label for="end_date" class="font-weight-bold">End Date</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $sanitaryOutbreak->end_date) }}">
                                    </div>
                                    @error('end_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 form-group">
                                    <label for="description" class="font-weight-bold">Description</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-sticky-note"></i></span>
                                        </div>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $sanitaryOutbreak->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.brotes_sanitarios.index') }}" class="btn btn-secondary mr-2">
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
    <script> console.log('Edit Sanitary Outbreak Page Loaded'); </script>
@stop
@endsection