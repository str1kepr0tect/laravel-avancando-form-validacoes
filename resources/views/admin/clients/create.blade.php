@extends('layouts.layout')

@section('content')
    <h3>Novo Cliente</h3>
    <h4>{{$clientType == \App\Models\Client::TYPE_INDIVIDUAL ? 'Pessoa Física' : 'Pessoa Jurídica'}}</h4>
    <a href="{{route('clients.create', ['client_type' => \App\Models\Client::TYPE_INDIVIDUAL])}}"> Pessoa Física</a> |
    <a href="{{route('clients.create', ['client_type' => \App\Models\Client::TYPE_LEGAL])}}"> Pessoa Jurídica</a>
    @include('form_helpers._form_errors')
    <form method="post" action="{{ route('clients.store')}}">
        {{csrf_field()}}
        @include('admin.clients._form')

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>






@endsection
