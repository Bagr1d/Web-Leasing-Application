@extends('layouts.app')

@section('content')
    <h1>Offers</h1>
    @auth
        @if(Auth::user()->is_admin)
            <a href="{{ route('offers.create') }}" class="btn btn-primary">Add Offer</a>
        @endif
    @endauth
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Car</th>
                <th>Offer Name</th>
                <th>Monthly Payment</th>
                <th>Lease Term</th>
                @auth
                    @if(Auth::user()->is_admin)
                        <th>Actions</th>
                    @endif
                @endauth
                @auth
                    @if(!Auth::user()->is_admin)
                        <th>Book Offer</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $offer)
                @if(!$offer->reserved)
                    <tr>
                        <td>{{ $offer->id }}</td>
                        <td>{{ $offer->car->make }} {{ $offer->car->model }}</td>
                        <td>{{ $offer->offer_name }}</td>
                        <td>{{ $offer->monthly_payment }}</td>
                        <td>{{ $offer->lease_term }}</td>
                        @auth
                            @if(Auth::user()->is_admin)
                                <td>
                                    <a href="{{ route('offers.edit', $offer->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('offers.destroy', $offer->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            @endif
                            @if(!Auth::user()->is_admin)
                                <td>
                                    <form action="{{ route('cart.add', $offer->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Book Offer</button>
                                    </form>
                                </td>
                            @endif
                        @endauth
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
