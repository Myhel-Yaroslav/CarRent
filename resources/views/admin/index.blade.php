@extends('layouts.app')
@section('content')
<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Номер</th>
            <th>Рік</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{ $car->NumberPlate }}</td>
            <td>{{ $car->Year }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('admin.cars.show', $car->NumberPlate) }}" class="btn btn-sm btn-info">Перегляд</a>
                <form action="{{ route('admin.cars.destroy', $car->NumberPlate) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Видалити</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection