<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Inertia::render('Endereco/Index', [
            'endereco' => Endereco::where($request->id_pessoa, function ($q, $v) {
                $q->where('nome', 'like', "%{$v}%");
            })->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Endereco/Create', [
            'endereco' => new Endereco(),
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
            'tipoEndereco' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'pessoa_id' => 'required'
        ]);

        $endereco = Endereco::create([
            'tipoEndereco' => $request->tipoEndereco,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
            'pessoa_id' => $request->pessoa_id
        ]);

        return redirect()->route('pessoa.index')->withFlash("success", "Endereco successfully created.");
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
     * @param  Pessoa $pessoa
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa, int $id)
    {
        return Inertia::render('Endereco/Edit', [
            'endereco' => $pessoa->endereco()->first(),
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
            'tipoEndereco' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'cidade' => 'required'
        ]);

        Endereco::findOrFail($id)->update([
            'tipoEndereco' => $request->tipoEndereco,
            'cep' => $request->cep,
            'logradouro' => $request->logradouro,
            'numero' => $request->numero,
            'complemento' => $request->complemento,
            'bairro' => $request->bairro,
            'estado' => $request->estado,
            'cidade' => $request->cidade,
        ]);

        return redirect()->route('pessoa.index')->withFlash("success", "Endereco successfully updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Endereco::find($id)->destroy();
        return redirect()->route('pessoa.index')->withFlash("success", "Endereco successfully deleted.");
    }
}
