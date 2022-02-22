@extends('layout')

@section('content')
    <h1 style="text-align: center;">Rent User: {{ $rent->id }}</h1>
    <div class="container">
        <form method="POST" action="{{ route('rent.update', $rent->id) }}">
            <div class="container">
                @csrf
                <div>
                    <label for="date_start">Date Start:</label>
                    <input type="text" id="date_start" name="date_start" value="{{ $rent->date_start }}">
                </div>
                <div>
                    <label for="date_end">Date End:</label>
                    <input type="text" id="date_end" name="date_end" value="{{ $rent->date_end }}">
                </div>
                <div>
                    <label for="date_give">Date Give:</label>
                    <input type="text" id="date_give" name="date_give" value="{{ $rent->date_give }}">
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
