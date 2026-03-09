@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Панель керування</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $stats['total'] }}</h3>
                    <p>Авто в базі</p>
                </div>
                <div class="icon"><i class="fas fa-car"></i></div>
                <a href="{{ route('admin.cars.index') }}" class="small-box-footer">Детальніше <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop