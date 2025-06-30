@extends('sipork::layouts.master')

@section('title', 'Assign Pig to Lot')

@section('content_header')
    <h1>Assign Pig to Lot</h1>
@stop

@section('content')
<br><br><br>
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        min-height: 100vh;
        padding-left: 25%;
        background-color: #f4f4f4;
    }
    .form-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    .form-card .card-header {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 1.5rem;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }
    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
    }
    .floating-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
        color: #6c757d;
        transition: all 0.2s ease;
        pointer-events: none;
    }
    .form-control:not(:placeholder-shown) + .floating-label,
    .form-control:focus + .floating-label {
        top: 0;
        font-size: 0.85rem;
        color: #007bff;
        background: white;
        padding: 0 0.2rem;
    }
    .invalid-feedback {
        font-size: 0.875rem;
        color: #dc3545;
    }
    .btn-primary {
        background: #007bff;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .btn-primary:hover {
        background: #0056b3;
        transform: translateY(-2px);
    }
    .btn-secondary {
        border-radius: 8px;
        padding: 0.75rem 2rem;
        transition: background 0.3s ease, transform 0.2s ease;
    }
    .btn-secondary:hover {
        transform: translateY(-2px);
    }
    .form-icon {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }
    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }
        .form-card {
            box-shadow: none;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Assign Pig to Lot</h3>
                    </div>
                    <form action="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.store') }}" method="POST">
                        @csrf
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
                                    <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Pig</option>
                                        @foreach ($pigs as $pig)
                                            <option value="{{ $pig->id_pig }}" {{ old('pig_id') == $pig->id_pig ? 'selected' : '' }}>
                                                {{ $pig->id_pig }} ({{ $pig->breed }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="pig_id" class="floating-label">Pig <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-piggy-bank"></i></span>
                                    @error('pig_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Lot -->
                                <div class="col-md-6 form-group">
                                    <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                                        <option value="" disabled selected>Select Lot</option>
                                        @foreach ($lots as $lot)
                                            <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                                                {{ $lot->lot_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="lot_id" class="floating-label">Lot <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-layer-group"></i></span>
                                    @error('lot_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Entry Date -->
                                <div class="col-md-6 form-group">
                                    <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date') }}" required placeholder=" ">
                                    <label for="entry_date" class="floating-label">Entry Date <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-calendar-alt"></i></span>
                                    @error('entry_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Exit Date -->
                                <div class="col-md-6 form-group">
                                    <input type="date" name="exit_date" id="exit_date" class="form-control @error('exit_date') is-invalid @enderror" value="{{ old('exit_date') }}" placeholder=" ">
                                    <label for="exit_date" class="floating-label">Exit Date</label>
                                    <span class="form-icon"><i class="fas fa-calendar-alt"></i></span>
                                    @error('exit_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.lotes.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
<script>
    document.querySelectorAll('select').forEach(select => {
        if (select.value) {
            select.nextElementSibling.classList.add('active');
        }
        select.addEventListener('change', () => {
            if (select.value) {
                select.nextElementSibling.classList.add('active');
            } else {
                select.nextElementSibling.classList.remove('active');
            }
        });
    });
</script>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Pig Lot Page Loaded'); </script>
@stop
@endsection