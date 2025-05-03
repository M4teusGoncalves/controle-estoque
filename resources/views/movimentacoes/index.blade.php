@extends('layouts.app')

@section('title', 'Movimentações')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Movimentações</h1>
        <a href="{{ route('movimentacoes.create') }}" class="btn btn-primary">Nova Movimentação</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Quantidade</th>
                    <th>Motivo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movimentacoes as $movimentacao)
                    <tr>
                        <td>{{ $movimentacao->data->format('d/m/Y') }}</td>
                        <td>{{ $movimentacao->produto->nome }}</td>
                        <td>{{ $movimentacao->tipo === 'entrada' ? 'Entrada' : 'Saída' }}</td>
                        <td>{{ $movimentacao->quantidade }}</td>
                        <td>{{ $movimentacao->motivo }}</td>
                        <td>
                            <a href="{{ route('movimentacoes.show', $movimentacao->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('movimentacoes.edit', $movimentacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('movimentacoes.destroy', $movimentacao->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta movimentação?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 