<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Cadastro de  Usuário</title></head>
<section class="vh-100" style="background-color: #393f81;">
    <div class="container py-15 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0 ">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ asset('storage/img1.webp') }}"
                                 alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;height: 100%" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-6 text-black ">

                                <form action="{{route('cadastrar')}}" method="POST" enctype="multipart/form-data" >
                                @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                        <span class="h1 fw-bold mb-0">Cadastro de Usuário</span>
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
                                        <label class="form-label" for="name">Nome <b class="text-danger">*</b></label>
                                        <input type="text" name="name" id="name" class="form-control"  required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email <b class="text-danger">*</b></label>
                                        <input type="email" name="email" id="email" class="form-control"  required />

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="telefone">Telefone <b class="text-danger">*</b></label>
                                        <input type="tel" name="telefone" id="telefone" class="form-control" maxlength="15" pattern="\(\d{2}\)\s*\d{5}-\d{4}" required />
                                        <script>const tel = document.getElementById('telefone') // Seletor do campo de telefone

                                            tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value))
                                            tel.addEventListener('change', (e) => mascaraTelefone(e.target.value))

                                            const mascaraTelefone = (valor) => {
                                                valor = valor.replace(/\D/g, "")
                                                valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
                                                valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
                                                tel.value = valor
                                            }</script>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="setor">Setor <b class="text-danger">*</b></label>
                                        <input type="text" name="setor" id="setor" class="form-control"  required/>

                                    </div>


                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Senha <b class="text-danger">*</b></label>
                                        <input type="password" name="password" id="password" class="form-control" minlength="5" required/>

                                    </div>




                                    <button type="submit" class="btn btn-dark btn-md center-block">Cadastrar</button>
                                    <a href="{{route('form_login')}}"><button type="button" class="btn btn-danger btn-md center-block"  style="max-width: 35%">Voltar</button></a>

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
