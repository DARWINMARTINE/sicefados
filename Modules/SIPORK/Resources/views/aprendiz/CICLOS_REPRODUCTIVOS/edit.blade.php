@extends('sipork::layouts.masterAprendiz')

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Reproductive Cycle
                    <small class="text-muted">#{{ $reproductiveCycle->id_cycle }}</small>
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
                            <a href="{{ route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-heart"></i> Reproductive Cycles
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Reproductive Cycle
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
                            <i class="fas fa-edit"></i> Edit Reproductive Cycle Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.update', $reproductiveCycle->id_cycle) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <!-- Sow -->
                                <div class="col-md-6 form-group">
                                    <label for="sow_id" class="font-weight-bold">Sow <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-piggy-bank"></i></span>
                                        </div>
                                        <select name="sow_id" id="sow_id" class="form-control @error('sow_id') is-invalid @enderror" required>
                                            <option value="">Select Sow</option>
                                            @foreach ($pigs as $pig)
                                                <option value="{{ $pig->id_pig }}" {{ $reproductiveCycle->sow_id == $pig->id_pig ? 'selected' : '' }}>
                                                    {{ $pig->id_pig }} ({{ $pig->breed }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('sow_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Service Date -->
                                <div class="col-md-6 form-group">
                                    <label for="service_date" class="font-weight-bold">Service Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="service_date" id="service_date" class="form-control @error('service_date') is-invalid @enderror" value="{{ $reproductiveCycle->service_date }}" required>
                                    </div>
                                    @error('service_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Birth Date -->
                                <div class="col-md-6 form-group">
                                    <label for="birth_date" class="font-weight-bold">Birth Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-check"></i></span>
                                        </div>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ $reproductiveCycle->birth_date }}" required>
                                    </div>
                                    @error('birth_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Live Piglets -->
                                <div class="col-md-6 form-group">
                                    <label for="live_piglets" class="font-weight-bold">Live Piglets <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-baby"></i></span>
                                        </div>
                                        <input type="number" name="live_piglets" id="live_piglets" class="form-control @error('live_piglets') is-invalid @enderror" value="{{ $reproductiveCycle->live_piglets }}" required>
                                    </div>
                                    @error('live_piglets')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Dead Piglets -->
                                <div class="col-md-6 form-group">
                                    <label for="dead_piglets" class="font-weight-bold">Dead Piglets <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-skull-crossbones"></i></span>
                                        </div>
                                        <input type="number" name="dead_piglets" id="dead_piglets" class="form-control @error('dead_piglets') is-invalid @enderror" value="{{ $reproductiveCycle->dead_piglets }}" required>
                                    </div>
                                    @error('dead_piglets')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lactation End Date -->
                                <div class="col-md-6 form-group">
                                    <label for="lactation_end_date" class="font-weight-bold">Lactation End Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-times"></i></span>
                                        </div>
                                        <input type="date" name="lactation_end_date" id="lactation_end_date" class="form-control @error('lactation_end_date') is-invalid @enderror" value="{{ $reproductiveCycle->lactation_end_date }}" required>
                                    </div>
                                    @error('lactation_end_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index') }}" class="btn btn-secondary mr-2">
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