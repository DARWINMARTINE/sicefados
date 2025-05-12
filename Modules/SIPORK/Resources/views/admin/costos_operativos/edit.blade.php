@extends('sipork::layouts.master')

@section('content_header')
    <h1 class="text-dark font-weight-bold">Edit Operational Cost</h1>
@stop

@section('content')
<br><br><br>
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header bg-gradient-primary text-white text-center">
                        <h3 class="card-title m-0">Edit Operational Cost</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sipork.admin.sipork.costos_operativos.update', $operationalCost->id_cost) }}">
                            @csrf
                            @method('PUT')

                            <!-- Cost Type -->
                            <div class="form-group">
                                <input type="text" name="cost_type" id="cost_type" class="form-control @error('cost_type') is-invalid @enderror" value="{{ old('cost_type', $operationalCost->cost_type) }}" required placeholder=" ">
                                <label for="cost_type" class="floating-label">Cost Type <span class="text-danger">*</span></label>
                                <span class="form-icon"><i class="fas fa-tags"></i></span>
                                @error('cost_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Amount -->
                            <div class="form-group">
                                <input type="number" step="0.01" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ old('amount', $operationalCost->amount) }}" required placeholder=" ">
                                <label for="amount" class="floating-label">Amount <span class="text-danger">*</span></label>
                                <span class="form-icon"><i class="fas fa-dollar-sign"></i></span>
                                @error('amount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Cost Date -->
                            <div class="form-group">
                                <input type="date" name="cost_date" id="cost_date" class="form-control @error('cost_date') is-invalid @enderror" value="{{ old('cost_date', $operationalCost->cost_date) }}" required placeholder=" ">
                                <label for="cost_date" class="floating-label">Cost Date <span class="text-danger">*</span></label>
                                <span class="form-icon"><i class="fas fa-calendar-alt"></i></span>
                                @error('cost_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder=" ">{{ old('description', $operationalCost->description) }}</textarea>
                                <label for="description" class="floating-label">Description</label>
                                <span class="form-icon"><i class="fas fa-sticky-note"></i></span>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('sipork.admin.sipork.costos_operativos.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
    <style>
        .form-card {
            background: #fefae0; /* Light beige, farm-inspired */
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #588157; /* Green border for farm theme */
            transition: transform 0.3s ease;
        }
        .form-card:hover {
            transform: translateY(-5px);
        }
        .bg-gradient-primary {
            background: linear-gradient(90deg, #3a5a40, #588157); /* Earthy green gradient */
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
            border-color: #588157;
            box-shadow: 0 0 8px rgba(88, 129, 87, 0.2);
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
            color: #3a5a40;
            background: #fefae0;
            padding: 0 0.2rem;
        }
        .invalid-feedback {
            font-size: 0.875rem;
            color: #dc3545;
        }
        .btn-primary {
            background: #588157;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-primary:hover {
            background: #3a5a40;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }
        .form-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }
        .alert-danger {
            border-left: 4px solid #dc3545;
            border-radius: 8px;
        }
        @media (max-width: 768px) {
            .form-card {
                box-shadow: none;
                border: none;
            }
            .form-group {
                margin-bottom: 1.25rem;
            }
            .card-header {
                font-size: 1.25rem;
            }
        }
    </style>
@stop

@section('js')
    <script>
        console.log('Edit Operational Cost Page Loaded');
    </script>
@stop