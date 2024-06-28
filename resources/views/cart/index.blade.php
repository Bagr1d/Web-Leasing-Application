@extends('layouts.app')

@section('content')
    <h1>My Leasings</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Offer Name</th>
                <th>Monthly Payment</th>
                <th>Lease Term</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                @if($item->offer)
                    <tr>
                        <td>{{ $item->offer->offer_name }}</td>
                        <td>{{ $item->offer->monthly_payment }}</td>
                        <td>{{ $item->offer->lease_term }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if($item->status == 'pending')
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="5">This offer is no longer available.</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
