<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        if (Session::has('atividade')) {
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

    public function getLoginPage($firstSearch = null)
    {
        date_default_timezone_set('America/Fortaleza');
        $today = date("Y-m-d");
        $hora  = date("H:i");
        $inicio_min = date("H:i", strtotime($hora) + 60 * 30);
        $termino_max = date("H:i", strtotime($hora) - 60 * 60 * 2);
        $atvs = Atividade::where([
            ['dt', '=', $today],
            ['status', '=', 2],
            ['hr_inicio', '<=', $inicio_min],
            ['hr_termino', '>=', $termino_max],
        ])->get();
        $atividades = array();
        foreach ($atvs as $a) {
            $modalidade = Modalidade::findOrFail($a->modalidade);
            $tipo = Tipo::findOrFail($a->tipo);
            $tema = substr(trim($a->tema), 0, 60);
            $ret = (strlen($a->tema) > 60) ? '...' : '';
            $atividades[$a->id] = $tipo->descricao . ' - ' . $tema . $ret;
        }
        // $userInput = $user != null ? '' : '';
        return view('auth.login')->with([
            'atividades' => $atividades,
            'firstSearch' => $firstSearch
        ]);
    }

    public function getRestrictLoginPage()
    {
        date_default_timezone_set('America/Fortaleza');
        $today = date("Y-m-d");
        $hora  = date("H:i");
        $inicio_min = date("H:i", strtotime($hora) + 60 * 30);
        $termino_max = date("H:i", strtotime($hora) - 60 * 60 * 2);
        $atvs = Atividade::where([
            ['dt', '=', $today],
            ['status', '=', 2],
            ['hr_inicio', '<=', $inicio_min],
            ['hr_termino', '>=', $termino_max],
        ])->get();
        $atividades = array();
        foreach ($atvs as $a) {
            $modalidade = Modalidade::findOrFail($a->modalidade);
            $tipo = Tipo::findOrFail($a->tipo);
            $tema = substr(trim($a->tema), 0, 60);
            $ret = (strlen($a->tema) > 60) ? '...' : '';
            $atividades[$a->id] = $tipo->descricao . ' - ' . $tema . $ret;
        }
        return view('restrict_login');
    }

    public function criptAtividade($str)
    {
        $inputlen = strlen($str);
        $randkey = rand(1, 9);
        $i = 0;
        while ($i < $inputlen) {
            $inputchr[$i] = (ord($str[$i]) - $randkey);
            $i++;
        }
        $encrypted = implode('.', $inputchr) . '.' . (ord($randkey) + 50);
        return $encrypted;
    }

    public function unCriptAtividade($str)
    {
        $input_count = strlen($str);
        $dec = explode(".", $str);
        $x = count($dec);
        $y = $x - 1;
        $calc = $dec[$y] - 50;
        $randkey = chr($calc);
        $i = 0;
        $real = 0;
        while ($i < $y) {
            $array[$i] = $dec[$i] + $randkey;
            $real .= chr($array[$i]);
            $i++;
        };
        $input = $real;
        return intval($input);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'idAtividade'  => 'required|min:1'
        ]);

        $id = $request->idAtividade;

        if (!is_numeric($id)) {
            return  view('auth.login')->with(['msg' => 'Atividade não encontrada...']);
        }

        $atividade = Atividade::findOrFail($id);
        if ($atividade == null) {
            // $request->session()->flash('AtividadeNotFound', 'Atividade não encontrada!');
            return  view('auth.login')->with(['msg' => 'Atividade não encontrada...']);
        } else {
            $today = date("Y-m-d");
            $dataAtividade = $atividade->dt;

            if (strtotime($dataAtividade) == strtotime($today)) {
                $modalidade = Modalidade::findOrFail($atividade->modalidade);
                $tipo = Tipo::findOrFail($atividade->tipo);

                if (!($atividade->modalidade == 2 && $atividade->tipo == 22)) {
                    $atv_id = $this->criptAtividade($id, strlen($atividade->tema));
                    return view('restrict_login')
                        ->with([
                            'tema' => $atividade->tema,
                            'atv_id' => $atv_id
                        ]);
                }

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

    public function restrictLogin(Request $request)
    {

        $this->validate($request, [
            'idAtividade'  => 'required|min:1',
            /** Senha digitada */
            'atv_id' => 'required'
            /** Id da atividade solicitada */
        ]);

        $id = $request->idAtividade;

        if (!is_numeric($id)) {
            Session::flash('notFound', 'A senha fornecido não possui cadastro.');
            return redirect()->route('login');
        }

        try {
            $atividade = Atividade::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            info($e);
            Session::flash('notFound', 'A senha fornecido não possui cadastro.');
            return redirect()->route('login');
        }

        $atv_id_uncript = $this->unCriptAtividade($request->atv_id);
        info($atv_id_uncript);

        $atividade_uncript = Atividade::findOrFail($atv_id_uncript);

        if ($atividade_uncript == null) {
            Session::flash('notFound', 'A senha fornecido não possui cadastro.');
            return redirect()->route('login');
        }

        if ($atv_id_uncript != $id) {
            $atividade = Atividade::findOrFail($atv_id_uncript);
            Session::flash('notFound', 'A senha difere da atividade selecionada');
            return  view('restrict_login')->with([
                'msg' => 'A senha difere da atividade selecionada',
                'tema' => $atividade->tema,
                'atv_id' => $request->atv_id
            ]);
        }
        $today = date("Y-m-d");
        $dataAtividade = $atividade->dt;

        if (strtotime($dataAtividade) == strtotime($today)) {
            $modalidade = Modalidade::findOrFail($atividade->modalidade);
            $tipo = Tipo::findOrFail($atividade->tipo);

            $atividade->hr_inicio = substr(trim($atividade->hr_inicio), 0, 5);
            $atividade->hr_termino = substr(trim($atividade->hr_termino), 0, 5);
            Session::forget('notFound');
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

        return  view('restrict_login')->with(['msg' => 'A senha fornecido não possui cadastro.']);
    }

    public function getPessoa(Request $request)
    {
        info($request);
        if (isset($request->searchTaghomeForm)) {
            $search = $request->searchTaghomeForm;
        } else {
            $search = $request->searchTag;
        }
        $pessoa = null;
        info(2);
        info($search);
        if ($search != "") {
            info(1);
            $found = false;
            $pessoa = Pessoa::where('email', $search)->first(); //Procurando por email
            if ($pessoa != null)
                $found = true;

            if (!$found) {
                $clear_cpf = str_replace([" ", ".", "-"], "", $search);
                $pessoa = Pessoa::where("cpf", $clear_cpf)->first(); //Procurando por cpf
                if ($pessoa != null)
                    $found = true;
            }

            info(3);
            if (isset($request->searchTaghomeForm) && $pessoa == null) {
                return $this->getLoginPage(1);
            }
            info(4);
            info($found);
            if ($found) {
                $profGeral = ProfGeral::where("pessoa", $pessoa->id)->first();
                $profSaude = ProfSaude::where("pessoa", $pessoa->id)->first();

                Session::put('pessoa', $pessoa);
                Session::put('profGeral', $profGeral);
                Session::put('profSaude', $profSaude);

                $cbo  = null;
                $resMun =  null;
                $resEst = null;
                if ($profGeral != null) {
                    $cbo = Cbo::where("codigo", $profGeral->cbo)->first();
                    $resMun = Municipio::where("ibge", $profGeral->municipio)->first();
                    $resEst = Estado::where("id",  $resMun->uf)->first();
                }

                $ubs = null;
                if ($profSaude != null) {
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
            } else {
                info(6);
                $atividade = Session::get('atividade');
                $modalidade = Session::get('modalidade');
                $tipo = Session::get('tipo');
                info($atividade);
                info($modalidade);
                info($tipo);
                info($pessoa);
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

    public function logout()
    {
        request()->session()->flush();
        return redirect()->route('welcome');
    }

    public function getRegistroPage()
    {

        if (!Session::has('pessoa'))
            return redirect("home");

        $tipoParticipante = [
            1 => 'PARTICIPANTE EXTERNO',
            2 => 'UFMA - DISCENTE',
            3 => 'UFMA - DOCENTE',
            4 => 'UFMA - TÉCNICO',
        ];

        $pessoa = Session::get('pessoa');
        $profGeral = ProfGeral::where("pessoa", $pessoa->id)->first();

        $ultimaPresenca = null;
        if (Presenca::where('pessoa', $pessoa->id)->first()) {
        
            $ibge = Presenca::where('pessoa', $pessoa->id)->get()->last()->local;
            $uf = Municipio::where('ibge', $ibge)->first()->uf;

            $ultimaPresenca = json_encode([
                'uf' => $uf,
                'ibge' => $ibge,
            ]);
        }

        $request = otherRequest::instance();
        $request->setTrustedProxies([
            otherRequest::server('REMOTE_ADDR'),
        ]);
        $ipAddress = $request->getClientIp();

        $estados = Estado::all();
        $arrayEstados = array();
        foreach ($estados as $estado) {
            $arrayEstados[$estado->id] = $estado->descricao;
        }

        $municipios = Municipio::all();
        $arrayMun = array();
        foreach ($municipios as $mun) {
            $arrayMun[$mun->ibge] = $mun->nome;
        }

        return view('registrar')->with([
            'ultimaPresenca' => $ultimaPresenca,
            'tipoParticipante' => $tipoParticipante,
            'estados' => $arrayEstados,
            'profGeral' => $profGeral,
            'municipios' => $arrayMun,
            'ip' => $ipAddress
        ]);
    }

    public function persistPresenca(Request $request)
    {
        info($request);

        if (!Session::has('pessoa'))
            return redirect()->route("logout");

        $ip = $request->ip;
        $estado = $request->estado;
        $municipio = $request->municipio;
        $atividade = Session::get('atividade');
        $pessoa = Session::get('pessoa');
        $profSaude = Session::get('profSaude');
        $ubs = null;

        $profGeral = ProfGeral::where('pessoa', $pessoa->id)->whereNull('tipo_participante')->first();

        if ($profGeral != null) {
            if ($request->vinculo_ufma == 'on') {
                $profGeral->tipo_participante = $request->tipo_participante;
            } else {
                $profGeral->tipo_participante = 1;
            }
            $profGeral->save();
        }

        if ($profSaude != null)
            $ubs = $profSaude->ubs;

        $aux = Presenca::where([['atividade', '=', $atividade->id], ['pessoa', '=', $pessoa->id]])->first();

        if ($aux != null)
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
        $pessoa = Pessoa::findOrFail($presenca->pessoa);
        $pessoa = $pessoa->nome . ' ' . $pessoa->sobrenome;
        $local = Municipio::findOrFail($presenca->local);
        $estado = Estado::findOrFail($local->uf);
        $local = $local->nome . '/' . $estado->sigla;
        if ($ubs != null)
            $ubs = Municipio::findOrFail($presenca->ubs);

        // $presencaKey = new PresencaKey;
        // $key = $presencaKey->where([
        // 	['presenca', '=', $presenca->id]
        // ])->get()->first();

        // if(sizeof($key) == 0){
        // 	do {
        // 		$codigo = md5(uniqid(rand(), true));
        // 		$query = $presencaKey->where('key_auth', '=', $codigo)->get();
        // 	} while(sizeof($query) >= 1);

        // 	$presencaKey->presenca = $presenca->id;
        // 	$presencaKey->key_auth = $codigo;
        // 	$presencaKey->used = false;
        // 	$presencaKey->save();
        // }
        // else {
        // 	$presencaKey = $key;
        // 	$codigo = $presencaKey->key_auth;
        // }

        if (!PresencaKey::where('presenca', $presenca->id)->first()) {
            $presencaKey = new PresencaKey;
            $presencaKey->presenca = $presenca->id;
            $presencaKey->key_auth = md5(uniqid(rand(), true));
            $presencaKey->used = false;
            $presencaKey->save();
        } else {
            $presencaKey = PresencaKey::where('presenca', $presenca->id)->get()->first();
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

    public function getPessoaPage()
    {

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



    public function getAvalPage(Request $request)
    {
        $key = $request->key;
        $isValid = false;
        $msg = "";
        $perguntasGerais = array();
        $perguntasAval = array();
        $atv = null;

        $pk = new PresencaKey;
        $presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
        if (sizeof($presencaKey) >= 1) {
            if (!$presencaKey->used) {
                $p = new Pergunta;
                $perguntasGerais = $p->where('tipo_avaliacao', '=', 1)->get();
                $perguntasAval = $p->where('tipo_avaliacao', '=', 2)->get();
                $isValid = true;

                $presen = Presenca::findOrFail($presencaKey->presenca);
                if ($presen != null) {
                    $atv = Atividade::findOrFail($presen->atividade);
                }
            } else {
                $msg = "A chave " . $key . " já foi utilizada.";
            }
        } else {
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

    public function persistAvaliacao(Request $request)
    {

        $key = $request->key;
        $ip = $request->ip;
        $tipoAval = $request->tipoAval;

        $p = new Pergunta;
        $perguntasGerais = $p->where('tipo_avaliacao', '=', 1)->get();
        $perguntasAval = $p->where('tipo_avaliacao', '=', 2)->get();

        $respostasGerais = array();
        foreach ($perguntasGerais as $pg) {
            $name = $pg->descricaoId;
            $respostasGerais[$pg->id] = $request->$name;
        }

        $respostasAval = array();
        foreach ($perguntasAval as $pa) {
            $name = $pa->descricaoId;
            $respostasAval[$pa->id] = $request->$name;
        }

        // Log::info($respostasGerais);
        // Log::info($respostasAval);

        // Pegando a presenca com a key
        $pk = new PresencaKey;
        $presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
        if (sizeof($presencaKey) == 0) {
            return redirect("home");
        }

        if (!$presencaKey->used) {
            foreach ($perguntasAval as $pa) {
                $a = new Avaliaco;
                $a->presenca = $presencaKey->presenca;
                $a->pergunta = $pa->id;
                $a->resposta = $respostasAval[$pa->id];
                $a->data =  date("Y-m-d");
                $a->ip = otherRequest::ip();
                $a->save();
            }

            foreach ($perguntasGerais as $pg) {
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

    public function avalShow($key)
    {
        $pk = new PresencaKey;
        $presencaKey = $pk->where('key_auth', '=', $key)->get()->first();
        if (sizeof($presencaKey) == 0) {
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
