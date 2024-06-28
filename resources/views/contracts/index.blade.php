@extends('layouts.app')

@section('content')
    <h1>Leasing Contracts</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Offer Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
                @auth
                    @if(Auth::user()->is_admin)
                        <th>Actions</th>
                    @endif
                @endauth
            </tr>
        </thead>
        <tbody>
            @foreach($contracts as $contract)
                <tr>
                    <td>{{ $contract->id }}</td>
                    <td>{{ $contract->user->name }}</td>
                    <td>{{ optional($contract->offer)->offer_name ?? 'Offer not available' }}</td>
                    <td>{{ $contract->start_date }}</td>
                    <td>{{ $contract->end_date }}</td>
                    <td>{{ $contract->total_cost }}</td>
                    @auth
                        @if(Auth::user()->is_admin)
                            <td>
                                <a href="{{ route('contracts.edit', $contract->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline-block;">
                                </form>
                            </td>
                        @endif
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
