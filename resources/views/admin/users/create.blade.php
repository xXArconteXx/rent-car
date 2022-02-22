@extends('layout')
@section('content')
    <h1 style="text-align: center;">Create User:</h1>
    <div class="container">
        <form method="POST" action="{{ route('user.store') }}">
            @csrf
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="text" id="password" name="password">
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
