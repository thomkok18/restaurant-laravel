@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/reservering.css') }}">
    <div class="container">
        <a href="/" class="btn btn-secondary">← Ga terug</a><br><br>
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0;">Reserveringen</h3>
            </div>
            <div class="card-body">
                @if(count($reserveringen) > 0)

                    <table style="text-align: center;" class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tafel</th>
                            <th scope="col">Voornaam</th>
                            <th scope="col">Tussenvoegsels</th>
                            <th scope="col">Achternaam</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Tijd</th>
                            <th scope="col">Aantal personen</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reserveringen as $reservering)
                            <tr id="{{$reservering->id}}" onclick="reservering({{$reservering->tafel_id}})">
                                <td>{{$reservering->tafel_id}}</td>
                                <td>{{$reservering->voornaam}}</td>
                                <td>{{$reservering->tussenvoegsels}}</td>
                                <td>{{$reservering->achternaam}}</td>
                                <td>{{$reservering->datum}}</td>
                                <td>{{$reservering->tijd}}</td>
                                <td>{{$reservering->aantalPersonen}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                @else
                    <div>
                        Er zijn geen reserveringen gevonden.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function reservering(id) {
            window.location = '/bestelling/' + id;
        }
    </script>
@endsection
