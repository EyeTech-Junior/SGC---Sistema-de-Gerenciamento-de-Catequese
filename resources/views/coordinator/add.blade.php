@extends('admin.app')
@section('content')
    <form onsubmit="buttonSubmit.disabled=true; return true;" class="main-perfil-coordenador" id="main-perfilCoordenador" method="POST" action="{{ route('coordinator.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-perfil">
            @if (session('success'))
            <div class="alert alert-success hidden" role="alert">
                Coordenador Cadastrado com Sucesso!
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger hidden" role="alert">
                Falha ao Cadastrar Coordenador :(
            </div>
            @endif
            <h5 class="card-title">Dados do Coordenador</h5>
            <div class="row row-perfil">
                <div class="col">
                    <label for="NomeCompleto" class="legenda">Nome Completo</label>
                    <input type="text" class="form-control" id="NomeCompleto" placeholder="Nome Completo"
                           aria-label="Nome Completo" name="name">
                    <label for="Email" class="legenda">Email</label>
                    <input type="email" class="form-control" id="Email" placeholder="Email"
                           aria-label="Email" autocomplete="on" name="email">
                </div>
                <div class="col">
                    <label for="Documento" class="legenda">Senha</label>
                    <input type="password" class="form-control" id="Documento" placeholder="Senha"
                           aria-label="Documento" name="password">
                    <label for="Telefone" class="legenda">Repita a Senha</label>
                    <input type="password" class="form-control" id="Telefone" placeholder="Repita a Senhas"
                           aria-label="Telefone" name="password2">
                </div>
            </div>
        </div>
        <nav aria-label="..." class="nav-bottom-perfil">
            <div class="first-btn-perfil">
            </div>
            <div class="second-btn-perfil">
                <a href="{{route('coordinator.list')}}">
                    <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
                </a>
                <button type="submit" class="btn btn-success btn-add-editar">Adicionar <i class="fa-solid fa-circle-plus"></i></button>
            </div>
        </nav>
    </form>
@endsection
