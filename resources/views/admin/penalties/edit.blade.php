@extends('layout')

@section('content')
    <h1 style="text-align: center;">Penalty: {{ $penalty->id }}</h1>
    <div class="container">
        <form method="POST" action="{{ route('penalty.update', $penalty->id) }}">
            <div class="container">
                @csrf
                <div>
                    <label for="cost">Cost:</label>
                    <input type="text" id="cost" name="cost" value="{{ $penalty->cost }}">
                </div>
                <div>
                    <label for="additional_comments">Additional Comments:</label>
                    <input type="text" id="additional_comments" name="additional_comments" value="{{ $penalty->additional_comments }}">
                </div>
                <div>
                    <label for="rent_id">Rent ID:</label>
                    <input type="text" id="rent_id" name="rent_id" value="{{ $penalty->rent_id }}">
                    <label>Actual Time: <?= date('Y-m-d h:i:s') ?> </label>
                </div>
                <div>
                    <label for="status">Status(expectation, accepted, refused):</label>
                    <input type="text" id="status" name="status" value="{{ $penalty->status }}">
                </div>

                {{-- <input type="hidden" name="vehicle_id" value="{{request()->id}}"> --}}
                <button type="submit" class="btn btn-success">
                    Confirm
                </button>
                <button type="reset" class="btn btn-danger">
                    Reset
                </button>
            </div>
        </form>
    </div>
@endsection
