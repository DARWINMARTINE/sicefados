@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Diet')

@section('content_header')
    <h1>Edit Diet</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Diet
                    <small class="text-muted">#{{ $diet->id_diet }}</small>
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
                            <a href="{{ route('sipork.aprendiz.sipork.DIETAS.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-utensils"></i> Diets
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Diet
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
                            <i class="fas fa-edit"></i> Edit Diet Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.DIETAS.update', $diet->id_diet) }}" method="POST">
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
                                <!-- Diet Name -->
                                <div class="col-md-6 form-group">
                                    <label for="diet_name" class="font-weight-bold">Diet Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-utensils"></i></span>
                                        </div>
                                        <input type="text" name="diet_name" id="diet_name" class="form-control @error('diet_name') is-invalid @enderror" value="{{ old('diet_name', $diet->diet_name) }}" required>
                                    </div>
                                    @error('diet_name')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Min Age -->
                                <div class="col-md-6 form-group">
                                    <label for="min_age" class="font-weight-bold">Min Age</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-child"></i></span>
                                        </div>
                                        <input type="number" name="min_age" id="min_age" class="form-control @error('min_age') is-invalid @enderror" value="{{ old('min_age', $diet->min_age) }}">
                                    </div>
                                    @error('min_age')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Max Age -->
                                <div class="col-md-6 form-group">
                                    <label for="max_age" class="font-weight-bold">Max Age</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-child"></i></span>
                                        </div>
                                        <input type="number" name="max_age" id="max_age" class="form-control @error('max_age') is-invalid @enderror" value="{{ old('max_age', $diet->max_age) }}">
                                    </div>
                                    @error('max_age')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Min Weight -->
                                <div class="col-md-6 form-group">
                                    <label for="min_weight" class="font-weight-bold">Min Weight</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-weight"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="min_weight" id="min_weight" class="form-control @error('min_weight') is-invalid @enderror" value="{{ old('min_weight', $diet->min_weight) }}">
                                    </div>
                                    @error('min_weight')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Max Weight -->
                                <div class="col-md-6 form-group">
                                    <label for="max_weight" class="font-weight-bold">Max Weight</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-weight"></i></span>
                                        </div>
                                        <input type="number" step="0.01" name="max_weight" id="max_weight" class="form-control @error('max_weight') is-invalid @enderror" value="{{ old('max_weight', $diet->max_weight) }}">
                                    </div>
                                    @error('max_weight')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Physiological State -->
                                <div class="col-md-6 form-group">
                                    <label for="physiological_state" class="font-weight-bold">Physiological State</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-heartbeat"></i></span>
                                        </div>
                                        <input type="text" name="physiological_state" id="physiological_state" class="form-control @error('physiological_state') is-invalid @enderror" value="{{ old('physiological_state', $diet->physiological_state) }}">
                                    </div>
                                    @error('physiological_state')
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
                                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $diet->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.DIETAS.index') }}" class="btn btn-secondary mr-2">
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
    <script> console.log('Edit Diet Page Loaded'); </script>
@stop
@endsection