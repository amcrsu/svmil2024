<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Habilitacao;
use Carbon\Carbon;
use App\Inscricao;
use App\Categoria;
use App\Guarnicao;
use App\Titulo;
use App\Curso;
use App\Publicacao;
use App\ExperienciaProfissional;
use App\TipoTitulo;
use App\Certificacao;
use App\User;
use PDF;
use \Crypt;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFormHabilitacoes($id){
        $id = Crypt::decrypt($id);
        $listaHabilitacoes = Habilitacao::where('inscricaoId', '=', $id)->get();
        $listaTitulos = Titulo::where('inscricaoId', '=', $id)->get();
        $listaPublicacoes = Publicacao::where('inscricaoId', '=', $id)->get();
        $listaCertificacoes = Certificacao::where('inscricaoId', '=', $id)->get();
        $listaExperiencias = ExperienciaProfissional::where('inscricaoId', '=', $id)->get();
        $listaCursos = Curso::where('inscricaoId', '=', $id)->get();
        

        $dtBaseInicial = null;
        $dtBaseFim = null;
        $count = 0;
	    $addDia = false;

        if($listaExperiencias->count() > 0) {
            foreach ($listaExperiencias as $experiencia) {
                $experiencia->dtInicio = Carbon::parse($experiencia->dtInicio);
                $experiencia->dtFim = Carbon::parse($experiencia->dtFim);

                if($experiencia->dtInicio->diff($experiencia->dtFim)->d == 30) {
                    $experiencia->dtFim->addDays(1);
		    $addDia = true;
		}

                if ($count == 0){
                    $dtBaseInicial = clone $experiencia->dtInicio;
                    $dtBaseFim = clone $experiencia->dtFim;
                } else {
                    $dtBaseFim->addYears($experiencia->dtInicio->diff($experiencia->dtFim)->y);
                    $dtBaseFim->addMonths($experiencia->dtInicio->diff($experiencia->dtFim)->m);
                    $dtBaseFim->addDays($experiencia->dtInicio->diff($experiencia->dtFim)->d);
                }

		if($addDia)
		   $experiencia->dtFim->addDays(-1);

		$addDia = false;
                $count++;
            }

            $totalAnos = $dtBaseInicial->diff($dtBaseFim)->y;
            $totalMeses = $dtBaseInicial->diff($dtBaseFim)->m;
            $totalDias = $dtBaseInicial->diff($dtBaseFim)->d;
        }

        $inscricao = Inscricao::find($id);
        $categoriaId = $inscricao->categoriaId;


/****
        if($inscricao->area->id == 57) // Motorista
            $listaTiposHabilitacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 1)->get();
        else 
            $listaTiposHabilitacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 1)->whereNotIn('id', [44,45])->get();

        if ($inscricao->area->id == 1 && $inscricao->subarea->id == 4) // Área: Magistério \ SubÁrea: Licenciatura em Língua Inglesa
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id',[4,6,7,56])->get();
        else if($inscricao->area->id == 1 && $inscricao->subarea->id = 3) // Área: Magistério \ SubÁrea: Licenciatura em Língua Portuguesa
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id',[3,6,7,56])->get();
        else if($inscricao->area->id == 12) // Área: Informática
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id', [4,3])->get();
        else
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id', [4,3,6,7,56])->get();

        if($inscricao->area->id == 23 || $inscricao->area->id == 24)
            $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->get();
        else
            $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [31])->get();

        if($inscricao->area->id == 12 || $inscricao->area->id == 27 || $inscricao->area->id == 28 || $inscricao->area->id == 29) // Área: Informática
            $listaTiposCertificacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 4)->get();
        else 
            $listaTiposCertificacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 4)->whereNotIn('id', [12, 32])->get();

        
        
        $listaTiposPublicacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 5)->get();

        if($inscricao->area->id == 6) // Área: Direito
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->get();
        else if($inscricao->area->id == 51 || $inscricao->area->id == 52) // Área: Técnico em Radiologia
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->whereNotIn('id', [20, 41])->get();
        else if($inscricao->area->id == 44) // Área: Técnico em Mecânica
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->whereNotIn('id', [20, 40])->get();
        else 
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->whereNotIn('id', [20, 41, 40])->get();
***/


        /*** INICIO HABILITACAO MINIMA ***/
        if($inscricao->categoriaId == 3 ){
            $listaTiposHabilitacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 1)->orderBy('tipoTitulo', 'asc')->get();
        }
        /*** FIM HABILITACAO MINIMA ***/

        /*** INICIO TITULOS/GRAUS/DIPLOMAS ***/
        if ($inscricao->area->id == 1){
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id', [46])->get(); //Motorista, não mostrar Registro de Músico
        } else if ($inscricao->area->id == 5 || $inscricao->area->id == 6 || $inscricao->area->id == 7 || $inscricao->area->id == 8 || $inscricao->area->id == 9 || $inscricao->area->id == 10 || $inscricao->area->id == 11 || $inscricao->area->id == 12 || $inscricao->area->id == 13){
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id', [44,45])->get();
        } else
            $listaTiposTitulosGraus = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 2)->whereNotIn('id', [44,45,46])->get();
        /*** FIM TITULOS/GRAUS/DIPLOMAS ***/

        /*** INICIO CURSOS/OUTRAS HABILITAÇOES ***/
        if($inscricao->area->id == 1 && $inscricao->guarnicao == 1) //Motorista Fortaleza
        $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [56,57,60,61,62,63])->get();
        if($inscricao->area->id == 1 && $inscricao->guarnicao == 2) //Motorista Teresina
        $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [49,57,60,61,62,63])->get();
        if($inscricao->area->id == 1 && $inscricao->guarnicao == 3) //Motorista Picos
        $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [49,56,57,60,61,62,63])->get();
        if($inscricao->area->id == 5 || $inscricao->area->id == 6 || $inscricao->area->id == 7 || $inscricao->area->id == 8 || $inscricao->area->id == 9 || $inscricao->area->id == 10 || $inscricao->area->id == 11 || $inscricao->area->id == 12 || $inscricao->area->id == 13)//Musico
            if($inscricao->guarnicao == 2) //Músico fora de Fortaleza
           $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [47,48,49,56,57,60,61,62,63])->get();
            else if($inscricao->guarnicao == 1) //Músico Fortaleza
           $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [47,48,49,56,60,61,62,63])->get();
        if($inscricao->area->id == 2 || $inscricao->area->id == 3 || $inscricao->area->id == 4 || $inscricao->area->id == 14 || $inscricao->area->id == 15) //Demais areas diferentes de motorista e musico
           $listaTiposCurso = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 3)->whereNotIn('id', [47,48,49,56,57,60,61,62,63])->get();
        
        /*** FIM CURSOS/OUTRAS HABILITAÇOES ***/

        /*** INICIO CERTIFICAÇOES / CURSOS COMPLEMENTARES (CIVIL OU MILITAR) 
         
        if($inscricao->area->id == 21) // Área: Tec. Informática
        $listaTiposCertificacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 4)->orderBy('tipoTitulo', 'asc')->get();  
        else if($inscricao->area->id == 5 || $inscricao->area->id == 6)// Área: Informática I ou II
        $listaTiposCertificacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 4)->orderBy('tipoTitulo', 'asc')->get();
        else
        $listaTiposCertificacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 4)->whereNotIn('id', [13,43])->orderBy('tipoTitulo', 'asc')->get();
        
        FIM CERTIFICAÇOES / CURSOS COMPLEMENTARES (CIVIL OU MILITAR) ***/

        /*** INICIO PUBLICAÇOES ***/
        $listaTiposPublicacao = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 5)->orderBy('tipoTitulo', 'asc')->get();
        /*** FIM PUBLICAÇOES ***/

        /*** INICIO EXPERIENCIAS ***/
        if($inscricao->area->id == 1) // Área: Motorista com CNH D ou E
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->orderBy('tipoTitulo', 'asc')->get();
        else
            $listaTiposExperiencia = TipoTitulo::where('categoriaId', '=', $categoriaId)->where('etapaId', '=', 6)->whereNotIn('id', [56,57,58,59])->orderBy('tipoTitulo', 'asc')->get();
            
        /*** FIM EXPERIENCIAS ***/

        return view('habilitacoes', compact(
            'id', 
            'inscricao', 
            'listaHabilitacoes', 
            'listaTitulos', 
            'listaCursos', 
            'listaPublicacoes', 
            'listaExperiencias', 
            'listaTiposHabilitacao',
            'listaTiposTitulosGraus',
            'listaTiposCurso',
            'listaTiposCertificacao',
            'listaTiposPublicacao',
            'listaTiposExperiencia',
            'listaCertificacoes',
            'totalAnos',
            'totalMeses',
            'totalDias'
        ));
    }

    public function showDashboard(){
        $id = Auth::id();
        $listaInscricoes = Inscricao::where('inscricaoFinalizada', '=', '1')->where('userId', '=', $id)->get();
        $inscricao = Inscricao::where('inscricaoFinalizada', '=', '0')->where('userId', '=', $id)->get();
        $novaInscricao = 'true';
        
        if ($inscricao->count()) {
            foreach ($inscricao as $insc) {
                Habilitacao::where('inscricaoId', '=', $insc->id)->delete();
                Curso::where('inscricaoId', '=', $insc->id)->delete();
                Titulo::where('inscricaoId', '=', $insc->id)->delete();
                ExperienciaProfissional::where('inscricaoId', '=', $insc->id)->delete();
                Certificacao::where('inscricaoId', '=', $insc->id)->delete();
                Habilitacao::where('inscricaoId', '=', $insc->id)->delete();
                Publicacao::where('inscricaoId', '=', $insc->id)->delete();
                Inscricao::find($insc->id)->delete();
            }
        }

        if ($listaInscricoes->count() == 1)
            $novaInscricao = 'false';
        else {
            $inscricaoSTTOTT = Inscricao::where('inscricaoFinalizada', '=', '1')->where('userId', '=', $id)->whereIn('categoriaId', [3])->get();

            if ($inscricaoSTTOTT->count() > 0){
                $user = User::find($id);
                $dtNascimento = Carbon::parse($user->dtNascimento);

                if ($dtNascimento->year < 1983 && $inscricaoSTTOTT->count() == 2)
                    $novaInscricao = 'false';
            }
        }
        
        return view('home', compact('listaInscricoes', 'novaInscricao'));
    }

    public function showMeusDados(){
        $id = Auth::id();
        $usuario = User::find($id);
        if($usuario->telFixo != '') {
            $telFixo = $usuario->telFixo;
            $telFixoFormatado = "(" . substr($telFixo, 0,2) . ") " . substr($telFixo, 2,4) . "-" . substr($telFixo, 6,4);
            $usuario->telFixo = $telFixoFormatado;
        }

        $telCelular = $usuario->telCelular;
        $telCelularFormatado = "(" . substr($telCelular, 0, 2) . ") " . substr($telCelular, 2,5) . "-" . substr($telCelular,7,4) ;
        $usuario->telCelular = $telCelularFormatado;

        $cep = $usuario->cep;
        $cepFormatado = substr($cep, 0, 5) . "-" . substr($cep, 5, 3);
        $usuario->cep = $cepFormatado;

        if(isset($usuario->idtMil)) {
            $idtMil = $usuario->idtMil;
            $idtMilFormatado = substr($idtMil, 0, 9) . "-" . substr($idtMil, 9,1);
            $usuario->idtMil = $idtMilFormatado;
        }

        $dtNascimento = Carbon::parse($usuario->dtNascimento);
        $usuario->dtNascimento = $dtNascimento->format('d/m/Y');

        return view('meusDados', compact('usuario'));
    }

    public function showFormNovaInscricao(){
        $id = Auth::id();
        $usuario = User::find($id);
        $sexo = $usuario->sexo;
        $inscricoesUserLogado = Inscricao::where('userId', $id)->get();
        
        if($inscricoesUserLogado->count() == 2) {
            $indice = 0;
            foreach ($inscricoesUserLogado as $inscricoes) {
                $notIn[$indice] = $inscricoes->categoriaId;
                $indice++;
            }

            /***
            $dtNascimento = Carbon::parse($usuario->dtNascimento);
            if($dtNascimento->year < 1979) {
                $indice++;
                $notIn[$indice] = 3;
            }
            
            ***/

            //$categoriaList = Categoria::whereIn('id', $notIn)->get();
            $categoriaList = Categoria::where('id','=', 3)->get();
            $guarnicaoList = Guarnicao::whereIn('id', $notIn)->get();
        } else {
            //$categoriaList = Categoria::all();
            $categoriaList = Categoria::where('id','=', 3)->get();
            $guarnicaoList = Guarnicao::all();
        }

        return view('novaInscricao', compact('categoriaList','guarnicaoList','sexo'));
    }

    public function salvarNovaInscricao(Request $request) {
        
        
        $countInscricoes = Inscricao::all()->count() + date("YmdHis");

        if($request['categoriaId'] == 1) {//OTT 
            $codInscricao = "OTT" . $countInscricoes;
        } else if($request['categoriaId'] == 2) { //STT
            $codInscricao = "STT" . $countInscricoes;
        } else { //CET
            $codInscricao = "CET" . $countInscricoes;
        }

        $inscricao = new Inscricao();
        $inscricao->codInscricao = $codInscricao;
        $inscricao->userId = Auth::id();
        $inscricao->categoriaId = $request['categoriaId'];
        $inscricao->areaId = $request['areaId'];
        //Guarnicao
        $inscricao->guarnicao = $request['guarnicao'];
        
        $inscricao->inscricaoFinalizada = '0';

        if(isset($request['subAreaId'])){
            $inscricao->subareaId = $request['subAreaId'];
        }

        $inscricao->save();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($inscricao->id));
    }

    public function addHabilitacao(Request $request){
        $validator = Validator::make($request->all(), [
            'tipoTituloHabilitacaoId' => 'required',
            'nomeCursoHabilitacao' => 'required',
            'instituicaoHabilitacao' => 'required',
            'dtFormacaoHabilitacao' => 'required|date_format:d/m/Y',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $idInscricao = $request['idInscricao'];
        $inscricao = Inscricao::find($idInscricao);
        $tipoTituloId = $request['tipoTituloHabilitacaoId'];

        if ($inscricao->categoria->id == 1) { // OTT
            $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->count();
            if ($count > 0){
                \Session::flash('mensagem', ['msg'=>'Já existe uma habilitação para Curso Superior - Licenciatura, Bacharelado ou Tecnólogo cadastrada.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
            }
        } else if ($inscricao->categoria->id == 2) { // STT
            if($tipoTituloId == 21){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 21)->count(); // Diploma de Ensino Nível Médio
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>'Já existe uma habilitação para Diploma de Ensino Nível Médio cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($tipoTituloId == 22){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 22)->count(); // Curso Técnico
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>'Já existe uma habilitação para Curso Técnico cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        } else { // CET
            if($tipoTituloId == 40){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 40)->count(); // Curso Diploma de Ensino Fundamental
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Diploma de Ensino Fundamental cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($tipoTituloId == 41){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 43)->count(); // Curso Profissionalizante
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>'Já existe uma habilitação para Curso Profissionalizante cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($tipoTituloId == 44){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 44)->count(); // Curso Profissionalizante
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>"Já existe uma Habilitação Categoria 'D' cadastrada.", 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($tipoTituloId == 45){
                $count = Habilitacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 45)->count(); // Curso Profissionalizante
                if ($count > 0) {
                    \Session::flash('mensagem', ['msg'=>"Já existe uma Habilitação Categoria 'E' cadastrada.", 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        }

        $habilitacao = new Habilitacao();
        $habilitacao->tipoTituloId = $request['tipoTituloHabilitacaoId'];
        $habilitacao->nomeCurso = $request['nomeCursoHabilitacao'];
        $habilitacao->instituicao = $request['instituicaoHabilitacao'];
        $habilitacao->dtFormacao = Carbon::createFromFormat('d/m/Y',$request['dtFormacaoHabilitacao']);
        $habilitacao->inscricaoId = $idInscricao;
        $habilitacao->save();
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirHabilitacao($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        Habilitacao::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function addTitulo(Request $request){
        $validator = Validator::make($request->all(), [
            'tituloDiplomaId' => 'required',
            'nomeCursoDiploma' => 'required',
            'instituicaoDiploma' => 'required',
            'dtConclusaoDiploma' => 'required|date_format:d/m/Y',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $idInscricao = $request['idInscricao'];
        $inscricao = Inscricao::find($idInscricao);

        $titulo = new Titulo();
        $titulo->tipoTituloId = $request['tituloDiplomaId'];
        $titulo->curso = $request['nomeCursoDiploma'];
        $titulo->instituicao = $request['instituicaoDiploma'];
        $titulo->dtConclusao = Carbon::createFromFormat('d/m/Y',$request['dtConclusaoDiploma']);
        $titulo->inscricaoId = $request['idInscricao'];

        if($inscricao->categoria->id == 1) { // OTT
            if($titulo->tipoTituloId == 5) { // Especialização Lato Sensu - máximo 3
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 5)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Especializações Lato Sensu cadastradas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($titulo->tipoTituloId == 57) { // Especialização Stricto Sensu - Mestrado
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 57)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Especializações Stricto Sensu - Mestrado Sensu cadastradas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($titulo->tipoTituloId == 58) { // Especialização Stricto Sensu - Doutorado
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 58)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Especializações Stricto Sensu - Doutorado cadastradas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        } else if($inscricao->categoria->id == 2) { // STT
            if($titulo->tipoTituloId == 24) {// Especialização Lato Sensu - máximo 2
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 24)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Especializações Lato Sensu cadastradas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 25) {// Especialização Lato Sensu - Mestrado - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 25)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 1 Especialização Lato Sensu - Mestrado cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 26) {// Especialização Lato Sensu - Doutorado - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 26)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 1 Especialização Lato Sensu - Doutorado cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        } else { // CET
            if($titulo->tipoTituloId == 41) {// Curso Técnico - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 41)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso Técnico cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 42) {// Curso Profissionalizante - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 42)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso Profissionalizante cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 43) {// Certificado de Ensino Nível Médio - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 43)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Certificado de Ensino Nível Médio cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 44) {// Carteira Nacional de Habilitação Categoria ‘D’ - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 44)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘D’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($titulo->tipoTituloId == 45) {// Carteira Nacional de Habilitação Categoria ‘E’ - máximo 1
                $count = Titulo::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 45)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘E’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        }
        
        $titulo->save();        
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirTitulo($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        Titulo::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function addCurso(Request $request){
        $validator = Validator::make($request->all(), [
            'tipoTituloCursoId' => 'required',
            'cursoFormacao' => 'required',
            'instituicaoOMCurso' => 'required',
            'dtConclusaoConvocacao' => 'required|date_format:d/m/Y',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $idInscricao = $request['idInscricao'];
        $inscricao = Inscricao::find($idInscricao);

        $curso = new Curso();
        $curso->tipoTituloId = $request['tipoTituloCursoId'];
        $curso->curso = $request['cursoFormacao'];
        $curso->instituicao = $request['instituicaoOMCurso'];
        $curso->dtConclusao = Carbon::createFromFormat('d/m/Y',$request['dtConclusaoConvocacao']);
        $curso->inscricaoId = $request['idInscricao'];

        if($inscricao->categoria->id == 1) { // OTT
            if($curso->tipoTituloId == 8) { // Curso com carga horária de, no mínimo, 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 8)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária de, no mínimo, 120 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 9) { // Curso com carga horária igual ou superior a 80 horas e inferior a 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 9)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 80 horas e inferior a 120 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 10) { // Curso com carga horária igual ou superior a 40 horas e inferior a 80 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 10)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 40 horas e inferior a 80 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 11) { // Curso com carga horária igual ou superior a 30 horas e inferior a 40 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 11)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 30 horas e inferior a 40 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }

        } else if($inscricao->categoria->id == 2) { // STT
            if($curso->tipoTituloId == 27) { // Curso com carga horária de, no mínimo, 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 27)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária de, no mínimo, 120 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 28) { // Curso com carga horária igual ou superior a 80 horas e inferior a 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 28)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 80 horas e inferior a 120 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 29) { // Curso com carga horária igual ou superior a 80 horas e inferior a 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 29)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 40 horas e inferior a 80 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if ($curso->tipoTituloId == 30) { // Curso com carga horária igual ou superior a 80 horas e inferior a 120 horas
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 30)->count();
                if ($count >= 2) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 2 Cursos com carga horária igual ou superior a 30 horas e inferior a 40 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        } else if($inscricao->categoria->id == 3){ // CET
            if($curso->tipoTituloId == 50) { // Curso com carga horária de duração mínima de 120 horas - máximo 3
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 50)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Cursos com carga horária de duração mínima de 120 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 51) { // Curso com carga horária de duração mínima de 80 horas - máximo 3
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 51)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Cursos com carga horária de duração mínima de 80 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 52) { // Curso com carga horária de duração mínima de 40 horas - máximo 3
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 52)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Cursos com carga horária de duração mínima de 40 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 53) { // Curso com carga horária de duração mínima de 30 horas - máximo 3
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 53)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 Cursos com carga horária de duração mínima de 30 horas cadastrados.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 60) { // Carteira Nacional de Habilitação Categoria ‘B’- máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 60)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘B’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 61) { // Carteira Nacional de Habilitação Categoria ‘C’- máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 61)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘C’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 62) { // Carteira Nacional de Habilitação Categoria ‘D’- máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 62)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘D’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 63) { // Carteira Nacional de Habilitação Categoria ‘E’- máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 63)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Carteira Nacional de Habilitação Categoria ‘E’ cadastrada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 47) { // Curso de Condutor de Veículos de Transporte Coletivo de Passageiros - máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 47)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso de Condutor de Veículos de Transporte Coletivo de Passageiros cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 48) { // Curso de Condutor de Veículos de Emergência/Ambulância - máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 48)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso de Condutor de Veículos de Emergência/Ambulância cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 49) { // Curso de Instrutor de Trânsito - máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 49)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso de Instrutor de Trânsito cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 56) { // Curso de Movimentação e Operação de Produtos Perigosos - máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 56)->count();
                if ($count >= 1) {
                    \Session::flash('mensagem', ['msg'=>'Já existe 1 Curso de Movimentação e Operação de Produtos Perigosos cadastrado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($curso->tipoTituloId == 57) { // Habilitação para executar instrumento de harmonia, como Teclado, Violão ou Contrabaixo de Cordas. - máximo 1
                $count = Curso::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 57)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já existem 3 cadastros de Habilitação para executar instrumento de harmonia, como Teclado, Violão ou Contrabaixo de Cordas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        }

        $curso->save();
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirCurso($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        Curso::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function addPublicacao(Request $request){
        $validator = Validator::make($request->all(), [
            'tipoPublicacaoId' => 'required',
            'tituloPublicacao' => 'required',
            'veiculoPublicacao' => 'required',
            'dtPublicacao' => 'required|date_format:d/m/Y',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $idInscricao = $request['idInscricao'];
        $inscricao = Inscricao::find($idInscricao);

        $publicacao = new Publicacao();
        $publicacao->tipoTituloId = $request['tipoPublicacaoId'];
        $publicacao->titulo = $request['tituloPublicacao'];
        $publicacao->veiculo = $request['veiculoPublicacao'];
        $publicacao->dtPublicacao = Carbon::createFromFormat('d/m/Y',$request['dtPublicacao']);
        $publicacao->inscricaoId = $request['idInscricao'];

        
        if($inscricao->categoria->id == 3){ // CET
            if($publicacao->tipoTituloId == 64) { // Livro - máximo 3
                $count = Publicacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 64)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já foi cadastrado 3 livros.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }else if($publicacao->tipoTituloId == 66) { // Capítulo em Livro especializado - máximo 3
                $count = Publicacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 66)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já foi cadastrado 3 Capítulos em Livros especializado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($publicacao->tipoTituloId == 65) { // Artigo publicado em revistas especializadas - máximo 3
                $count = Publicacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 65)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já foi cadastrado 3 Artigos em revista especializada.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            } else if($publicacao->tipoTituloId == 67) { // Artigo em periódicos/revistas não especializadas - máximo 3
                $count = Publicacao::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', 67)->count();
                if ($count >= 3) {
                    \Session::flash('mensagem', ['msg'=>'Já foi cadastrado 3 Artigos em periódicos/revistas não especializadas.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
                }
            }
        }
        
        /******
        if($publicacao->tipoTituloId == 14 || $publicacao->tipoTituloId == 34 || $publicacao->tipoTituloId == 64) { // Livro
            $count = Publicacao::where('inscricaoId', '=', $idInscricao)->whereIn('tipoTituloId', [14, 34, 64])->count();
            if ($count >= 1) {
                \Session::flash('mensagem', ['msg'=>'Já existem 1 Livros cadastrados.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
            }
        } else if($publicacao->tipoTituloId == 15 || $publicacao->tipoTituloId == 35){ // Artigo publicado em revistas especializadas QUALIS tipo A, B ou C
            $count = Publicacao::where('inscricaoId', '=', $idInscricao)->whereIn('tipoTituloId', [15, 35])->count();
            if ($count >= 2) {
                \Session::flash('mensagem', ['msg'=>'Já existem 2 Artigos publicados em revistas especializadas QUALIS tipo A, B ou C cadastrados.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
            }
        } else if($publicacao->tipoTituloId == 16 || $publicacao->tipoTituloId == 36 || $publicacao->tipoTituloId == 65) { // Artigo publicado em revistas especializadas
            $count = Publicacao::where('inscricaoId', '=', $idInscricao)->whereIn('tipoTituloId', [16, 36, 65])->count();
            if ($count >= 1) {
                \Session::flash('mensagem', ['msg'=>'Já existem 1 Artigos publicados em revistas especializadas cadastrados.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
            }
        } else if($publicacao->tipoTituloId == 17 || $publicacao->tipoTituloId == 37) { // Artigo em periódicos e revistas não especializadas
            $count = Publicacao::where('inscricaoId', '=', $idInscricao)->whereIn('tipoTituloId', [17, 37])->count();
            if ($count >= 2) {
                \Session::flash('mensagem', ['msg'=>'Já existem 2 Artigos em periódicos e revistas não especializadas cadastrados.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
            }
        }
        
        ******/

        $publicacao->save();
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirPublicacao($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        Publicacao::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function addCertificado(Request $request){
        $validator = Validator::make($request->all(), [
            'tipoTituloId' => 'required',
            'nomeCertificacao' => 'required',
            'dtCertificacao' => 'required|date_format:d/m/Y',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $certificado = new Certificacao();
        $certificado->tipoTituloId = $request['tipoTituloId'];
        $certificado->nome = $request['nomeCertificacao'];
        $certificado->dtCertificacao = Carbon::createFromFormat('d/m/Y',$request['dtCertificacao']);
        $certificado->inscricaoId = $request['idInscricao'];
        $certificado->save();

        $idInscricao = $request['idInscricao'];
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirCertificado($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        Certificacao::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function addExperiencia(Request $request){
        $validator = Validator::make($request->all(), [
            'tipoExperienciaId' => 'required',
            'nomeEmpresa' => 'required',
            'dtInicial' => 'required',
            'cargo' => 'required',
            'atividades' => 'required',
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if (strpos($request['dtInicial'], ' - ') !== false) {
            $dtInicio = explode(' - ', $request['dtInicial'])[0];
            $dtFim = explode(' - ', $request['dtInicial'])[1];
        } else {
            \Session::flash('erro', ['msg'=>'Selecione a data inicial e a final para a experiência.', 'class'=>'danger']);
            return back()->withInput();
        }

        $idInscricao = $request['idInscricao'];
        $experiencia = new ExperienciaProfissional();
        $experiencia->tipoTituloId = $request['tipoExperienciaId'];
        $experiencia->nomeLocal = $request['nomeEmpresa'];
        $experiencia->dtInicio = Carbon::createFromFormat('d/m/Y',$dtInicio)->setTime(00,00,00);
        $experiencia->dtFim = Carbon::createFromFormat('d/m/Y',$dtFim)->setTime(00,00,00);
        $experiencia->cargo = $request['cargo'];
        $experiencia->atividades = $request['atividades'];
        $experiencia->inscricaoId = $request['idInscricao'];

        $listaTodasExperiencias = ExperienciaProfissional::where('inscricaoId', '=', $idInscricao)->get();
        // Validação de datas sobrepostas
        if ($listaTodasExperiencias->count() > 0) {
            foreach ($listaTodasExperiencias as $exp) {
                $exp->dtInicio = Carbon::parse($exp->dtInicio)->setTime(00,00,00);
                $exp->dtFim = Carbon::parse($exp->dtFim)->setTime(00,00,00);

                if ($experiencia->dtInicio <= $exp->dtInicio && $experiencia->dtFim >= $exp->dtFim) {
                    \Session::flash('mensagem', ['msg'=>'Já existe uma experiência profissional cadastrada entre o período informado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));   
                } else if (($experiencia->dtInicio >= $exp->dtInicio && $experiencia->dtInicio <= $exp->dtFim) && $experiencia->dtFim >= $exp->dtFim) {
                    \Session::flash('mensagem', ['msg'=>'Já existe uma experiência profissional cadastrada entre o período informado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));   
                } else if (($experiencia->dtInicio >= $exp->dtInicio && $experiencia->dtInicio <= $exp->dtFim) && ($experiencia->dtFim >= $exp->dtInicio && $experiencia->dtFim <= $exp->dtFim)){
                    \Session::flash('mensagem', ['msg'=>'Já existe uma experiência profissional cadastrada entre o período informado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));   
                } else if ($experiencia->dtInicio <= $exp->dtInicio && ($experiencia->dtFim >= $exp->dtInicio && $experiencia->dtFim <= $exp->dtFim)){
                    \Session::flash('mensagem', ['msg'=>'Já existe uma experiência profissional cadastrada entre o período informado.', 'class'=>'danger']);
                    return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));   
                }
            }
        } 
        
        // Validação dos 5 anos por tipo de experiência
        $dataFimValidacao = clone $experiencia->dtFim;
        $listaExperiencias = ExperienciaProfissional::where('inscricaoId', '=', $idInscricao)->where('tipoTituloId', '=', $experiencia->tipoTituloId)->get();

        //Validação da nova data. Se dias - 30 adiciona mais um dia para fechar um mês
        if($experiencia->dtInicio->diff($experiencia->dtFim)->d == 30)
            $dataFimValidacao->addDays(1);

        if ($listaExperiencias->count() > 0){
            foreach ($listaExperiencias as $exp) {
                $exp->dtInicio = Carbon::parse($exp->dtInicio)->setTime(00,00,00);
                $exp->dtFim = Carbon::parse($exp->dtFim)->setTime(00,00,00);

                if($exp->dtInicio->diff($exp->dtFim)->d == 30)
                    $exp->dtFim->addDays(1);

                $dataFimValidacao->addYears($exp->dtInicio->diff($exp->dtFim)->y);
                $dataFimValidacao->addMonths($exp->dtInicio->diff($exp->dtFim)->m);
                $dataFimValidacao->addDays($exp->dtInicio->diff($exp->dtFim)->d);
            }    
        }

        $diff = $experiencia->dtInicio->diff($dataFimValidacao);
        
        // Validação dos 4 anos para tipo de experiência = Meio Militar (EB, MB, FAB)
        /*****
        if($experiencia->tipoTituloId == 55){
            if($diff->y > 4) {
                \Session::flash('mensagem', ['msg'=>'Para o tipo de experência "Meio Militar (EB, MB, FAB)", não é possível cadastrar mais de 4 anos de exercício de atividade profissional.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao)); 
            }

            if ($diff->y >= 4 && ($diff->m >0 || $diff->d > 0)){
                \Session::flash('mensagem', ['msg'=>'Para o tipo de experência "Meio Militar (EB, MB, FAB)", não é possível cadastrar mais de 4 anos de exercício de atividade profissional.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao)); 
            }
        }
        *******/
        $experiencia->save();
        
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function excluirExperiencia($id, $idInscricao) {
        $id = Crypt::decrypt($id);
        $idInscricao = Crypt::decrypt($idInscricao);
        ExperienciaProfissional::where('id', '=', $id)->delete();
        return redirect()->route('candidato.habilitacoes', Crypt::encrypt($idInscricao));
    }

    public function finalizarInscricao($id){
        
        
        // Valida a habilitação mínima preenchida
        $id = Crypt::decrypt($id);
        $inscricao = Inscricao::find($id);
        if($inscricao->categoria->id == 1) { //OTT
            $habilitacao = Habilitacao::where('inscricaoId', '=', $id)->where('tipoTituloId', '=', 2)->first(); // Pega o Curso Superior
        } else if($inscricao->categoria->id == 2) { //STT
            $habilitacao = Habilitacao::where('inscricaoId', '=', $id)->where('tipoTituloId', '=', 21)->first(); // Pega o Ensino Médio
        } else if($inscricao->categoria->id == 3) { //CET
            $habilitacao = Habilitacao::where('inscricaoId', '=', $id)->where('tipoTituloId', '=', 40)->first(); // Pega o Ensino Fundamental
        }

        if ($habilitacao == null) {
            \Session::flash('mensagem', ['msg'=>'Por favor, verifique as habilitações cadastradas. A habilitacão obrigatória para o nível escolhido não foi preenchida.', 'class'=>'danger']);
            return redirect()->route('candidato.habilitacoes', Crypt::encrypt($id));
        }

        $dtFormacaoHabilitacao = Carbon::parse($habilitacao->dtFormacao);
        $listaExperiencias = ExperienciaProfissional::where('inscricaoId', '=', $id)->get();
        
        /*** 
        foreach ($listaExperiencias as $experiencia) {
            $dtInicial = Carbon::parse($experiencia->dtInicio);

            if($dtInicial <= $dtFormacaoHabilitacao){
                \Session::flash('mensagem', ['msg'=>'Por favor, verifique o período da(s) Experiência(s) Profissional(is) cadastrada(s). O período da experiência só é válido a partir da data de formação da habilitação profissioal.', 'class'=>'danger']);
                return redirect()->route('candidato.habilitacoes', Crypt::encrypt($id));
            }
        }
        ***/

        Inscricao::where('id','=',$id)->update(['inscricaoFinalizada'=>'1']);
        return redirect('candidato/dashboard');
    }

    public function gerarFicha($id){
        $id = Crypt::decrypt($id);
        $inscricao = Inscricao::find($id);

        if($inscricao->user->telFixo != '') {
            $telFixo = $inscricao->user->telFixo;
            $telFixoFormatado = "(" . substr($telFixo, 0,2) . ") " . substr($telFixo, 2,4) . "-" . substr($telFixo, 6,4);
            $inscricao->user->telFixo = $telFixoFormatado;
        }


        $telCelular = $inscricao->user->telCelular;
        $telCelularFormatado = "(" . substr($telCelular, 0, 2) . ") " . substr($telCelular, 2,5) . "-" . substr($telCelular,7,4) ;
        $inscricao->user->telCelular = $telCelularFormatado;

        $cep = $inscricao->user->cep;
        $cepFormatado = substr($cep, 0, 5) . "-" . substr($cep, 5, 3);
        $inscricao->user->cep = $cepFormatado;

        if(isset($inscricao->user->idtMil)) {
            $idtMil = $inscricao->user->idtMil;
            $idtMilFormatado = substr($idtMil, 0, 9) . "-" . substr($idtMil, 9,1);
            $inscricao->user->idtMil = $idtMilFormatado;
        }

        $dtNascimento = Carbon::parse($inscricao->user->dtNascimento);
        $inscricao->user->dtNascimento = $dtNascimento->format('d/m/Y');

        $listaHabilitacoes = Habilitacao::where('inscricaoId', '=', $id)->get();
        foreach ($listaHabilitacoes as $habilitacao) {
            $dtFormacao = Carbon::parse($habilitacao->dtFormacao);
            $habilitacao->dtFormacao = $dtFormacao->format('d/m/Y');
        }

        $listaTitulos = Titulo::where('inscricaoId', '=', $id)->get();
        foreach ($listaTitulos as $titulo) {
            $dtConclusao = Carbon::parse($titulo->dtConclusao);
            $titulo->dtConclusao = $dtConclusao->format('d/m/Y');
        }

        $listaCursos = Curso::where('inscricaoId', '=', $id)->get();
        foreach ($listaCursos as $curso) {
            $dtConclusao = Carbon::parse($curso->dtConclusao);
            $curso->dtConclusao = $dtConclusao->format('d/m/Y');
        }


        $listaCertificacoes = Certificacao::where('inscricaoId', '=', $id)->get();
        foreach ($listaCertificacoes as $certificacao) {
            $dtCertificacao = Carbon::parse($certificacao->dtCertificacao);
            $certificacao->dtCertificacao = $dtCertificacao->format('d/m/Y');
        }

        $listaPublicacoes = Publicacao::where('inscricaoId', '=', $id)->get();
        foreach ($listaPublicacoes as $publicacao) {
            $dtPublicacao = Carbon::parse($publicacao->dtPublicacao);
            $publicacao->dtPublicacao = $dtPublicacao->format('d/m/Y');
        }

        $listaExperiencia = ExperienciaProfissional::where('inscricaoId', '=', $id)->get();
        $dataInicio = 0;
        $dataFim = 0;
        $count = 0;

        if ($listaExperiencia->count() > 0){
            foreach ($listaExperiencia as $exp) {
                $exp->dtInicio = Carbon::parse($exp->dtInicio);
                $exp->dtFim = Carbon::parse($exp->dtFim);

                if($exp->dtInicio->diff($exp->dtFim)->d == 30)
                    $exp->dtFim->addDays(1);

                if($count == 0) {
                    $dataInicio = clone $exp->dtInicio;
                    $dataFim = clone $exp->dtFim;
                } else {
                    $dataFim->addYears($exp->dtInicio->diff($exp->dtFim)->y);
                    $dataFim->addMonths($exp->dtInicio->diff($exp->dtFim)->m);
                    $dataFim->addDays($exp->dtInicio->diff($exp->dtFim)->d);
                }

                $count++;
            }  
            
            $totalAnos = $dataInicio->diff($dataFim)->y;        
            $totalMeses = $dataInicio->diff($dataFim)->m;
            $totalDias = $dataInicio->diff($dataFim)->d;
        }

        //FAZ MOSTRA O NOME DA GUARNIÇAO NA FICHA E NÃO O ID
        $cidade = Guarnicao::find($inscricao->guarnicao);

        $pdf = PDF::loadView('ficha', compact(
            'inscricao', 
            'listaHabilitacoes', 
            'listaTitulos', 
            'listaCursos', 
            'listaPublicacoes', 
            'listaExperiencia', 
            'listaCertificacoes',
            'totalDias',
            'totalAnos',
            'totalMeses',
            'cidade'
        ));
        return $pdf->stream('Ficha de Inscrição.pdf');
    }
}
