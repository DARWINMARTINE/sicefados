@extends('sipork::layouts.master')
@section('content')
<br><br><br>
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
            <i class="fas fa-chart-line"></i>
            Seguimiento del Crecimiento del Cerdo
            </h4>
            <a href="{{ route('sipork.admin.sipork.seguimiento_del_crecimiento.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Regresar</a>
        </div>
        <div class="card-body">
            <p>
                <strong>ID del cerdo:</strong> {{ $pig->id_pig }}
            </p>
            <div class="mb-3">
                <canvas id="growthChart" height="100"></canvas>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>Fecha de Medición</th>
                            <th>Peso (kg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trackings as $tracking)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($tracking->measurement_date)->format('d/m/Y') }}</td>
                            <td>{{ $tracking->weight }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <small class="text-muted">Visualiza el progreso del peso del cerdo a lo largo del tiempo.</small>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="application/json" id="labels-data">
    {!! json_encode($labels ?? []) !!}
</script>
<script type="application/json" id="weights-data">
    {!! json_encode($weights ?? []) !!}
</script>
<script>
    const labels = JSON.parse(document.getElementById('labels-data').textContent);
    const data = JSON.parse(document.getElementById('weights-data').textContent);
    new Chart(document.getElementById('growthChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Peso (kg)',
                data: data,
                borderColor: '#007bff',
                backgroundColor: 'rgba(0,123,255,0.1)',
                tension: 0.3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#007bff',
                pointRadius: 5,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true, position: 'top' },
                tooltip: { enabled: true }
            },
            scales: {
                x: {
                    title: { display: true, text: 'Fecha de Medición' }
                },
                y: {
                    title: { display: true, text: 'Peso (kg)' },
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection