<html lang="pt-BR">
<head><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Sistema de Usuários</title></head>
<section class="vh-100" style="background-color: #393f81;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{asset('storage/img3.webp')}}"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form action="{{route('autenticar')}}" method="POST" enctype="multipart/form-data">

                                @csrf


                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Login</span>
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

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="email" class="form-control form-control-lg"  required/>
                                        <label class="form-label" for="email">Email </label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="password" class="form-control form-control-lg"  required/>
                                        <label class="form-label" for="password">Senha</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Acessar</button>
                                    </div>

                                    <a class="small text-muted" href="{{route('recuperar_acesso')}}">Esqueceu a senha?</a>
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Não tem uma conta? <a href="{{route('cadastro')}}"
                                      style="color: #393f81;">Registre-se aqui</a></p>
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
