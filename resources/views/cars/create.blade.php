@extends('layouts.app')

@section('content')
    <section class="page-section bg-light" id="login">
        <sec class="container">
            <div class="container">
                <h1>Dodaj nowy pojazd</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="brand">Marka</label>
                        <input type="text" name="brand" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" name="model" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Rok produkcji</label>
                        <input type="number" name="year" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="color">Kolor</label>
                        <input type="text" name="color" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="price_per_day">Cena za dzień</label>
                        <input type="number" name="price_per_day" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Dodaj pojazd</button>
                </form>
            </div>
        </sec></section>
@endsection
