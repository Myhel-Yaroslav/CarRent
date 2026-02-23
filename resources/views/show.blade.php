@extends('layouts.app')

@section('title', $car['brand'] . ' ' . $car['model'] . ' - CarRent')
<!-- Деталі автомобіля -->
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 text-center">
                <div class="card-header bg-dark text-white py-3">
                    <h4 class="mb-0">Інформація про автомобіль</h4>
                </div>
                <div class="card-body p-5">
                    <h1 class="display-5 fw-bold text-primary">{{ $car['brand'] }}</h1>
                    <h2 class="text-secondary mb-4">{{ $car['model'] }}</h2>
                    <p class="fs-4">Рік випуску: <strong>{{ $car['year'] }}</strong></p>
                    
                    <div class="mt-5 d-grid gap-2">
                        <button class="btn btn-success btn-lg">Забронювати це авто</button>
                        <a href="/" class="btn btn-link text-decoration-none">Повернутися до каталогу</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection