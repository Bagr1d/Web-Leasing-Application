@extends('layouts.app')

@section('content')
    <h1>Manage New Contracts</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table mt-4">
        <thead>
            <tr>
                <th>User</th>
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
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->offer->offer_name }}</td>
                        <td>{{ $item->offer->monthly_payment }}</td>
                        <td>{{ $item->offer->lease_term }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if($item->status == 'pending')
                                <form action="{{ route('cart.approve', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Approve</button>
                                </form>
                                <form action="{{ route('cart.reject', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Reject</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="6">This offer is no longer available.</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
