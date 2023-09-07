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
            <h1><U>Gerenciamento de Usuários</U></h1>
        </div>
        <div class="d-flex justify-content-right mt-5">
            <input class="form-control w-25" type="search"  aria-label="Search" id="myInput" onkeyup="busca()" placeholder="Digite o nome do usuário"  />

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
                <th scope="col">Ações</th>
            </tr>
            </thead>
            @foreach($userList as $usr)
            <tbody>
            <tr>
                <td>{{$usr->name}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$usr->telefone}}</td>
                <td>{{$usr->setor}}</td>
                <td>{{$usr->perfil}}</td>
                <td style="width:25%">
                   <a href="{{route ('editar_perfil',$usr->id)}}"><img style="width: 7%;height: 7%" src="{{ asset('storage/icon-editar.png') }}"  title="Alterar" /></a>
                   <a href="{{ route('delete_usuario',$usr->id)}}" onclick="return confirm('O usuário será excluído.');"><img style="width: 7%;height: 7%" src="{{ asset('storage/icon-excluir.png') }}"  title="Excluir" /></a>
                </td>
            </tr>

            </tbody>
                @endforeach
        </table>

    </div>
    </div>
    <script>
        function busca() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("table_usuarios");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

@endsection
