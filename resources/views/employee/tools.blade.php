@extends('layouts.app')

@section('content')
    <section class="page-section bg-light" id="login">
        <sec class="container">
            <div class="container">
                <h1>Narzędzia dla pracowników</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('cars.create') }}" class="btn btn-primary">Dodaj nowy pojazd</a>

                <h2>Rezerwacje</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Samochód</th>
                        <th>Użytkownik</th>
                        <th>Data rozpoczęcia</th>
                        <th>Data zakończenia</th>
                        <th>Status</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->car->brand }} {{ $reservation->car->model }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->start_date }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->status }}</td>
                            <td>
                                <form action="{{ route('employee.reservations.updateStatus', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('POST')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Oczekująca</option>
                                        <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Potwierdzona</option>
                                        <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Anulowana</option>
                                    </select>
                                </form>

                                <form action="{{ route('employee.reservations.delete', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <h2>Pojazdy</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Marka</th>
                        <th>Model</th>
                        <th>Rok</th>
                        <th>Kolor</th>
                        <th>Cena za dzień</th>
                        <th>Akcje</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->year }}</td>
                            <td>{{ $car->color }}</td>
                            <td>{{ $car->price_per_day }}</td>
                            <td>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </sec></section>
@endsection
