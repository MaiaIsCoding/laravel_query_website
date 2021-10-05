@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Database</h1>
            <table border="1">
            @foreach ($info_query as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->nome_veiculo}}</td>
                    <td>{{$item->quilometragem}}</td>
                    <td>{{$item->ano}}</td>
                    <td>{{$item->combustivel}}</td>
                    <td>{{$item->cambio}}</td>
                    <td>{{$item->portas}}</td>
                    <td>{{$item->cor}}</td>
                    <td>{{$item->link}}</td>
                    <td><a href="{{ route('delete_row',['id'=>$item->id]) }}" class="btn btn-warning">Delete</a></td>
                </tr>
            @endforeach
            </table>
            <br/><br/>
        </div>
    </div>
</div>
@endsection