@extends('sipork::layouts.masterAprendiz')

@section('title', 'Warehouses')

@section('content_header')
    <h1>Warehouses</h1>
@stop

@section('content')
    <br><br><br>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.create') }}" class="btn btn-primary mb-3">Agregar nuevo almacén</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del almacén</th>
                <th>Ubicación</th>
                <th>Capacidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warehouses as $warehouse)
                <tr>
                    <td>{{ $warehouse->id_warehouse }}</td>
                    <td>{{ $warehouse->warehouse_name }}</td>
                    <td>{{ $warehouse->location }}</td>
                    <td>{{ $warehouse->capacity }}</td>
                    <td>
                        <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.show', $warehouse->id_warehouse) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('sipork.aprendiz.sipork.BODEGAS.edit', $warehouse->id_warehouse) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sipork.aprendiz.sipork.BODEGAS.destroy', $warehouse->id_warehouse) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Warehouses Page Loaded'); </script>
@stop