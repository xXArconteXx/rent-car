@extends('layout')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('vehicle.update', $vehicle->id) }}">
        @csrf
        <div>
            <label for="category_id">Category ID:</label>
            <input type="text" id="category_id" name="category_id" value="{{$vehicle->category_id}}">
        </div>
        <div>
            <label for="number_plate">Number Plate:</label>
            <input type="text" id="number_plate" name="number_plate" value="{{$vehicle->number_plate}}">
        </div>
        <div>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="{{$vehicle->model}}">
        </div>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="{{$vehicle->description}}">
        </div>
        <div>
            <label for="seats">Seats:</label>
            <input type="text" id="seats" name="seats" value="{{$vehicle->seats}}">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="text" id="image" name="image" value="{{$vehicle->image}}">
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="{{$vehicle->price}}">
        </div>

        {{-- <input type="hidden" name="vehicle_id" value="{{request()->id}}"> --}}
        <button type="submit" class="btn btn-success">
            Confirm
        </button>
        <button type="reset" class="btn btn-danger">
            Reset
        </button>
    </form>
    <p id="date"></p>
</div>
@endsection