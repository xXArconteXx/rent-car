@extends('layout')

@section('content')
    <div class="container">
        <h1>PENALTIES</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID:</th>
                    <th scope="col">Cost:</th>
                    <th scope="col">Comments:</th>
                    <th scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penalties as $penalty)
                    <tr>
                        <th scope="row">{{ $penalty->id }}</th>
                        <td>{{ $penalty->cost }}</td>
                        <td>{{ $penalty->additional_comments }}</td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach
                <tr scope="row">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                       
                    <td>
                </tr>
        </table>
        <div class="d-flex col-12 justify-content-center">
            {{ $penalties->links() }}
        </div>
    </div>
@endsection