@extends('sipork::layouts.master')

@section('title', 'Edit Tool Usage')

@section('content_header')
    <h1>Edit Tool Usage</h1>
@stop

@section('content')
<br><br><br>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-center">
                <h1 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-edit"></i> Edit Tool Usage
                    <small class="text-muted">#{{ $toolUsage->id_tool_pig }}</small>
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
                            <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.index') }}" class="text-primary font-weight-bold">
                                <i class="fas fa-tools"></i> Tool Usage
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-secondary" aria-current="page">
                            <i class="fas fa-edit"></i> Edit Tool Usage
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
                            <i class="fas fa-edit"></i> Edit Tool Usage Details
                        </h5>
                    </div>
                    <form action="{{ route('sipork.admin.sipork.uso_de_herramientas.update', $toolUsage->id_tool_pig) }}" method="POST">
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
                                <!-- Tool ID -->
                                <div class="col-md-6 form-group">
                                    <label for="tool_id" class="font-weight-bold">Tool <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-tools"></i></span>
                                        </div>
                                        <select name="tool_id" id="tool_id" class="form-control @error('tool_id') is-invalid @enderror" required>
                                            <option value="">Select Tool</option>
                                            @foreach ($tools as $tool)
                                                <option value="{{ $tool->id_tool }}" {{ old('tool_id', $toolUsage->tool_id) == $tool->id_tool ? 'selected' : '' }}>
                                                    {{ $tool->tool_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('tool_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Pig ID -->
                                <div class="col-md-6 form-group">
                                    <label for="pig_id" class="font-weight-bold">Pig <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-piggy-bank"></i></span>
                                        </div>
                                        <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror" required>
                                            <option value="">Select Pig</option>
                                            @foreach ($pigs as $pig)
                                                <option value="{{ $pig->id_pig }}" {{ old('pig_id', $toolUsage->pig_id) == $pig->id_pig ? 'selected' : '' }}>
                                                    {{ $pig->id_pig }} ({{ $pig->breed }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pig_id')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Usage Date -->
                                <div class="col-md-6 form-group">
                                    <label for="usage_date" class="font-weight-bold">Usage Date <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date', $toolUsage->usage_date) }}" required>
                                    </div>
                                    @error('usage_date')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Task Description -->
                                <div class="col-md-6 form-group">
                                    <label for="task_description" class="font-weight-bold">Task Description</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-light"><i class="fas fa-clipboard-list"></i></span>
                                        </div>
                                        <textarea name="task_description" id="task_description" class="form-control @error('task_description') is-invalid @enderror">{{ old('task_description', $toolUsage->task_description) }}</textarea>
                                    </div>
                                    @error('task_description')
                                        <span class="text-danger small">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer bg-light d-flex justify-content-end">
                            <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.index') }}" class="btn btn-secondary mr-2">
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
    <script> console.log('Edit Tool Usage Page Loaded'); </script>
@stop
@endsection