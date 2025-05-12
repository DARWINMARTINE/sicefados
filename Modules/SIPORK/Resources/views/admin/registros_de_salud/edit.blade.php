@extends('sipork::layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Health Record</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sipork.admin.sipork.registros_de_salud.update', $healthRecord->id_health) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pig_id">Pig</label>
                            <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror">
                                <option value="">Select Pig</option>
                                @foreach ($pigs as $pig)
                                    <option value="{{ $pig->id_pig }}" {{ $healthRecord->pig_id == $pig->id_pig ? 'selected' : '' }}>
                                        {{ $pig->id_pig }} ({{ $pig->breed }})
                                    </option>
                                @endforeach
                            </select>
                            @error('pig_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="record_type">Record Type</label>
                            <input type="text" name="record_type" id="record_type" class="form-control @error('record_type') is-invalid @enderror" value="{{ $healthRecord->record_type }}">
                            @error('record_type')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $healthRecord->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="application_date">Application Date</label>
                            <input type="date" name="application_date" id="application_date" class="form-control @error('application_date') is-invalid @enderror" value="{{ $healthRecord->application_date }}">
                            @error('application_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cost_id">Cost</label>
                            <select name="cost_id" id="cost_id" class="form-control @error('cost_id') is-invalid @enderror">
                                <option value="">Select Cost</option>
                                @foreach ($costs as $cost)
                                    <option value="{{ $cost->id_cost }}" {{ $healthRecord->cost_id == $cost->id_cost ? 'selected' : '' }}>
                                        {{ $cost->id_cost }} ({{ $cost->cost_type }} - {{ $cost->amount }})
                                    </option>
                                @endforeach
                            </select>
                            @error('cost_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('sipork.admin.sipork.registros_de_salud.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection