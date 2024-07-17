@extends('admin.app')
@section('content')
    <form onsubmit="buttonSubmit.disabled=true; return true;" class="main-perfil-coordenador" id="main-perfilCoordenador" method="POST" action="{{ route('coordinator.edit', $user) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-perfil">
            @if (session('success'))
                <div class="alert alert-success hidden" role="alert">
                    Coordenador Alterarado com Sucesso!
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger hidden" role="alert">
                    Falha ao Alterar Coordenador :(
                </div>
            @endif
            <h5 class="card-title">Alterar dados do Coordenador</h5>
            <div class="row row-perfil">
                <div class="col">
                    <label for="NomeCompleto" class="legenda">Nome Completo</label>
                    <input type="text" class="form-control" id="NomeCompleto" placeholder="Nome Completo"
                           aria-label="Nome Completo" name="name" value="{{$user->name}}">
                    <label for="Email" class="legenda">Email</label>
                    <input type="text" class="form-control" id="Email" placeholder="Email"
                           aria-label="Email" autocomplete="on" name="email" value="{{$user->email}}">
                </div>
                <div class="col">
                    <label for="Senha" class="legenda">Nova Senha</label>
                    <input type="password" class="form-control" id="Senha" placeholder="Nova senha"
                           aria-label="Documento" name="password">
                    <label for="Senha" class="legenda">Repita a senha</label>
                    <input type="password" class="form-control" id="Senha" placeholder="Repita a senha"
                           aria-label="Senha" name="password2">
                </div>
            </div>
            <div class="row row-perfil">
                <div class="col">
                    <label for="Status" class="legenda">Status</label>
                    <select class="form-control" id="Status" name="status" aria-label="Status">
                        <option value="0" @if($user->status == 0) selected @endif>Ativo</option>
                        <option value="1" @if($user->status == 1) selected @endif>Inativo</option>
                    </select>
                </div>
            </div>
        </div>
        <nav aria-label="..." class="nav-bottom-perfil">
            <div class="first-btn-perfil">

            </div>
            <div class="seconde-btn-perfil">
                <a href="{{ route('coordinator.lowProfile',$user->id) }}">
                    <button type="reset" class="btn btn-primary">Resetar </i></button>
                    <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
                </a>
                <button type="submit" class="btn btn-success btn-add-editar">Editar <i class="fa-solid fa-pen"></i></button>
            </div>
        </nav>
    </form>
@endsection
