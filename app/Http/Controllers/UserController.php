<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function cadastrar(Request $request , User $users)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' =>  'required|unique:users,email',
            'password' => 'required|min:5|',
            'telefone' => 'required',
            'setor' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'setor' => $request->setor,
            'perfil' => 'Usuário',
            'password' => Hash::make($request->password)
        ] ,
        [
            'name.required' => 'Informe seu nome',
            'email.required' => 'Informe seu email',
            'telefone.required' => 'Informe seu telefone',
            'password.required' => 'Informe sua senha',
            ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')
            ->with('status','Bem-vindo ao sistema!!');


    }
    /**
     * Display the specified resource.
     */
    public function adminUsers()
    {
        $user = User::orderBy('id', 'DESC')->get();
        if (Auth::user()->perfil=='Administrador'){
        return view('admin',['userList'=>$user]);
    } else {
       return redirect('dashboard')->with('error','Apenas administradores podem acessar esse conteúdo');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function editar_perfil($id)
    {
        $user = User::findOrFail($id);
        return view ('editar-perfil',['userList'=>$user]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update_perfil(Request $request, $id)
    {
            $user = User::find($id);
            if ($request->password == null) {
                $user->password;
            } else {
                $user->password = Hash::make($request->password);
            }
                $user->name = $request->name;
                $user->email = $request->email;
                $user->telefone = $request->telefone;
                $user->setor = $request->setor;
                $user->perfil = $request->perfil;
                $user->ultima_alteracao = Auth::user()->name;

        if ($user->update()) {
            return redirect('dashboard')->with('status', 'Dados atualizados com sucesso.');
        } else {
            return redirect('dashboard')->with('status', 'Erro ao atualizar seus dados.');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete( $id)
    {
        $user = User::find($id);
        if ($user->delete()) {
            return redirect('adminUsers')->with('status', 'Usuário excluído com sucesso.');
        } else {
            return redirect('adminUsers')->with('status', 'Erro ao excluir o usuário.');
        }
    }
}
