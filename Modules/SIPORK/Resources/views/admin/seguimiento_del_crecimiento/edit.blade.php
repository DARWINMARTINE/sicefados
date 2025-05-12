@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Growth Tracking</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.update', $growthTracking->id_tracking) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="pig_id">Pig</label>
                            <select name="pig_id" id="pig_id" class="form-control @error('pig_id') is-invalid @enderror">
                                <option value="">Select Pig</option>
                                @foreach ($pigs as $pig)
                                    <option value="{{ $pig->id_pig }}" {{ $growthTracking->pig_id == $pig->id_pig ? 'selected' : '' }}>
                                        {{ $pig->id_pig }} ({{ $pig->breed }})
                                    </option>
                                @endforeach
                            </select>
                            @error('pig_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="measurement_date">Measurement Date</label>
                            <input type="date" name="measurement_date" id="measurement_date" class="form-control @error('measurement_date') is-invalid @enderror" value="{{ $growthTracking->measurement_date }}">
                            @error('measurement_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight (kg)</label>
                            <input type="number" step="0.01" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ $growthTracking->weight }}">
                            @error('weight')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="observations">Observations</label>
                            <textarea name="observations" id="observations" class="form-control @error('observations') is-invalid @enderror">{{ $growthTracking->observations }}</textarea>
                            @error('observations')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection