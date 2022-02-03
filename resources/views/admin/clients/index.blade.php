@extends('layouts.layout')

@section('content')


        <h3>Listar Clientes</h3>
        <br />
        <a class="btn btn-primary" href="{{ route('clients.create') }}">Novo Cliente</a>
        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CNPJ/CPF</th>
                    <th>Data Nasc.</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->document_number }}</td>
                        <td>{{ $client->date_birth }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ strtoupper($client->sex) }}</td>
                        <td>
                            <a href="{{route('clients.edit', ['client' => $client->id])}}">Editar</a> |
                            <a href="{{route('clients.show', ['client' => $client->id])}}">Ver</a> |
                            <a href="{{ route('clients.destroy', ['client' =>$client->id]) }}"
                                onclick="event.preventDefault();if(confirm('Deseja excluir esse registro?'))document.getElementById('form-delete-{{$client->id}}').submit();">Excluir</a>
                                <form id="form-delete-{{$client->id}}" style="display: none" action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{method_field('DELETE')}}
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection
