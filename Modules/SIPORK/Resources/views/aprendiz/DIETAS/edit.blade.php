@extends('sipork::layouts.masterAprendiz')

@section('title', 'Edit Diet')

@section('content_header')
    <h1>Edit Diet</h1>
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

    <form method="POST" action="{{ route('sipork.aprendiz.sipork.DIETAS.update', $diet->id_diet) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="diet_name">Diet Name *</label>
            <input type="text" name="diet_name" id="diet_name" class="form-control @error('diet_name') is-invalid @enderror" value="{{ old('diet_name', $diet->diet_name) }}" required>
            @error('diet_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="min_age">Min Age</label>
            <input type="number" name="min_age" id="min_age" class="form-control @error('min_age') is-invalid @enderror" value="{{ old('min_age', $diet->min_age) }}">
            @error('min_age')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_age">Max Age</label>
            <input type="number" name="max_age" id="max_age" class="form-control @error('max_age') is-invalid @enderror" value="{{ old('max_age', $diet->max_age) }}">
            @error('max_age')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="min_weight">Min Weight</label>
            <input type="number" step="0.01" name="min_weight" id="min_weight" class="form-control @error('min_weight') is-invalid @enderror" value="{{ old('min_weight', $diet->min_weight) }}">
            @error('min_weight')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="max_weight">Max Weight</label>
            <input type="number" step="0.01" name="max_weight" id="max_weight" class="form-control @error('max_weight') is-invalid @enderror" value="{{ old('max_weight', $diet->max_weight) }}">
            @error('max_weight')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="physiological_state">Physiological State</label>
            <input type="text" name="physiological_state" id="physiological_state" class="form-control @error('physiological_state') is-invalid @enderror" value="{{ old('physiological_state', $diet->physiological_state) }}">
            @error('physiological_state')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $diet->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.aprendiz.sipork.DIETAS.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Diet Page Loaded'); </script>
@stop