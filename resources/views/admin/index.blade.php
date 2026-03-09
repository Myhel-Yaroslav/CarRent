@extends('adminlte::page')

@section('title', 'Список авто')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1>Керування автопарком</h1>
        <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Додати авто</a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Помилка!</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th>Рік</th>
                        <th>Ціна (грн)</th>
                        <th>Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cars as $car)
                    <tr>
                        <td>{{ $car->NumberPlate }}</td>
                        <td>{{ $car->Year }}</td>
                        <td>{{ $car->PricePerDay }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('admin.cars.show', ['car' => $car->NumberPlate]) }}" class="btn btn-sm btn-info">Перегляд</a>
                            <form action="{{ route('admin.cars.destroy', ['car' => $car->NumberPlate]) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Ви впевнені?')">Видалити</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop