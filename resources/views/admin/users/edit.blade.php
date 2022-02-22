@extends('layout')

@section('content')
<h1 style="text-align: center;">User: {{$user->id}}</h1>
<div class="container">
    <form method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{$user->name}}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{$user->email}}">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="{{$user->password}}">
        </div>

        {{-- <input type="hidden" name="vehicle_id" value="{{request()->id}}"> --}}
        <button type="submit" class="btn btn-success">
            Confirm
        </button>
        <button type="reset" class="btn btn-danger">
            Reset
        </button>
    </form>
</div>
@endsection
