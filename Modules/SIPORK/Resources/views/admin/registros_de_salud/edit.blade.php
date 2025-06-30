@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Health Record
                    <small class="text-muted">#{{ $healthRecord->id_health }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.registros_de_salud.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-medkit"></i> Health Records
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Health Record
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
                            <i class="fas fa-edit"></i> Edit Health Record Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.admin.sipork.registros_de_salud.update', $healthRecord->id_health) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
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
                                                <option value="{{ $pig->id_pig }}" {{ $healthRecord->pig_id == $pig->id_pig ? 'selected' : '' }}>
                                                    {{ $pig->id_pig }} ({{ $pig->breed }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pig_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Record Type -->
                                <div class="col-md-6 form-group">
                                    <label for="record_type" class="font-weight-bold">Record Type <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-prescription"></i></span>
                                        </div>
                                        <input type="text" name="record_type" id="record_type" class="form-control @error('record_type') is-invalid @enderror" value="{{ $healthRecord->record_type }}" required>
                                    </div>
                                    @error('record_type')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-6 form-group">
                                    <label for="description" class="font-weight-bold">Description</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-sticky-note"></i></span>
                                        </div>
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $healthRecord->description }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Application Date -->
                                <div class="col-md-6 form-group">
                                    <label for="application_date" class="font-weight-bold">Application Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="application_date" id="application_date" class="form-control @error('application_date') is-invalid @enderror" value="{{ $healthRecord->application_date }}" required>
                                    </div>
                                    @error('application_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Cost -->
                                <div class="col-md-6 form-group">
                                    <label for="cost_id" class="font-weight-bold">Cost <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-money-bill"></i></span>
                                        </div>
                                        <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror" required>
                                            <option value="">Select Cost</option>
                                            @foreach ($costs as $cost)
                                                <option value="{{ $cost->id_cost }}" {{ $healthRecord->cost_id == $cost->id_cost ? 'selected' : '' }}>
                                                    {{ $cost->id_cost }} ({{ $cost->cost_type }} - {{ $cost->amount }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('cost_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.registros_de_salud.index') }}" class="btn btn-secondary mr-2">
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
@endsection