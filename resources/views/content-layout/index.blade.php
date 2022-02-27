@extends('layout')

@section('content')
    @if ($errors->any())
        <h4 style="text-align: center;">{{ $errors->first() }}</h4>
    @endif
    <div class="container_content">
        @foreach ($vehicles as $v)
            <div class="product_content accelerated box">
                <p style="text-shadow: 1px 1px 1px black;">{{ $v->model }}</p>
                <img src='{{ URL::asset("$v->image") }}'>
                <p>{{ $v->price }}€</p>
                @if ($v->available == 1)
                    <p>Available</p>
                @endif
                @if ($v->available == 0)
                    <p style="color: red;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path
                                d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                            <path
                                d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                        </svg>
                        Not Available
                    </p>
                @endif
               
                <i class="fa-solid fa-basket-shopping icon"></i>
                <a href="{{ url('content-layout/show-vehicle/' . $v->id) }}">
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
        @endforeach
        <div class="d-flex col-12 justify-content-center">
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
