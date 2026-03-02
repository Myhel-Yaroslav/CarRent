@props(['numberPlate', 'year', 'status'])

<div class="card h-100 shadow-sm border-0">
    <div class="card-body text-center">
        <h5 class="card-title fw-bold text-primary">{{ $numberPlate }}</h5>
        <p class="card-text text-secondary">Рік випуску: {{ $year }}</p>
        <p class="badge bg-info text-dark">{{ $status }}</p>
        <a href="{{ route('cars.show', $numberPlate) }}" class="btn btn-outline-primary w-100 mt-2">Перегляд автомобілю</a>
    </div>
</div>