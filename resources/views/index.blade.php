@extends('layouts.app')

@section('title', 'Головна - CarRent')

@section('content')
    <div class="text-center mb-5">
        <h1 class="fw-bold display-4">Наш автопарк</h1>
        <p class="text-muted fs-5">Оберіть кращий автомобіль для вашої поїздки</p>
    </div>
<!-- Головна сторінка -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($cars as $id => $car)
            <div class="col">
                <x-card 
                    :id="$id" 
                    :brand="$car['brand']" 
                    :model="$car['model']" 
                    :year="$car['year']" 
                />
            </div>
        @endforeach
    </div>
@endsection