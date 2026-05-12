@extends('adminlte::page')

@section('title', 'Управління бронюваннями')

@section('content_header')
    <h1>Активні оренди</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">Список авто в оренді</h3>
        </div>
        
        <div class="card-body p-0">
            @if(session('success'))
                <div class="alert alert-success m-3">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger m-3">
                    {{ session('error') }}
                </div>
            @endif

            @if($activeReservations->isEmpty())
                <div class="p-4 text-center text-muted">
                    <p>Наразі немає активних оренд.</p>
                </div>
            @else
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>№ Резервації</th>
                            <th>Клієнт</th>
                            <th>Автомобіль</th>
                            <th>Номер</th>
                            <th>Початок оренди</th>
                            <th>Кінець оренди</th>
                            <th>Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activeReservations as $reservation)
                            <tr>
                                <td>#{{ $reservation->ReservationID }}</td>
                                <td>
                                    {{ $reservation->user->FirstName ?? '' }} {{ $reservation->user->LastName ?? '' }}<br>
                                    <small class="text-muted">{{ $reservation->user->Phone ?? '' }}</small>
                                </td>
                                <td>{{ $reservation->car->details->Brand ?? '' }} {{ $reservation->car->details->ModelName ?? '' }}</td>
                                <td><strong>{{ $reservation->NumberPlate }}</strong></td>
                                <td>{{ \Carbon\Carbon::parse($reservation->DateFrom)->format('d.m.Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($reservation->DateTo)->format('d.m.Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.reservations.complete', $reservation->ReservationID) }}" method="POST" onsubmit="return confirm('Ви впевнені, що клієнт повернув авто? \nМашина знову стане доступною в каталозі.');">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-check-circle"></i> Прийняти авто
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop