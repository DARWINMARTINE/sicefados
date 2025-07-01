@extends('sipork::layouts.masterAprendiz')

@section('title', 'Add Tool Usage')

@section('content_header')
    <h1>Add Tool Usage</h1>
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
        padding-left: 14%;
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

<center>
<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <div class="card form-card animate__animated animate__fadeIn">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Add Tool Usage</h3>
                    </div>
                    <form action="{{ route('sipork.aprendiz.sipork.USO_HERRAMIENTAS.store') }}" method="POST">
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
                                <!-- Tool ID -->
                                <div class="col-md-6 form-group">
                                    <select name="tool_id" id="tool_id" class="form-control @error('tool_id') is-invalid @enderror" required>
                                        <option value="">Select Tool</option>
                                        @foreach ($tools as $tool)
                                            <option value="{{ $tool->id_tool }}" {{ old('tool_id') == $tool->id_tool ? 'selected' : '' }}>
                                                {{ $tool->tool_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="tool_id" class="floating-label">Herramienta <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-tools"></i></span>
                                    @error('tool_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Pig ID -->
                                <div class="col-md-6 form-group">
                                    <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror" required>
                                        <option value="">Select Pig</option>
                                        @foreach ($pigs as $pig)
                                            <option value="{{ $pig->id_pig }}" {{ old('pig_id') == $pig->id_pig ? 'selected' : '' }}>
                                                {{ $pig->id_pig }} ({{ $pig->breed }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="pig_id" class="floating-label">Cerdo <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-piggy-bank"></i></span>
                                    @error('pig_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Usage Date -->
                                <div class="col-md-6 form-group">
                                    <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date') }}" required placeholder=" ">
                                    <label for="usage_date" class="floating-label">Fecha de uso <span class="text-danger">*</span></label>
                                    <span class="form-icon"><i class="fas fa-calendar-alt"></i></span>
                                    @error('usage_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Task Description -->
                                <div class="col-md-6 form-group">
                                    <textarea name="task_description" id="task_description" class="form-control @error('task_description') is-invalid @enderror" placeholder=" ">{{ old('task_description') }}</textarea>
                                    <label for="task_description" class="floating-label">Descripción de la tarea</label>
                                    <span class="form-icon"><i class="fas fa-clipboard-list"></i></span>
                                    @error('task_description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <a href="{{ route('sipork.aprendiz.sipork.USO_HERRAMIENTAS.index') }}" class="btn btn-secondary mr-2">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</center>

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
    <script> console.log('Create Tool Usage Page Loaded'); </script>
@stop
@endsection