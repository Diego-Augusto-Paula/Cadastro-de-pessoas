<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Pessoa/Index', [
            'pessoa' => Pessoa::when($request->search, function ($q, $v) {
                $q->where('nome', 'like', "%{$v}%")->orWhere('cpf', $v);
            })->with('endereco')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Pessoa/Create', [
            'pessoa' => new Pessoa(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required',
            'nomeSocial' => 'required',
            'cpf' => 'required',
            'nomePai' => 'required',
            'nomeMae' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);

        $user = Pessoa::create([
            'nome' => $request->nome,
            'nomeSocial' => $request->nomeSocial,
            'cpf' => $request->cpf,
            'nomePai' => $request->nomePai,
            'nomeMae' => $request->nomeMae,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);
        return redirect()->route('pessoa.index')->withFlash("success", "Pessoa successfully created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Pessoa/Edit', [
            'user' => Pessoa::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'nomeSocial' => 'required',
            'cpf' => 'required',
            'nomePai' => 'required',
            'nomeMae' => 'required',
            'telefone' => 'required',
            'email' => 'required',
        ]);

        $user = Pessoa::findOrFail($id)->update([
            'nome' => $request->nome,
            'nomeSocial' => $request->nomeSocial,
            'cpf' => $request->cpf,
            'nomePai' => $request->nomePai,
            'nomeMae' => $request->nomeMae,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ]);
        return redirect()->route('pessoa.index')->withFlash("success", "Pessoa successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pessoa::find($id)->destroy();
        return redirect()->route('pessoa.index')->withFlash("success", "Pessoa successfully deleted.");
    }
}
