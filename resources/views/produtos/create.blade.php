@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Novo Produto</h1>
        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="unidade_medida" class="form-label">Unidade de Medida</label>
            <input type="text" class="form-control @error('unidade_medida') is-invalid @enderror" id="unidade_medida" name="unidade_medida" value="{{ old('unidade_medida') }}" required>
            @error('unidade_medida')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade_estoque" class="form-label">Quantidade em Estoque</label>
            <input type="number" step="0.01" class="form-control @error('quantidade_estoque') is-invalid @enderror" id="quantidade_estoque" name="quantidade_estoque" value="{{ old('quantidade_estoque') }}" required>
            @error('quantidade_estoque')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantidade_minima" class="form-label">Quantidade Mínima</label>
            <input type="number" step="0.01" class="form-control @error('quantidade_minima') is-invalid @enderror" id="quantidade_minima" name="quantidade_minima" value="{{ old('quantidade_minima') }}" required>
            @error('quantidade_minima')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection 