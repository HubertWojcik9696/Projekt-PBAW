@extends('layouts.app')

@section('content')
    <section class="page-section bg-light" id="login">
        <sec class="container">
            <div class="container">
                <h1>Rezerwacja samochodu: {{ $car->brand }} {{ $car->model }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('reservations.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <div class="form-group">
                        <label for="start_date">Data rozpoczęcia</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="end_date">Data zakończenia</label>
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Rezerwuj</button>
                </form>
            </div>
        </sec>
    </section>
@endsection
