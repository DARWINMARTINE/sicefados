@extends('sipork::layouts.master')

@section('content')
<br><br><br>
<script>
    function confirmDelete(form) {
        if (confirm("Are you sure you want to delete this record?")) {
            form.submit();
        }
    }
    </script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Health Record Details</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $healthRecord->id_health }}</p>
                    <p><strong>Pig:</strong> {{ $healthRecord->pig ? $healthRecord->pig->id_pig : 'N/A' }}</p>
                    <p><strong>Record Type:</strong> {{ $healthRecord->record_type }}</p>
                    <p><strong>Description:</strong> {{ $healthRecord->description ?? 'N/A' }}</p>
                    <p><strong>Application Date:</strong> {{ $healthRecord->application_date }}</p>
                    <p><strong>Cost:</strong> {{ $healthRecord->cost ? $healthRecord->cost->amount : 'N/A' }}</p>
                    <a href="{{ route('sipork.admin.sipork.registros_de_salud.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection