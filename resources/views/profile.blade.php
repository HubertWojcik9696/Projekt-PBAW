@extends('layouts.app')

@section('content')
    <section class="page-section bg-light" id="login">
        <sec class="container">
            <div class="container">
                <h1>Profil użytkownika</h1>
                <table class="table">
                    <tr>
                        <th>Imię</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Rola</th>
                        <td>{{ Auth::user()->role }}</td>
                    </tr>
                </table>

                @if (Auth::user()->role == 'employee' || Auth::user()->role == 'admin')
                    <a href="{{ route('employee.tools') }}" class="btn btn-primary">Narzędzia dla pracowników</a>
                @endif

                @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Zarządzanie użytkownikami</a>
                @endif

                <h2>Twoje rezerwacje</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Samochód</th>
                        <th>Data rozpoczęcia</th>
                        <th>Data zakończenia</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->car->brand }} {{ $reservation->car->model }}</td>
                            <td>{{ $reservation->start_date }}</td>
                            <td>{{ $reservation->end_date }}</td>
                            <td>{{ $reservation->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </sec>
    </section>
@endsection
