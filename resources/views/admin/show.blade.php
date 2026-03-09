@extends('adminlte::page')

@section('title', 'Керування авто')

@section('content_header')
    <h1>Керування автомобілем {{ $car->NumberPlate }}</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card card-dark">
            <div class="card-body text-center">
                <div class="row mb-4">
                    <div class="col-6"><strong>РІК ВИПУСКУ:</strong><br>{{ $car->Year }}</div>
                    <div class="col-6"><strong>СТАТУС:</strong><br><span class="badge bg-info">{{ $car->Status }}</span></div>
                </div>

                <div class="bg-light p-4 rounded mb-3">
                    <h5>Зміна вартості оренди</h5>
                    <form action="{{ route('admin.cars.updatePrice', $car->NumberPlate) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="input-group">
                            <input type="number" name="PricePerDay" class="form-control" value="{{ $car->PricePerDay }}" step="0.01">
                            <div class="input-group-append"><span class="input-group-text">грн/день</span></div>
                            <button type="submit" class="btn btn-primary ml-2">Зберегти</button>
                        </div>
                    </form>
                </div>

                <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary btn-block">Назад до списку</a>
                <form action="{{ route('admin.cars.destroy', $car->NumberPlate) }}" method="POST" class="mt-2">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-block" onclick="return confirm('Видалити?')">Видалити автомобіль</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop