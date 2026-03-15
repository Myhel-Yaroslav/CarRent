@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-5 text-center" style="font-size: 2.5rem; color: #2d3436;">Доступні автомобілі</h2>
    
    <div class="row">
        @foreach($cars as $car)
            <div class="col-md-4 mb-4">
                <x-card 
                    :id="$car->NumberPlate" 
                    :brand="$car->details->Brand ?? 'Автомобіль'" 
                    :model="$car->details->ModelName ?? $car->NumberPlate" 
                    :year="$car->Year" 
                />
            </div>
        @endforeach
    </div>
</div>
@endsection