@extends('sipork::layouts.master')

@section('title', 'Edit Lot')

@section('content_header')
    <h1>Edit Lot</h1>
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

    <form method="POST" action="{{ route('sipork.admin.sipork.lotes.update', $lot->id_lot) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="lot_name">Lot Name *</label>
            <input type="text" name="lot_name" id="lot_name" class="form-control @error('lot_name') is-invalid @enderror" value="{{ old('lot_name', $lot->lot_name) }}" required>
            @error('lot_name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="creation_date">Creation Date *</label>
            <input type="date" name="creation_date" id="creation_date" class="form-control @error('creation_date') is-invalid @enderror" value="{{ old('creation_date', $lot->creation_date) }}" required>
            @error('creation_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status *</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                <option value="">Select Status</option>
                <option value="1" {{ old('status', $lot->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $lot->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sipork.admin.sipork.lotes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Lot Page Loaded'); </script>
@stop