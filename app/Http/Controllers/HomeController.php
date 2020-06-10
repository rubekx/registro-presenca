<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atividade;
use App\Models\Modalidade;
use App\Models\Tipo;
use App\Models\Pessoa;
use App\Models\ProfGeral;
use App\Models\ProfSaude;
use App\Models\Cbo;
use App\Models\Endereco;
use App\Models\Municipio;
use App\Models\Estado;
use App\Models\Ubs;
use App\Models\Presenca;
use App\Models\PresencaKey;
use App\Models\Pergunta;
use App\Models\Avaliaco;
use Session;
use Log;
use Request as otherRequest;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('atividade')){
            $atividade = Session::get('atividade');
            $modalidade = Session::get('modalidade');
            $tipo = Session::get('tipo');

            return view('home')->with([
                'atividade' => $atividade,
                'modalidade' => $modalidade,
                'tipo' => $tipo
            ]);
        }

        return redirect('login');
    }

    public function getLoginPage(){
        date_default_timezone_set('America/Fortaleza');
        $today = date("Y-m-d");
        $hora  = date("H:i");
        $inicio_min = date("H:i", strtotime($hora) + 60*30);
        $termino_max = date("H:i", strtotime($hora) - 60*60*2);
        $atvs = Atividade::where([
           ['dt', '=', $today],
           ['status', '=', 2],
           ['hr_inicio', '<=', $inicio_min],
           ['hr_termino', '>=', $termino_max],
        ])->get();
        $atividades = Array();
        foreach($atvs as $a){
            $modalidade = Modalidade::find($a->modalidade);
            $tipo = Tipo::find($a->tipo);
            $tema = substr(trim($a->tema), 0, 60);
            $ret = (strlen($a->tema) > 60) ? '...' : '';
            $atividades[$a->id] = $tipo->descricao . ' - ' . $tema . $ret;
        }
        return view('auth.login')->with([
            'atividades' => $atividades
        ]);
    }

    public function getRestrictLoginPage(){
        date_default_timezone_set('America/Fortaleza');
        $today = date("Y-m-d");
        $hora  = date("H:i");
        $inicio_min = date("H:i", strtotime($hora) + 60*30);
        $termino_max = date("H:i", strtotime($hora) - 60*60*2);
        $atvs = Atividade::where([
            ['dt', '=', $today],
            ['status', '=', 2],
            ['hr_inicio', '<=', $inicio_min],
            ['hr_termino', '>=', $termino_max],
        ])->get();
        $atividades = Array();
        foreach($atvs as $a){
            $modalidade = Modalidade::find($a->modalidade);
            $tipo = Tipo::find($a->tipo);
            $tema = substr(trim($a->tema), 0, 60);
            $ret = (strlen($a->tema) > 60) ? '...' : '';
            $atividades[$a->id] = $tipo->descricao . ' - ' . $tema . $ret;
        }
        return view('restrict_login');
    }

    public function login(Request $request){
         $this->validate($request, [
            'idAtividade'  => 'required|min:1'
        ]);

	info($request);

        $id = $request->idAtividade;

        $atividade = Atividade::find($id);
        if($atividade==null){
           // $request->session()->flash('AtividadeNotFound', 'Atividade não encontrada!');
            return  view('auth.login')->with(['msg' => 'Atividade não encontrada...']);
        }
        else {
            $today = date("Y-m-d");
            $dataAtividade = $atividade->dt;

	    // if(1){
            if(strtotime($dataAtividade)==strtotime($today)){
                $modalidade = Modalidade::find($atividade->modalidade);
                $tipo = Tipo::find($atividade->tipo);

                if(!($atividade->modalidade==2&&$atividade->tipo==22))
                    return  view('restrict_login');

                $atividade->hr_inicio = substr(trim($atividade->hr_inicio), 0, 5);
                $atividade->hr_termino = substr(trim($atividade->hr_termino), 0, 5);

                Session::put('atividade', $atividade);
                Session::put('modalidade', $modalidade);
                Session::put('tipo', $tipo);

                return view('home')->with([
                    'modalidade' => $modalidade,
                    'firstSearch' => true,
                    'atividade' => $atividade,
                    'pessoa' => null,
                    'tipo' => $tipo
                ]);
            }

            return  view('auth.login')->with(['msg' => 'Atividade fora de prazo. O registro de presença deve ser feito no mesmo dia que a atividade ocorre.']);
        }

    }

    public function restrictLogin(Request $request){
         $this->validate($request, [
            'idAtividade'  => 'required|min:1'
        ]);

	info($request);


        $id = $request->idAtividade;

        $atividade = Atividade::find($id);
        if($atividade==null){
           // $request->session()->flash('AtividadeNotFound', 'Atividade não encontrada!');
            return  view('restrict_login')->with(['msg' => 'Identificador fornecido não se refere a nenhuma atividade.']);
        }
        else {
            $today = date("Y-m-d");
            $dataAtividade = $atividade->dt;

            if(strtotime($dataAtividade)==strtotime($today)){
                $modalidade = Modalidade::find($atividade->modalidade);
                $tipo = Tipo::find($atividade->tipo);

                $atividade->hr_inicio = substr(trim($atividade->hr_inicio), 0, 5);
                $atividade->hr_termino = substr(trim($atividade->hr_termino), 0, 5);

                Session::put('atividade', $atividade);
                Session::put('modalidade', $modalidade);
                Session::put('tipo', $tipo);

                return view('home')->with([
                    'modalidade' => $modalidade,
                    'firstSearch' => true,
                    'atividade' => $atividade,
                    'pessoa' => null,
                    'tipo' => $tipo
                ]);
            }

            return  view('restrict_login')->with(['msg' => 'Identificador fornecido não se refere a nenhuma atividade.']);
        }

    }

    public function getPessoa(Request $request){

	info($request);


        if(!Session::has('atividade'))
            return redirect("login");

        $search = $request->searchTag;
        $pessoa = null;

        if($search!=""){
            $found = false;
            $pessoa = Pessoa::where('email', $search)->first(); //Procurando por email
            if($pessoa!=null)
                $found = true;

            if(!$found){
                $pessoa = Pessoa::where("cpf", $search)->first(); //Procurando por cpf
                if($pessoa != null)
                    $found = true;
            }

            if($found){
                $profGeral = ProfGeral::where("pessoa", $pessoa->id)->first();
                $profSaude = ProfSaude::where("pessoa", $pessoa->id)->first();

                Session::put('pessoa', $pessoa);
                Session::put('profGeral', $profGeral);
                Session::put('profSaude', $profSaude);

                $cbo  = null;
                $resMun =  null;
                $resEst = null;
                if($profGeral!=null){
                    $cbo = Cbo::where("codigo", $profGeral->cbo)->first();
                    $resMun = Municipio::where("ibge", $profGeral->municipio)->first();
                    $resEst = Estado::where("id",  $resMun->uf)->first();
                }

                $ubs = null;
                if($profSaude!=null){
                    $ubs = Ubs::where("cnes", $profSaude->ubs)->first();
                }

                return view('informacoes')->with([
                    'firstSearch' => false,
                    'pessoa' => $pessoa,
                    'profGeral' => $profGeral,
                    'profSaude' => $profSaude,
                    'cbo' => $cbo,
                    'resMun' => $resMun,
                    'resEst' => $resEst,
                    'ubs' => $ubs
                ]);
            }
            else {

                $atividade = Session::get('atividade');
                $modalidade = Session::get('modalidade');
                $tipo = Session::get('tipo');

                return view('home')->with([
                    'firstSearch' => false,
                    'pessoa' => $pessoa,
                    'atividade' => $atividade,
                    'modalidade' => $modalidade,
                    'tipo' => $tipo
                ]);
            }
        }

        $atividade = Session::get('atividade');
        $modalidade = Session::get('modalidade');
        $tipo = Session::get('tipo');

        return view('home')->with([
            'firstSearch' => true,
            'pessoa' => $pessoa,
            'atividade' => $atividade,
            'modalidade' => $modalidade,
            'tipo' => $tipo
        ]);
    }

    public function logout(Request $request){
        Session::flush();
        return redirect('login');
    }

    public function getRegistroPage(){
         if(!Session::has('pessoa'))
            return redirect("home");

        // $ipAddress = $_SERVER['REMOTE_ADDR'];
        // if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
        //     $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
        // }

        // $ipAddress = otherRequest::ip();
        $request = otherRequest::instance();
        $request->setTrustedProxies([
            otherRequest::server('REMOTE_ADDR'),
        ]);
        $ipAddress = $request->getClientIp();

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

        return view('registrar')->with([
            'estados' => $arrayEstados,
            'municipios' => $arrayMun,
            'ip' => $ipAddress
        ]);
    }

    public function persistPresenca(Request $request){

	info($request);

        if(!Session::has('pessoa'))
            return redirect("home");

        $ip = $request->ip;
        $estado = $request->estado;
        $municipio = $request->municipio;
        $atividade = Session::get('atividade');
        $pessoa = Session::get('pessoa');
        $profSaude = Session::get('profSaude');
        $ubs = null;

        if($profSaude!=null)
            $ubs = $profSaude->ubs;

        $aux = Presenca::where([['atividade', '=', $atividade->id], ['pessoa', '=', $pessoa->id]])->first();

        if($aux!=null)
            $presenca = $aux;
        else
            $presenca = new Presenca;

        $presenca->atividade = $atividade->id;
        $presenca->pessoa = $pessoa->id;
        $presenca->local = $municipio;
        $presenca->ubs = $ubs;
        $presenca->ip = $ip;

        $presenca->save();

        $atividade = $atividade->tema;
        $pessoa = Pessoa::find($presenca->pessoa);
        $pessoa = $pessoa->nome . ' ' . $pessoa->sobrenome;
        $local = Municipio::find($presenca->local);
        $estado = Estado::find($local->uf);
        $local = $local->nome . '/' . $estado->sigla;
        if($ubs!=null)
            $ubs = Municipio::find($presenca->ubs);

	$presencaKey = new PresencaKey;
	$key = $presencaKey->where([
		['presenca', '=', $presenca->id]
	])->get()->first();

	if(sizeof($key) == 0){
		do {
			$codigo = md5(uniqid(rand(), true));
			$query = $presencaKey->where('key_auth', '=', $codigo)->get();
		} while(sizeof($query) >= 1);

		$presencaKey->presenca = $presenca->id;
		$presencaKey->key_auth = $codigo;
		$presencaKey->used = false;
		$presencaKey->save();
	}
	else {
		$presencaKey = $key;
		$codigo = $presencaKey->key_auth;
	}

       return view('comprovante')->with([
            'atividade' => $atividade,
            'pessoa' => $pessoa,
            'local' => $local,
            'ubs' => $ubs,
            'ip' => $ip,
            'aux' => $aux,
            'key' => $presencaKey->key_auth
       ]);

    }

    public function getPessoaPage(){

        $atividade = Session::get('atividade');
        $modalidade = Session::get('modalidade');
        $tipo = Session::get('tipo');

        return view('pessoa.cadastrar')->with([
            'firstSearch' => true,
            'pessoa' => null,
            'atividade' => $atividade,
            'modalidade' => $modalidade,
            'tipo' => $tipo
        ]);
    }

    // public function persistPessoa(Request $request){
    //      return view('welcome');
    //     $this->validate($request, [
    //         'nome'  => 'required|max:25',
    //         'sobrenome' => 'required|max:125',
    //         'cpf' => 'required|min:11|max:15',
    //         'email' => 'required|min:3'
    //     ]);
    // }



	public function getAvalPage(Request $request){
		$key = $request->key;
		$isValid = false;
		$msg = "";
		$perguntasGerais = array();
		$perguntasAval = array();
		$atv = null;

		$pk = new PresencaKey;
		$presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
		if(sizeof($presencaKey) >= 1){
			if(!$presencaKey->used){
				$p = new Pergunta;
				$perguntasGerais = $p->where('tipo_avaliacao', '=', 1)->get();
				$perguntasAval = $p->where('tipo_avaliacao', '=', 2)->get();
				$isValid = true;

				$presen = Presenca::find($presencaKey->presenca);
				if($presen!=null){
					$atv = Atividade::find($presen->atividade);
				}
			}
			else {
				$msg = "A chave " .$key. " já foi utilizada.";
			}
		}
		else {
			$msg = "A chave " . $key . " é inválida.";
		}

       	return view('avaliacao')->with([
			'key' => $key,
			'perguntasGerais' => $perguntasGerais,
			'perguntasAval' => $perguntasAval,
			'tipoAval' => 2,
			'isValid' => $isValid,
			'msg' => $msg,
			'atv' => $atv
        	]);
    	}

    	public function persistAvaliacao(Request $request){

    		$key = $request->key;
               	$ip = $request->ip;
               	$tipoAval = $request->tipoAval;

               	$p = new Pergunta;
		$perguntasGerais = $p->where('tipo_avaliacao', '=', 1)->get();
		$perguntasAval = $p->where('tipo_avaliacao', '=', 2)->get();

		$respostasGerais = array();
		foreach($perguntasGerais as $pg){
			$name = $pg->descricaoId;
			$respostasGerais[$pg->id] = $request->$name;
		}

		$respostasAval = array();
		foreach($perguntasAval as $pa){
			$name = $pa->descricaoId;
			$respostasAval[$pa->id] = $request->$name;
		}

		// Log::info($respostasGerais);
		// Log::info($respostasAval);

		// Pegando a presenca com a key
		$pk = new PresencaKey;
		$presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
		if(sizeof($presencaKey) == 0){
			return redirect("home");
		}

		if(!$presencaKey->used){
			foreach($perguntasAval as $pa){
				$a = new Avaliaco;
				$a->presenca = $presencaKey->presenca;
				$a->pergunta = $pa->id;
				$a->resposta = $respostasAval[$pa->id];
				$a->data =  date("Y-m-d");
				$a->ip = otherRequest::ip();
				$a->save();
			}

			foreach($perguntasGerais as $pg){
				$a = new Avaliaco;
				$a->presenca = $presencaKey->presenca;
				$a->pergunta = $pg->id;
				$a->resposta = $respostasGerais[$pg->id];
				$a->data =  date("Y-m-d");
				$a->ip = otherRequest::ip();
				$a->save();
			}

			$presencaKey->used = true;
			$presencaKey->save();
		}

	       return redirect()->route('showAval', $key);

    	}

    	public function avalShow($key){
    		$pk = new PresencaKey;
		$presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
		if(sizeof($presencaKey) == 0){
			return redirect("home");
		}

		$a = new Avaliaco;
		$avaliacoes = $a->where('presenca', '=', $presencaKey->presenca)->get();

		$p = new Pergunta;
		foreach ($avaliacoes as $a) {
			$id = $a->pergunta;
			$a->pergunta = $p->where('id', '=', $id)->get()->first()->descricao;
		}

    		return view('comprovante_avaliacao')->with([
	       	'key' => $key,
			'avaliacoes' => $avaliacoes
	       ]);
    	}
}
