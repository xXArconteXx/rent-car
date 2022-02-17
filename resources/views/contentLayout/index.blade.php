@extends('layout')

@section('content')
<div class="container_content">
        @foreach ($vehicles as $v)
            <div class="product_content accelerated box">             
                <p>{{$v->model}}</p>
                <img src='{{URL::asset("$v->image")}}'>
                <p>{{$v->price}}€</p>
                <i class="fa-solid fa-basket-shopping icon"></i>
                <!-- <p>{{$v->image}}</p> -->
            </div>
        @endforeach
        <div class="d-flex col-12 justify-content-center">
            {{ $vehicles->links() }}
        </div>
</div>
@endsection