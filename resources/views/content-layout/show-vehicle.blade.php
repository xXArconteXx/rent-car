@extends('layout')

@section('content')
    <div class="card product_content" style="width: 75%; margin:auto;">
        <img src='{{ URL::asset("$vehicle->image") }}'>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span style="text-shadow: 1px 1px 1px black;">Modelo: </span> {{ $vehicle->model }}</li>
                <li class="list-group-item"><span style="text-shadow: 1px 1px 1px black;">Descripcion: </span> {{ $vehicle->description }}</li>
                <li class="list-group-item"><span style="text-shadow: 1px 1px 1px black;">Seats: </span> {{ $vehicle->seats }}</li>
                <li class="list-group-item"><span style="text-shadow: 1px 1px 1px black;">Price: </span> {{ $vehicle->price }}€</li>
            </ul>
        </div>
        <a style="margin: auto" href='{{ url("content-layout/form?id=$vehicle->id") }}'>
            <button type="button" class="btn btn-outline-dark">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-basket3-fill" viewBox="0 0 16 16">
                    <path
                        d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z">
                    </path>
                </svg>
                <span class="visually-hidden">Button</span>
            </button>
        </a>
    </div>
@endsection
