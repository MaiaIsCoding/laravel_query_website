@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Resultados</h1>
            <br/><br/>
            <table class="table table-bordered">
                <tr>
                    <th>Carro</th>
                    <th>Quilometragem</th>
                    <th>Ano</th>
                    <th>Combustivel</th>
                    <th>Cambio</th>
                    <th>Portas</th>
                    <th>Cor</th>
                    <th>Link</th>
                </tr>
                @for ($i = 0; $i < sizeof($result); $i++)
                <tr>
                    <td>{{  strip_tags($result[$i][6])  }}</td>
                    <td>{{  strip_tags($result[$i][1])  }}</td>
                    <td>{{  strip_tags($result[$i][0])  }}</td>
                    <td>{{  strip_tags($result[$i][2])  }}</td>
                    <td>{{  strip_tags($result[$i][3])  }}</td>
                    <td>{{  strip_tags($result[$i][4])  }}</td>
                    <td>{{  strip_tags($result[$i][5])  }}</td>
                    <td>{{  strip_tags($result[$i][8])  }}</td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection