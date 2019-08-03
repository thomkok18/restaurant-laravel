@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="/" class="btn btn-secondary">← Ga terug</a><br><br>
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0;">Bestelling</h3>
            </div>
            <div class="card-body">

                @if(count($bestellingen) > 0)
                    <table style="text-align: center;" class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Tafel gaat betalen</th>
                            <th scope="col">Naam</th>
                            <th scope="col">Prijs</th>
                            <th scope="col">Aantal producten</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bestellingen as $bestelling)
                            @if($bestelling->archief == false)
                                <form id="bon" action="{{url('/store/bon/'.$bestelling->tafel_id)}}"
                                      method="POST">
                                    @csrf
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary">{{$bestelling->tafel_id}}</button>
                                        </td>
                                        <td>{{$bestelling->naam}}</td>
                                        <td>€ {{number_format($bestelling->prijs, 2)}}</td>
                                        <td>{{$bestelling->productAantal}}</td>
                                        <input hidden name="tafel" value="{{$bestelling->tafel_id}}">
                                        <input hidden name="created" value="{{$bestelling->created_at}}">
                                    </tr>
                                    @endif
                                    @endforeach
                                </form>
                        </tbody>
                    </table>
                @else
                    <div>
                        Er zijn geen bestellingen gevonden.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
