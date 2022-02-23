@extends('layout')
@section('content')
    <h1 style="text-align: center;">Create Vehicle:</h1>
    <div class="container">
        <form method="POST" action="{{ route('vehicle.store') }}">
            @csrf
            <div>
                <label for="number_plate">Number Plate:</label>
                <input type="text" id="number_plate" name="number_plate">
            </div>
            <div>
                <label for="model">Model:</label>
                <input type="text" id="model" name="model">
            </div>
            <div>
                <label for="categproes_id">Category ID:</label>
                <input type="text" id="categproes_id" name="categproes_id">
            </div>
            <div>
                <label for="description">Description:</label>
                <input type="text" id="description" name="description">
            </div>
            <div>
                <label for="seats">Seats:</label>
                <input type="text" id="seats" name="seats">
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price">
            </div>
            <div>
                <label for="availability">Availability:</label>
                <input type="text" id="availability" name="availability">
            </div>
            <div>
                <label for="image">Image:</label>
                <input type="text" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-success">
                Confirm
            </button>
            <button type="reset" class="btn btn-danger">
                Reset
            </button>
        </form>
    </div>
@endsection
