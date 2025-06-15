@extends('sipork::layouts.master')

@section('title', 'Add Tool Usage')

@section('content_header')
    <h1>Add Tool Usage</h1>
@stop

@section('content')
<br><br><br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('sipork.admin.sipork.uso_de_herramientas.store') }}">
        @csrf

        <div class="form-group">
            <label for="tool_id">Herramienta *</label>
            <select name="tool_id" id="tool_id" class="form-control @error('tool_id') is-invalid @enderror" required>
                <option value="">Select Tool</option>
                @foreach ($tools as $tool)
                    <option value="{{ $tool->id_tool }}" {{ old('tool_id') == $tool->id_tool ? 'selected' : '' }}>
                        {{ $tool->tool_name }}
                    </option>
                @endforeach
            </select>
            @error('tool_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="pig_id">Cerdo *</label>
            <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror" required>
                <option value="">Select Pig</option>
                @foreach ($pigs as $pig)
                    <option value="{{ $pig->id_pig }}" {{ old('pig_id') == $pig->id_pig ? 'selected' : '' }}>
                        {{ $pig->id_pig }} ({{ $pig->breed }})
                    </option>
                @endforeach
            </select>
            @error('pig_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="usage_date">Fecha de uso *</label>
            <input type="date" name="usage_date" id="usage_date" class="form-control @error('usage_date') is-invalid @enderror" value="{{ old('usage_date') }}" required>
            @error('usage_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="task_description">Descripción de la tarea</label>
            <textarea name="task_description" id="task_description" class="form-control @error('task_description') is-invalid @enderror">{{ old('task_description') }}</textarea>
            @error('task_description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('sipork.admin.sipork.uso_de_herramientas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Tool Usage Page Loaded'); </script>
@stop