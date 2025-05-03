@extends('layouts.app')

@section('title', 'Editar Movimentação')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Editar Movimentação</h1>
        <a href="{{ route('movimentacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <form action="{{ route('movimentacoes.update', $movimentacao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select class="form-select @error('produto_id') is-invalid @enderror" id="produto_id" name="produto_id" required>
                <option value="">Selecione um produto</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ old('produto_id', $movimentacao->produto_id) == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }} (Estoque: {{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }})
                    </option>
                @endforeach
            </select>
            @error('produto_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                <option value="">Selecione o tipo</option>
                <option value="entrada" {{ old('tipo', $movimentacao->tipo) == 'entrada' ? 'selected' : '' }}>Entrada</option>
                <option value="saida" {{ old('tipo', $movimentacao->tipo) == 'saida' ? 'selected' : '' }}>Saída</option>
            </select>
            @error('tipo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" step="0.01" class="form-control @error('quantidade') is-invalid @enderror" id="quantidade" name="quantidade" value="{{ old('quantidade', $movimentacao->quantidade) }}" required>
            @error('quantidade')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control @error('data') is-invalid @enderror" id="data" name="data" value="{{ old('data', $movimentacao->data->format('Y-m-d')) }}" required>
            @error('data')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo</label>
            <input type="text" class="form-control @error('motivo') is-invalid @enderror" id="motivo" name="motivo" value="{{ old('motivo', $movimentacao->motivo) }}">
            @error('motivo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="observacao" class="form-label">Observação</label>
            <textarea class="form-control @error('observacao') is-invalid @enderror" id="observacao" name="observacao" rows="3">{{ old('observacao', $movimentacao->observacao) }}</textarea>
            @error('observacao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection 