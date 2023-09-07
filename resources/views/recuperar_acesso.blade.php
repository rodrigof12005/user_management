<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Recuperar Acesso</title></head>
<section class="vh-100" style="background-color: #393f81;">
    <div class="container py-15 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 ">

                            <div class="card-body p-4 p-lg-5 text-black ">

                                <form action="{{route('enviar_senha')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf

                                    <div class="d-flex justify-content-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Recuperar Meu Acesso </span>
                                    </div>
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
                                    <div class="d-flex justify-content-center p-lg-3">
                                    <p>A senha será enviada para o email cadastrado no sistema, você poderá alterá-la clicando em <b>Editar Meu Perfil</b>
                                     após realizar novo acesso a sua conta.</p>
                                    </div>
                                    <div class="form-outline mb-4 w-50 p-3">
                                        <label class="form-label" for="email">Email <b class="text-danger">*</b></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Informe seu email" required />

                                    </div>
                                    <div class="form-outline mb-4 w-50 p-3">
                                    <button type="submit" class="btn btn-dark btn-md center-block">Enviar</button>
                                    <a href="{{route('form_login')}}"><button type="button" class="btn btn-danger btn-md center-block"  style="max-width: 35%">Voltar</button></a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</html>
