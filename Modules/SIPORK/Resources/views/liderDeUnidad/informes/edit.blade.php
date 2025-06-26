@extends('sipork::layouts.masterLiderDeUnidad')

@section('title', 'Edit Report')

@section('content_header')
    <h1>Edit Report</h1>
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

    <form method="POST" action="{{ route('sipork.liderDeUnidad.sipork.informes.update', $report->id_report) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="report_type">Tipo de reporte *</label>
            <input type="text" name="report_type" id="report_type" class="form-control @error('report_type') is-invalid @enderror" value="{{ old('report_type', $report->report_type) }}" required>
            @error('report_type')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="report_date">Fecha del informe *</label>
            <input type="date" name="report_date" id="report_date" class="form-control @error('report_date') is-invalid @enderror" value="{{ old('report_date', $report->report_date) }}" required>
            @error('report_date')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripcion</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $report->description) }}</textarea>
            @error('description')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="lot_id">Lote</label>
            <select name="lot_id" id="lot_id" class="form-control @error('lot_id') is-invalid @enderror">
                <option value="">Select Lot (Optional)</option>
                @foreach ($lots as $lot)
                    <option value="{{ $lot->id_lot }}" {{ old('lot_id', $report->lot_id) == $lot->id_lot ? 'selected' : '' }}>
                        {{ $lot->lot_name }}
                    </option>
                @endforeach
            </select>
            @error('lot_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('sipork.liderDeUnidad.sipork.informes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Edit Report Page Loaded'); </script>
@stop