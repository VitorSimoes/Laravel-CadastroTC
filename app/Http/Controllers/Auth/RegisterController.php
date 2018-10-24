<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
//        dd($data);
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|unique:users',
            'telefone' => 'required|string|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        $data['confirmation_code'] = str_random(25);

//        dd($data);
        $user = new User();
        $user->name = $data['name'];
        $user->tipo_pessoa=$data['pessoa'];
        $user->servidor = $data['servidor'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->cpf_cnpj = $data['cpf_cnpj'];
        $user->telefone = $data['telefone'];
//        $data->confirmation_code = $data['confirmation_code'];
        //0 para fisica
        if ($data['pessoa'] == 0) {
            $user->rg = $data['rg'];
        } else {
            $user->nome_empresa = $data['nome_empresa'];
            $user->cpf_coordenador = $data['cpf_coordenador'];
        }
        if ($data['servidor'] == 1) {
            $user->nome_orgao = $data['nome_orgao'];
        }
        $user->save();

        return $user;
    }
}
