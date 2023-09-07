<?php

namespace App\Http\Controllers;

use App\Mail\MeuEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    public function index ()
    {
        return view('login');
    }

    public function dashboard ()
    {
        if(Auth::check())
        {
            return view('dashboard');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Faça login para acessar o sistema',
            ])->onlyInput('email');

}
    public function autenticar (Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required',

        ], [
            'email.required' => 'Informe seu email',
            'password.required' => 'Informe sua senha',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('form_login')
                ->with("error", "Credenciais inválidas, tente novamente");
        }

    }
    public function recuperar_acesso ()
    {
        return view('recuperar_acesso');
    }


    public function enviar_senha (Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => trans(' Email não cadastrado no sistema')]);
        }

        else {
            $user = User::where('email','=', $request->email)->first();
            $gera_password = rand(100000,999999);
            $user->password = \Hash::make($gera_password);
            $user->update();
            $destinatario = $request->email;
            View::share('reset_password', $gera_password);
            $email = new MeuEmail();
            if ( Mail::to($destinatario)->send($email)) {
                return redirect('recuperar_acesso')->with("status", "Mensagem enviada com sucesso , acesse seu email");
            } else {
                return redirect('recuperar_acesso')->with("error", "Erro ao enviar a mensagem, contacte o administrador");
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('form_login');

    }

}
