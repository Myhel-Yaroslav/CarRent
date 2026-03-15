@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 75vh;">
    <div class="card border-0 shadow-sm" style="width: 100%; max-width: 520px; border-radius: 15px; overflow: hidden; background: white;">
        
        <div class="card-header bg-dark text-white text-center py-3">
            <h4 class="mb-0 fw-normal">Інформація про автомобіль</h4>
        </div>

        <div class="card-body text-center p-5">
            <h1 style="color: #007bff; font-size: 3.5rem; font-weight: 800; margin: 0; line-height: 1;">
                {{ $car->details->Brand ?? 'Авто' }}
            </h1>
            
            <h2 class="text-secondary fw-normal mb-5" style="font-size: 2.2rem;">
                {{ $car->details->ModelName ?? 'Модель не вказана' }}
            </h2>
            
            <p class="h4 text-dark mb-5">
                Рік випуску: <span class="fw-bold">{{ $car->Year }}</span>
            </p>

            <div class="d-grid gap-2 mb-4">
                <button class="btn btn-success border-0 py-3 fw-bold shadow-sm" style="background-color: #198754; border-radius: 10px; font-size: 1.4rem;">
                    Забронювати це авто
                </button>
            </div>

            <a href="{{ route('cars.index') }}" class="text-primary text-decoration-none fs-5 fw-medium">
                Повернутися до каталогу
            </a>
        </div>
    </div>
</div>
@endsection