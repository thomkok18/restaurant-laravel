@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{route('reserveringen')}}" class="btn btn-secondary">← Ga terug</a><br><br>
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0;">Bestelling maken</h3>
            </div>
            <div class="card-body">
                <form id="bestelling" action="{{url('/store/bestelling')}}" method="POST">@csrf</form>

                    @if(count($producten) > 0)
                        <table style="text-align: center;" class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Prijs</th>
                                <th scope="col">Aantal</th>
                            </tr>
                            </thead>
                            <tbody id="producten">
                            @foreach($producten as $product)
                                <tr>
                                    <td form="bestelling">{{$product->naam}}</td>
                                    <td><form id="prijs" action="{{url('/update/product/'.$product->id)}}" method="POST">
                                            @csrf
                                            <input class="form-control" type="text" name="bedrag" value="{{number_format($product->prijs, 2)}}">
                                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                                        </form>
                                        </td>
                                    <td><input form="bestelling" class="form-control" type="number" name="aantal_{{$product->id}}" value="0"></td>
                                    <input form="bestelling" hidden name="naam_{{$product->id}}" value="{{$product->naam}}">
                                    <input form="bestelling" hidden name="prijs_{{$product->id}}" value="{{number_format($product->prijs, 2)}}">
                                    <input form="bestelling" hidden name="prijs_{{$product->id}}" value="{{number_format($product->prijs, 2)}}">
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <input form="bestelling" hidden name="tafel" value="{{$tafel}}">
                        <button onclick="bestelling()" type="submit" class="btn btn-primary">Verzenden</button>
                    @else
                        <div id="geenProducten">
                            Er zijn geen producten gevonden.
                        </div>
                    @endif
            </div>
        </div>
    </div>
    <script>
        function bestelling() {
            document.getElementById('bestelling').submit();
        }
    </script>
@endsection
