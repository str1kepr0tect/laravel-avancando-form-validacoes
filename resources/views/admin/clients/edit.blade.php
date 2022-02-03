@extends('layouts.layout')

@section('content')
    <h3>Editar Cliente {{ $client->name }}</h3>
    @include('form_helpers._form_errors')
    <form method="post" action="{{ route('clients.update', ['client' => $client->id]) }}">

        {{ method_field('PUT')}}

        @include('admin.clients._form')
        <button type="submit" class="btn btn-primary">Salvar</button> <a class="btn btn-outline-primary" href="{{ route('clients.index') }}">Voltar</a>
    </form>






@endsection
