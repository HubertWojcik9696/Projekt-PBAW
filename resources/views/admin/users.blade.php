@extends('layouts.app')

@section('content')
    <section class="page-section bg-light" id="login">
        <sec class="container">
    <div class="container">
        <h1>Lista użytkowników</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Imię</th>
                <th>Email</th>
                <th>Rola</th>
                <th>Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if ($user->role == 'user')
                            <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Ustaw jako Pracownik</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        </sec></section>
@endsection
