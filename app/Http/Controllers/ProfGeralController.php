<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cbo;
use Illuminate\Support\Facades\Response;
use App\Models\Municipio;
use App\Models\Estado;
use App\Models\ProfGeral;
use Session;

class ProfGeralController extends Controller
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


        $pessoa = Session::get('pessoa');
        $curProf = ProfGeral::where([
            ['pessoa', '=', $pessoa->id]
        ])->first();

         if($curProf!=null){
            $profGeral = $curProf;
            $munObj = Municipio::find($profGeral->municipio);

            $cbos = Cbo::all();
            $arrayCbos = Array();
            foreach($cbos as $cbo){
                $arrayCbos[$cbo->codigo] = $cbo->nome;
            }

            $estados = Estado::all();
            $arrayEstados = Array();
            foreach($estados as $estado){
                $arrayEstados[$estado->id] = $estado->descricao;
            }

            $municipios = Municipio::all();
            $arrayMun = Array();
            foreach($municipios as $mun){
                $arrayMun[$mun->ibge] = $mun->nome;
            }

            //return the view and pass in the var previously created
            return view('profGeral.edit')->with([
                'profGeral' => $profGeral,
                'cbos' => $arrayCbos,
                'estados' => $arrayEstados,
                'municipios' => $municipios,
                'arrayCbos' => $arrayCbos,
                'arrayEstados' => $arrayEstados,
                'arrayMun' => $arrayMun,
                'currEstado' => $munObj->uf
            ]);
        }

        $cbos = Cbo::all();
        $arrayCbos = Array();
        foreach($cbos as $cbo){
            $arrayCbos[$cbo->codigo] = $cbo->nome;
        }

        $estados = Estado::all();
        $arrayEstados = Array();
        foreach($estados as $estado){
            $arrayEstados[$estado->id] = $estado->descricao;
        }

        $municipios = Municipio::all();

        return view('profGeral.create')->with([
            'cbos' => $arrayCbos,
            'estados' => $arrayEstados,
            'municipios' => $municipios
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
        $profGeral = new ProfGeral;

        $pessoa = Session::get('pessoa');

        $curProf = ProfGeral::where([
            ['pessoa', '=', $pessoa->id]
        ])->first();

        if($curProf!=null){
            $profGeral = $curProf;
        }

        $profGeral->pessoa = $pessoa->id;
        $profGeral->cbo = $request->cbo;
        $profGeral->municipio = $request->municipio;

        if(strlen($profGeral->cbo)==1){
            $profGeral->cbo = '00000' . $profGeral->cbo;
        }
        else if(strlen($profGeral->cbo)==5){
            $profGeral->cbo = '0' . $profGeral->cbo;
        }

        $profGeral->save();

         //message success
        Session::flash('success', 'Profissao cadastrada com sucesso!');
        Session::put('profGeral', $profGeral);

        //redirect
        return redirect()->route('profGeral.show', $profGeral->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profGeral = ProfGeral::find($id);
        $cbo = Cbo::find($profGeral->cbo);
        $mun = Municipio::find($profGeral->municipio);
        return view('profGeral.show')->with([
            'profGeral' => $profGeral,
            'cbo' => $cbo,
            'mun' => $mun
        ]);
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
        $profGeral = ProfGeral::find($id);
        $munObj = Municipio::find($profGeral->municipio);

        $cbos = Cbo::all();
        $arrayCbos = Array();
        foreach($cbos as $cbo){
            $arrayCbos[$cbo->codigo] = $cbo->nome;
        }

        $estados = Estado::all();
        $arrayEstados = Array();
        foreach($estados as $estado){
            $arrayEstados[$estado->id] = $estado->descricao;
        }

        $municipios = Municipio::all();
        $arrayMun = Array();
        foreach($municipios as $mun){
            $arrayMun[$mun->ibge] = $mun->nome;
        }

        //return the view and pass in the var previously created
        return view('profGeral.edit')->with([
            'profGeral' => $profGeral,
            'cbos' => $arrayCbos,
            'estados' => $arrayEstados,
            'municipios' => $municipios,
            'arrayCbos' => $arrayCbos,
            'arrayEstados' => $arrayEstados,
            'arrayMun' => $arrayMun,
            'currEstado' => $munObj->uf
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
        $profGeral = ProfGeral::find($id);

        $pessoa = Session::get('pessoa');
        $profGeral->pessoa = $pessoa->id;
        $profGeral->cbo = $request->cbo;
        $profGeral->municipio = $request->municipio;

        if(strlen($profGeral->cbo)==1){
            $profGeral->cbo = '00000' . $profGeral->cbo;
        }
        else if(strlen($profGeral->cbo)==5){
            $profGeral->cbo = '0' . $profGeral->cbo;
        }

        $profGeral->save();

         //message success
        Session::flash('success', 'Profissao atualizada com sucesso!');

        //redirect
        return redirect()->route('profGeral.show', $profGeral->id);
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

    public function getCbos(Request $request) {
        $param = $request->get('search');
        $result = Cbo::where('nome', 'like', '%' . $param . '%')->get();

        return response()->json(['response' => $result]);
    }
}
