@extends('layouts.app')

@section('title', 'Автомобіль ' . $car->NumberPlate)

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0">Інформація про автомобіль</h4>
                </div>
                <div class="card-body p-5">
                    <h1 class="display-5 fw-bold text-dark">{{ $car->NumberPlate }}</h1>
                    <p class="fs-4">Рік випуску: <strong>{{ $car->Year }}</strong></p>
                    <p class="fs-5 text-muted">Статус: {{ $car->Status }}</p>
                    <p class="fs-4 text-success fw-bold">Ціна: {{ $car->PricePerDay }} грн/день</p>
                    
                    <div class="mt-5 d-grid gap-2">
                        <button class="btn btn-success btn-lg">Забронювати зараз</button>
                        <a href="{{ route('cars.index') }}" class="btn btn-link text-decoration-none">Назад до каталогу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection