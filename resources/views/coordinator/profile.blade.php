@extends('admin.app')
@section('content')
    <form class="main-perfil-coordenador" id="main-perfilCoordenador" method="POST" action="{{ route('coordinator.edit', $user) }}" enctype="multipart/form-data">
        <div class="card-perfil">
            <h5 class="card-title">Perfil do Coordenador</h5>
            <div class="row row-perfil">
                <div class="col">
                    <label for="NomeCompleto" class="legenda">Nome Completo</label>
                    <input type="text" class="form-control" id="NomeCompleto" placeholder="Nome Completo"
                           aria-label="Nome Completo" name="name" value="{{$user->name}}" disabled>

                </div>
                <div class="col">
                    <label for="Email" class="legenda">Email</label>
                    <input type="text" class="form-control" id="Email" placeholder="Email"
                           aria-label="Email" name="email" value="{{$user->email}}" disabled>
                </div>
            </div>
            <div class="row row-perfil">
                <div class="col">
                    <label for="Status" class="legenda">Status</label>
                    <select class="form-control" id="Status" name="status" aria-label="Status" disabled>
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
                <a href="{{ route('coordinator.profile',$user->id) }}">
                    <button type="button" class="btn btn-success btn-add-editar">Editar <i class="fa-solid fa-pen"></i></button>
                </a>
            </div>
        </nav>
    </form>
@endsection

