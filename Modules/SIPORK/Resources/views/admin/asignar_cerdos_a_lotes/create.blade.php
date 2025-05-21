@extends('sipork::layouts.master')

@section('title', 'Assign Pig to Lot')

@section('content_header')
    <h1>Assign Pig to Lot</h1>
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

    <form method="POST" action="{{ route('sipork.admin.sipork.asignar_cerdos_a_lotes.store') }}">
        @csrf

        <div class="form-group">
            <label for="pig_id">Pig *</label>
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
            <label for="lot_id">Lot *</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror" required>
                <option value="">Select Lot</option>
                @foreach ($lots as $lot)
                    <option value="{{ $lot->id_lot }}" {{ old('lot_id') == $lot->id_lot ? 'selected' : '' }}>
                        {{ $lot->lot_name }}
                    </option>
                @endforeach
            </select>
            @error('lot_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="entry_date">Entry Date *</label>
            <input type="date" name="entry_date" id="entry_date" class="form-control @error('entry_date') is-invalid @enderror" value="{{ old('entry_date') }}" required>
            @error('entry_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="exit_date">Exit Date</label>
            <input type="date" name="exit_date" id="exit_date" class="form-control @error('exit_date') is-invalid @enderror" value="{{ old('exit_date') }}">
            @error('exit_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Assign</button>
        <a href="" class="btn btn-secondary">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Create Pig Lot Page Loaded'); </script>
@stop