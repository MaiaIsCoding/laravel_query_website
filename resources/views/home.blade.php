@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Pesquisa</h1>
            <br/><br/>
            <form action= "{{ route('search') }}">
                <input type="text" name="termo" placeholder="Busca" />
                <input type="submit" value="Submit" />
            </form>
        </div>
    </div>
</div>
@endsection