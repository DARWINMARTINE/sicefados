@extends('sipork::layouts.master')

@section('title', 'Edit Sanitary Outbreak')

@section('content_header')
    <h1>Edit Sanitary Outbreak</h1>
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

    <form method="POST" action="{{ route('sipork.admin.sipork.brotes_sanitarios.update', $sanitaryOutbreak->id_outbreak) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="lot_id">Lot *</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                <option value="">Select Lot</option>
                @foreach ($lots as $lot)
                    <option value="{{ $lot->id_lot }}" {{ old('lot_id', $sanitaryOutbreak->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                        {{ $lot->lot_name }}
                    </option>
                @endforeach
            </select>
            @error('lot_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="disease">Disease *</label>
            <input type="text" name="disease" id="disease" class="form-control @error('disease') is-invalid @enderror" value="{{ old('disease', $sanitaryOutbreak->disease) }}" required>
            @error('disease')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="start_date">Start Date *</label>
            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date', $sanitaryOutbreak->start_date) }}" required>
            @error('start_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" id="end_date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date', $sanitaryOutbreak->end_date) }}">
            @error('end_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $sanitaryOutbreak->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.admin.sipork.brotes_sanitarios.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Sanitary Outbreak Page Loaded'); </script>
@stop