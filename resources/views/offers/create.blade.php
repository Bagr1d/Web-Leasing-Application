@extends('layouts.app')

@section('content')
    <h1>Add Offer</h1>
    <form action="{{ route('offers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="car_id">Car</label>
            <select class="form-control" id="car_id" name="car_id" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->make }} {{ $car->model }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offer_name">Offer Name</label>
            <input type="text" class="form-control" id="offer_name" name="offer_name" required>
        </div>
        <div class="form-group">
            <label for="monthly_payment">Monthly Payment</label>
            <input type="number" class="form-control" id="monthly_payment" name="monthly_payment" required>
        </div>
        <div class="form-group">
            <label for="lease_term">Lease Term</label>
            <input type="number" class="form-control" id="lease_term" name="lease_term" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Offer</button>
    </form>
@endsection
