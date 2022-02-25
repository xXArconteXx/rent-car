@extends('layout')

@section('content')
    <div class="container">
        <h1>MY RENTINGS</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Vehicle ID</th>
                    <th scope="col">Date Start</th>
                    <th scope="col">Date End</th>
                    <th scope="col">Date Give</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rents as $rent)
                    <tr>
                        <th scope="row">{{ $rent->id }}</th>
                        <td>{{ $rent->user->email }}</td>
                        <td>{{ $rent->vehicle_id }}</td>
                        <td>{{ $rent->date_start }}</td>
                        <td>{{ $rent->date_end }}</td>
                        <td>{{ $rent->date_give }}</td>
                        <td>{{ $rent->cost }}</td>
                        <td>{{ $rent->status }}</td>
                    </tr>
                @endforeach
        </table>
    </div>
@endsection
