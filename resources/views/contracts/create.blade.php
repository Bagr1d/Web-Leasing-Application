@extends('layouts.app')

@section('content')
    <h1>Add Contract</h1>
    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">User</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="offer_id">Offer</label>
            <select class="form-control" id="offer_id" name="offer_id" required>
                @foreach($offers as $offer)
                    <option value="{{ $offer->id }}">{{ $offer->offer_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="total_cost">Total Cost</label>
            <input type="number" class="form-control" id="total_cost" name="total_cost" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Contract</button>
    </form>
@endsection
