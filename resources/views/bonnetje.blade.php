@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="{{asset('js/jspdf.min.js')}}"></script>
    <div class="container">
        <a href="/bon" class="btn btn-secondary">← Ga terug</a><br><br>
        <div class="card">
            <div class="card-header">
                <h3 style="margin-bottom: 0; float: left;">Bonnetje</h3>
                <img id="gen-pdf" style="float: right; cursor: pointer;" src="/storage/img/pdf-download.png" width="30"
                     height="30">

            </div>
            <div class="card-body">
                <p>Tafel: {{$bon->tafel_id}}</p>
                <p>Datum: {{$bon->datum}}</p>
                <p>Tijd: {{$bon->tijd}}</p>
                <table style="text-align: center;" class="table">
                    <tbody>
                    @foreach($bestellingen as $bestelling)
                        @if($bestelling->archief == true)
                            <form id="bon" action="{{url('/store/bon/'.$bestelling->tafel_id)}}" method="POST">
                                @csrf
                                <tr>
                                    <td>{{$bestelling->productAantal}}x</td>
                                    <td>{{$bestelling->naam}}</td>
                                    <td>€ {{number_format($bestelling->prijs, 2) / $bestelling->productAantal}}</td>
                                    <td>€ {{number_format($bestelling->prijs, 2)}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </form>
                    </tbody>
                </table>
                <p>Totaal: € {{number_format($totaal, 2)}}</p>
                <p>Betaald: € {{number_format($bon->betaald, 2)}}</p>
                <p>Terug: € {{number_format(($bon->betaald - $totaal), 2)}}</p>
            </div>
        </div>
    </div>
    <script>
        var doc = new jsPDF();
        $('#gen-pdf').click(function () {
            doc.fromHTML($('.card-body').html(), 15, 15, {
                'width': 170,
            });
            doc.save('Bon:{{$bon->id}}');
        });
    </script>
@endsection
