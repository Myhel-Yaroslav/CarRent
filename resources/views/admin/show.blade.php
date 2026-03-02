@extends('layouts.app')

@section('title', 'Керування авто - ' . $car->NumberPlate)

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white py-3">
                    <h4 class="mb-0 text-center">Керування автомобілем {{ $car->NumberPlate }}</h4>
                </div>
                <div class="card-body p-4">
                    
                    @if(session('success'))
                        <div class="alert alert-success mb-4">{{ session('success') }}</div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <p class="text-muted mb-1 text-uppercase small fw-bold">Рік випуску</p>
                            <p class="fs-5">{{ $car->Year }}</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-muted mb-1 text-uppercase small fw-bold">Поточний статус</p>
                            <span class="badge bg-info text-dark">{{ $car->Status }}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="bg-light p-4 rounded-3 mb-4">
                        <h5 class="mb-3">Зміна вартості оренди</h5>
                        <form action="{{ route('admin.cars.updatePrice', $car->NumberPlate) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <span class="input-group-text">грн/день</span>
                                <input type="number" 
                                       name="PricePerDay" 
                                       class="form-control form-control-lg" 
                                       value="{{ $car->PricePerDay }}" 
                                       step="0.01" 
                                       required>
                                <button class="btn btn-primary px-4" type="submit">Зберегти</button>
                            </div>
                            @error('PricePerDay')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </form>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <a href="{{ route('admin.cars.index') }}" class="btn btn-outline-secondary">
                            Назад до списку
                        </a>
                        
                        <form action="{{ route('admin.cars.destroy', $car->NumberPlate) }}" method="POST" onsubmit="return confirm('Ви впевнені?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger w-100">Видалити автомобіль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection