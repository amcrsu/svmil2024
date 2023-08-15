<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use App\Inscricao;
use \Crypt;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/candidato/habilitacoes';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['cpf'] = str_replace([".", "-"], "", $data['cpf']);
        $data['rg'] = str_replace([".", "-"], "", $data['rg']);
        $data['cep'] = str_replace("-", "", $data['cep']);
        $data['telFixo'] = str_replace(["-", "(", ") "], "", $data['telFixo']);
        $data['telCelular'] = str_replace(["-", "(", ") "], "", $data['telCelular']);

        if (isset($data['idtMil'])) {
            $data['idtMil'] = str_replace("-", "", $data['idtMil']);
        }

        return Validator::make($data, [
            'nome' => 'required|max:100',
            'senha' => 'required|min:8|confirmed',
            'nomePai' => 'nullable|max:100',
            'nomeMae' => 'nullable|max:100',
            'email' => 'required|email|max:150',
            'cpf' => 'required|min:10|max:20',
            'altura' => 'required|min:3',
            'sexo' => 'required',
            'rg' => 'required|max:20',
            'numDependentes' => 'required|max:2',
            'dtNascimento' => 'required|date_format:d/m/Y',
            'endereco' => 'required|max:100',
            'numero' => 'required|max:10',
            'bairro' => 'nullable|max:50',
            'cep' => 'required|min:8',
            'complemento' => 'nullable|max:100',
            'telFixo' => 'min:10',
            'telCelular' => 'required|min:11',
            'anosSvPub' => 'nullable|max:1',
            'mesesSvPub' => 'nullable|max:2',
            'diasSvPub' => 'nullable|max:2',
            'idtMil' => 'nullable|max:10',
            'forcaId'=> 'nullable',
            'situacaoId' => 'required',
            'orgaoExpedidor' => 'required',
            'estadoCivilId' => 'required',
            'tipoDocMilitarId' => 'required',
            'forcaDocMilitarId' => 'nullable',
            'cidadeEndId' => 'required',
            'cidadeNascId' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $data['cpf'] = str_replace([".", "-"], "", $data['cpf']);
        $data['rg'] = str_replace([".", "-"], "", $data['rg']);
        $data['cep'] = str_replace("-", "", $data['cep']);
        $data['telFixo'] = str_replace(["-", "(", ") "], "", $data['telFixo']);
        $data['telCelular'] = str_replace(["-", "(", ") "], "", $data['telCelular']);
        $date = Carbon::createFromFormat('d/m/Y',$data['dtNascimento']);

        if (isset($data['idtMil'])) {
            $data['idtMil'] = str_replace("-", "", $data['idtMil']);
        }

        if (isset($data['forcaId']) == false) {
            $data['forcaId'] = null;
        }

        $user = User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'senha' => bcrypt($data['senha']),
            'nomePai' => $data['nomePai'],
            'nomeMae' => $data['nomeMae'],
            'cpf' => $data['cpf'],
            'altura' => $data['altura'],
            'sexo' => $data['sexo'],
            'rg' => $data['rg'],
            'numDependentes' => $data['numDependentes'],
            'dtNascimento' => $date,
            'endereco' => $data['endereco'],
            'numero' => $data['numero'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'complemento' => $data['complemento'],
            'telFixo' => $data['telFixo'],
            'telCelular' => $data['telCelular'],
            'anosSvPub' => $data['anosSvPub'],
            'mesesSvPub' => $data['mesesSvPub'],
            'diasSvPub' => $data['diasSvPub'],
            'idtMil' => $data['idtMil'],
            'forcaId'=> $data['forcaId'],
            'situacaoId' => $data['situacaoId'],
            'orgaoExpedidor' => $data['orgaoExpedidor'],
            'estadoCivilId' => $data['estadoCivilId'],
            'tipoDocMilId' => $data['tipoDocMilitarId'],
            'forcaDocMilId' => $data['forcaId'],
            'cidadeEndId' => $data['cidadeEndId'],
            'cidadeNascId' => $data['cidadeNascId']
        ]);

        $countInscricoes = Inscricao::all()->count() + date("YmdHis");
        
        if($data['categoriaId'] == 1) {//OTT 
            $codInscricao = "OTT" . $countInscricoes;
        } else if($data['categoriaId'] == 2) { //STT
            $codInscricao = "STT" . $countInscricoes;
        } else { //CET
            $codInscricao = "CET" . $countInscricoes;
        }

        $inscricao = new Inscricao();
        $inscricao->codInscricao = $codInscricao;
        $inscricao->userId = $user->id;
        $inscricao->categoriaId = $data['categoriaId'];
        $inscricao->areaId = $data['areaId'];
        $inscricao->guarnicao = $data['guarnicao'];
        $inscricao->inscricaoFinalizada = '0';

        if(isset($data['subAreaId'])){
            $inscricao->subareaId = $data['subAreaId'];
        }

        $inscricao->save();
        $this->guard()->login($user);
        $this->redirectTo = '/candidato/habilitacoes/'.Crypt::encrypt($inscricao->id);

        return $user;
    }
}
