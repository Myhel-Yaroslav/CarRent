@extends('layouts.app')
@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($cars as $car)
        <div class="col">
            <x-card 
                :numberPlate="$car->NumberPlate" 
                :year="$car->Year" 
                :status="$car->Status" 
            />
        </div>
    @endforeach
</div>
@endsection