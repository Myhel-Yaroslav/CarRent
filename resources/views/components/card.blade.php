@props(['id', 'brand', 'model', 'year'])

<div class="card h-100 shadow-sm border-0">
    <div class="card-body text-center">
        <h5 class="card-title fw-bold text-dark">{{ $brand }} {{ $model }}</h5>
        <p class="card-text text-secondary">Рік випуску: {{ $year }}</p>
        <a href="/cars/{{ $id }}" class="btn btn-outline-primary w-100">Перегляд автомобілю</a>
    </div>
</div>