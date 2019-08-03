@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/reservering.css') }}">
    <div class="container">
        <a href="/bestellingen" class="btn btn-secondary">← Ga terug</a><br><br>
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0;">Rekening</h3>
            </div>
            <div class="card-body">
                @if(count($bonnen) > 0)
                    <table style="text-align: center;" class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tafel</th>
                            <th scope="col">Betaald</th>
                            <th scope="col">Datum</th>
                            <th scope="col">Tijd</th>
                        </thead>
                        <tbody>
                        @foreach($bonnen as $bon)
                            <tr id="{{$bon->id}}" onclick="bon({{$bon->id}})">
                                <td>{{$bon->tafel_id}}</td>
                                <td>{{number_format($bon->betaald, 2)}}</td>
                                <td>{{$bon->datum}}</td>
                                <td>{{$bon->tijd}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div>
                        Er zijn geen bonnen gevonden.
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        function bon(id) {
            window.location = '/bon/' + id;
        }
    </script>
@endsection
