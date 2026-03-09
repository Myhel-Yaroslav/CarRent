@extends('adminlte::page')

@section('title', 'Додати автомобіль')

@section('content_header')
    <h1>Реєстрація нового авто</h1>
@stop

@section('content')
<div class="card card-primary">
    <form action="{{ route('admin.cars.store') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Державний номер (NumberPlate)</label>
                <input type="text" name="NumberPlate" class="form-control @error('NumberPlate') is-invalid @enderror" value="{{ old('NumberPlate') }}" placeholder="AA1001KA">
                @error('NumberPlate') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Рік випуску</label>
                    <input type="number" name="Year" class="form-control @error('Year') is-invalid @enderror" value="{{ old('Year') }}">
                    @error('Year') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
                <div class="form-group col-md-6">
                    <label>Ціна оренди (грн)</label>
                    <input type="number" step="0.01" name="PricePerDay" class="form-control @error('PricePerDay') is-invalid @enderror" value="{{ old('PricePerDay') }}">
                    @error('PricePerDay') <span class="invalid-feedback">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="form-group">
                <label>ID Моделі (ModelID)</label>
                <input type="number" name="ModelID" class="form-control @error('ModelID') is-invalid @enderror" value="{{ old('ModelID') }}">
                @error('ModelID') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Технічний стан (Conditionn)</label>
                <input type="text" name="Conditionn" class="form-control @error('Conditionn') is-invalid @enderror" value="{{ old('Conditionn', 'Відмінний') }}">
                @error('Conditionn') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label>Статус</label>
                <select name="Status" class="form-control">
                    <option value="Available">Available</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Rented">Rented</option>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Зберегти автомобіль</button>
            <a href="{{ route('admin.cars.index') }}" class="btn btn-default">Скасувати</a>
        </div>
    </form>
</div>
@stop