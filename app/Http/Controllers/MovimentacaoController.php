<?php

namespace App\Http\Controllers;

use App\Models\Movimentacao;
use App\Models\Produto;
use Illuminate\Http\Request;

class MovimentacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movimentacoes = Movimentacao::with('produto')->latest()->get();
        return view('movimentacoes.index', compact('movimentacoes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::all();
        return view('movimentacoes.create', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo' => 'required|in:entrada,saida',
            'quantidade' => 'required|numeric|min:0',
            'data' => 'required|date',
            'motivo' => 'nullable|string|max:255',
            'observacao' => 'nullable|string'
        ]);

        $movimentacao = Movimentacao::create($request->all());

        // Atualizar quantidade em estoque do produto
        $produto = Produto::findOrFail($request->produto_id);
        if ($request->tipo === 'entrada') {
            $produto->quantidade_estoque += $request->quantidade;
        } else {
            $produto->quantidade_estoque -= $request->quantidade;
        }
        $produto->save();

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação registrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $movimentacao = Movimentacao::with('produto')->findOrFail($id);
        return view('movimentacoes.show', compact('movimentacao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movimentacao = Movimentacao::findOrFail($id);
        $produtos = Produto::all();
        return view('movimentacoes.edit', compact('movimentacao', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'tipo' => 'required|in:entrada,saida',
            'quantidade' => 'required|numeric|min:0',
            'data' => 'required|date',
            'motivo' => 'nullable|string|max:255',
            'observacao' => 'nullable|string'
        ]);

        $movimentacao = Movimentacao::findOrFail($id);
        $produto = Produto::findOrFail($request->produto_id);

        // Reverter a movimentação anterior
        if ($movimentacao->tipo === 'entrada') {
            $produto->quantidade_estoque -= $movimentacao->quantidade;
        } else {
            $produto->quantidade_estoque += $movimentacao->quantidade;
        }

        // Aplicar a nova movimentação
        if ($request->tipo === 'entrada') {
            $produto->quantidade_estoque += $request->quantidade;
        } else {
            $produto->quantidade_estoque -= $request->quantidade;
        }

        $produto->save();
        $movimentacao->update($request->all());

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movimentacao = Movimentacao::findOrFail($id);
        $produto = $movimentacao->produto;

        // Reverter a movimentação
        if ($movimentacao->tipo === 'entrada') {
            $produto->quantidade_estoque -= $movimentacao->quantidade;
        } else {
            $produto->quantidade_estoque += $movimentacao->quantidade;
        }

        $produto->save();
        $movimentacao->delete();

        return redirect()->route('movimentacoes.index')
            ->with('success', 'Movimentação excluída com sucesso.');
    }
}
