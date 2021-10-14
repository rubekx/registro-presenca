<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Session;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pessoa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nome'  => 'required|min:2|max:20',
            'sobrenome' => 'required|min:2|max:100',
            'cpf' => 'required|cpf|unique:pessoa',
            'email' => 'required|email|min:5|unique:pessoa',
            'celular' => 'digits_between:5,20'
        ]);

        $pessoa = new Pessoa;
        $pessoa->nome = $request->nome;
        $pessoa->sobrenome = $request->sobrenome;
        $pessoa->cpf = str_replace([" ", ".", "-"], "", $request->cpf);
        $pessoa->email = $request->email;
        $pessoa->celular = $request->celular;
        $pessoa->sexo = $request->sexo;

        $pessoa->save();

         //message success
        Session::flash('success', 'Pessoa cadastrada com sucesso!');
        Session::put('pessoa', $pessoa);

        //redirect
        return redirect()->route('pessoa.show', $pessoa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::find($id);
        return view('pessoa.show')->withPessoa($pessoa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as var
        $pessoa = Pessoa::find($id);

        //return the view and pass in the var previously created
        return view('pessoa.edit')->withPessoa($pessoa);
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
        $this->validate($request, [
        // $validator = Validator::make($request->all(), [
            'nome'  => 'required|min:2|max:20',
            'sobrenome' => 'required|min:2|max:100',
            // 'cpf' => 'required|cpf|unique:pessoa,id,' . $id,
            'cpf' => [
                'required',
                'cpf',
                Rule::unique('pessoa')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('pessoa')->ignore($id),
            ],
            'celular' => 'digits_between:5,20',
        ]);

        $pessoa = Pessoa::find($id);

        $pessoa->nome = $request->nome;
        $pessoa->sobrenome = $request->sobrenome;
        $pessoa->cpf = str_replace([" ", ".", "-"], "", $request->cpf);
        $pessoa->email = $request->email;
        $pessoa->celular = $request->celular;
        $pessoa->sexo = $request->sexo;

        $pessoa->save();

         //message success
        Session::flash('success', 'Pessoa cadastrada com sucesso!');

        //redirect
        return redirect()->route('pessoa.show', $pessoa->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
