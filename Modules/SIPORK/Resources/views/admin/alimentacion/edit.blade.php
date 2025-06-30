@extends('sipork::layouts.master')

@section('title', 'Edit Feeding Event')

@section('content_header')
    <h1>Edit Feeding Event</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Feeding Event
                    <small class="text-muted">#{{ $feeding->id_feeding }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.alimentacion.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Feeding Events
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Feeding Event
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
                            <i class="fas fa-edit"></i> Edit Feeding Event Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.admin.sipork.alimentacion.update', $feeding->id_feeding) }}" method="POST">
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
                                    <label for="pig_id" class="font-weight-bold">Pig</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-piggy-bank"></i></span>
                                        </div>
                                        <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror">
                                            <option value="">Select Pig (Optional)</option>
                                            @foreach ($pigs as $pig)
                                                <option value="{{ $pig->id_pig }}" {{ old('pig_id', $feeding->pig_id) == $pig->id_pig ? 'selected' : '' }}>
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
                                    <label for="lot_id" class="font-weight-bold">Lot</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-layer-group"></i></span>
                                        </div>
                                        <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror">
                                            <option value="">Select Lot (Optional)</option>
                                            @foreach ($lots as $lot)
                                                <option value="{{ $lot->id_lot }}" {{ old('lot_id', $feeding->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                                                    {{ $lot->lot_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('lot_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Diet -->
                                <div class="col-md-6 form-group">
                                    <label for="diet_id" class="font-weight-bold">Diet <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-utensils"></i></span>
                                        </div>
                                        <select name="diet_id" id="diet_id" class="form-control @error('diet_id') is-invalid @enderror" required>
                                            <option value="">Select Diet</option>
                                            @foreach ($diets as $diet)
                                                <option value="{{ $diet->id_diet }}" {{ old('diet_id', $feeding->diet_id) == $diet->id_diet ? 'selected' : '' }}>
                                                    {{ $diet->diet_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('diet_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Feeding Date -->
                                <div class="col-md-6 form-group">
                                    <label for="feeding_date" class="font-weight-bold">Feeding Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="feeding_date" id="feeding_date" class="form-control @error('feeding_date') is-invalid @enderror" value="{{ old('feeding_date', $feeding->feeding_date) }}" required>
                                    </div>
                                    @error('feeding_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Food Amount -->
                                <div class="col-md-6 form-group">
                                    <label for="food_amount" class="font-weight-bold">Food Amount <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-weight"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="food_amount" id="food_amount" class="form-control @error('food_amount') is-invalid @enderror" value="{{ old('food_amount', $feeding->food_amount) }}" required>
                                    </div>
                                    @error('food_amount')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- FCR -->
                                <div class="col-md-6 form-group">
                                    <label for="fcr" class="font-weight-bold">FCR</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-chart-line"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="fcr" id="fcr" class="form-control @error('fcr') is-invalid @enderror" value="{{ old('fcr', $feeding->fcr) }}">
                                    </div>
                                    @error('fcr')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Cost -->
                                <div class="col-md-12 form-group">
                                    <label for="cost_id" class="font-weight-bold">Cost <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-money-bill"></i></span>
                                        </div>
                                        <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror" required>
                                            <option value="">Select Cost</option>
                                            @foreach ($costs as $cost)
                                                <option value="{{ $cost->id_cost }}" {{ old('cost_id', $feeding->cost_id) == $cost->id_cost ? 'selected' : '' }}>
                                                    {{ $cost->id_cost }}
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
                            <a href="{{ route('sipork.admin.sipork.alimentacion.index') }}" class="btn btn-secondary mr-2">
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
    <script> console.log('Edit Feeding Event Page Loaded'); </script>
@stop
@endsection