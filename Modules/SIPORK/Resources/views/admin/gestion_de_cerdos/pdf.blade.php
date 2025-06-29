<!DOCTYPE html>
<html>
<head>
    <title>Lista de Cerdos</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 5px; text-align: center; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Lista de Cerdos</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de Nacimiento</th>
                <th>Peso Inicial (kg)</th>
                <th>Sexo</th>
                <th>Raza</th>
                <th>Estado</th>
                <th>Fecha de Destete</th>
                <th>Fecha de Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pigs as $pig)
            <tr>
                <td>{{ $pig->id_pig }}</td>
                <td>{{ $pig->birth_date }}</td>
                <td>{{ number_format($pig->initial_weight) }} kg</td>
                <td>{{ $pig->gender }}</td>
                <td>{{ $pig->breed }}</td>
                <td>{{ $pig->status }}</td>
                <td>{{ $pig->weaning_date ?? 'N/A' }}</td>
                <td>{{ $pig->sale_date ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>