@props(['id', 'brand', 'model', 'year'])

<div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
    <div class="card-body text-center p-4">
        <h5 class="card-title fw-bold text-dark mb-2">
            {{ $brand }} {{ $model }}
        </h5>
        
        <p class="card-text text-secondary mb-4">Рік випуску: <strong>{{ $year }}</strong></p>
        
        <a href="{{ route('cars.show', $id) }}" class="btn btn-outline-primary w-100 py-2" style="border-radius: 8px; font-weight: 500;">
            Перегляд автомобілю
        </a>
    </div>
</div>