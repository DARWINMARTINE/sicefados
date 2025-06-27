@extends('sipork::layouts.masterAprendiz')

@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reproductive Cycle Details</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $reproductiveCycle->id_cycle }}</p>
                    <p><strong>Sow:</strong> {{ $reproductiveCycle->sow ? $reproductiveCycle->sow->id_pig : 'N/A' }}</p>
                    <p><strong>Service Date:</strong> {{ $reproductiveCycle->service_date ?? 'N/A' }}</p>
                    <p><strong>Birth Date:</strong> {{ $reproductiveCycle->birth_date ?? 'N/A' }}</p>
                    <p><strong>Live Piglets:</strong> {{ $reproductiveCycle->live_piglets ?? 'N/A' }}</p>
                    <p><strong>Dead Piglets:</strong> {{ $reproductiveCycle->dead_piglets ?? 'N/A' }}</p>
                    <p><strong>Lactation End Date:</strong> {{ $reproductiveCycle->lactation_end_date ?? 'N/A' }}</p>

                    <a href="{{ route('sipork.aprendiz.sipork.CICLOS_REPRODUCTIVOS.index') }}" class="btn btn-primary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection