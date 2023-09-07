@extends('layouts.layout')
@section('content')
    <div class="container text-white">
        <!-- MENSAGEM DO VALIDATE DO BACK -->
        @if($errors->any())
            <div class="alert alert-danger error-message">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger error-message">
                {{ session('error') }}
            </div>
        @endif
    <!-- MENSAGEM DE RETORNO DO BACK -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="d-flex justify-content-center pt-4 ">
            <h1><U>Bem-vindo ao Sistema de Usuários</U></h1>
            </div>

        <div class="d-flex justify-content-center pt-4 " >
            <h5>Você está logado com perfil <b>{{Auth::user()->perfil}}</b>.</h5>
        </div>

        <div class="d-flex justify-content-center pt-2 " >
            <p>O Painel Administrativo de usuários  tem função de  criar , editar e trocar a senha de qualquer usuário,
                acesse com uma conta de perfil <b>"Administrador"</b>.</p>
        </div>

        <div class="d-flex justify-content-left pt-5 " >
            <h4>Meus Dados</h4>
        </div>

        <div class="d-flex table-responsive justify-content-center mt-5 ">
            <table class="table  table-dark text-center" id="table_usuarios">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Setor</th>
                    <th scope="col">Perfil</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{Auth::user()->email}}</td>
                    <td>{{Auth::user()->telefone}}</td>
                    <td>{{Auth::user()->setor}}</td>
                    <td>{{Auth::user()->perfil}}</td>

                </tr>

                </tbody>
            </table>

        </div>

        </div>

    <footer class="fixed-bottom text-lg-start bg-dark text-muted">
        <div class="text-center p-4 py-1 " style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" target="_blank" href="https://www.linkedin.com/in/rodrigo-duarte-461a99165/">Desenvolvido por Rodrigo da Silva Duarte</a>
        </div>
    </footer>

@endsection

