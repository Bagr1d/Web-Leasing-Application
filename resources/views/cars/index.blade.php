@extends('layouts.app')

@section('content')
    <h1>Cars</h1>
    @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('cars.create') }}" class="btn btn-primary">Add Car</a>
        @endif
    @endauth
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>Price</th>
                @auth
                    @if(Auth::user()->is_admin)
                        <th>Actions</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->price }}</td>
                    @auth
                        @if(Auth::user()->is_admin)
                            <td>
                                <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
