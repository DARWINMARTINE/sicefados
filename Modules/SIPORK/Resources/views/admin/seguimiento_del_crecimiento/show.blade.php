@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Growth Tracking Details</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $growthTracking->id_tracking }}</p>
                    <p><strong>Pig:</strong> {{ $growthTracking->pig ? $growthTracking->pig->id_pig : 'N/A' }}</p>
                    <p><strong>Measurement Date:</strong> {{ $growthTracking->measurement_date }}</p>
                    <p><strong>Weight:</strong> {{ $growthTracking->weight }} kg</p>
                    <p><strong>Observations:</strong> {{ $growthTracking->observations ?? 'N/A' }}</p>

                    <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection