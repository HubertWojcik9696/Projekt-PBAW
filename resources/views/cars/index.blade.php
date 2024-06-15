@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Dostępne Samochody</h1>
        <a href="{{ route('cars.create') }}" class="btn btn-primary mb-4">Dodaj Nowy Samochód</a>
        <div class="row">
            @foreach ($cars as $car)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title">{{ $car->brand }} {{ $car->model }}</h4>
                            <h5>{{ $car->year }}</h5>
                            <p class="card-text">
                                Kolor: {{ $car->color }}<br>
                                Cena za dzień: {{ $car->price_per_day }} PLN
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Zarezerwuj</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
