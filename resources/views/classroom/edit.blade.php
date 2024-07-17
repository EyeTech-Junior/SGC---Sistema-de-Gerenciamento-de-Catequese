@extends('admin.app')
@section('content')
<form onsubmit="buttonSubmit.disabled=true; return true;" method="POST" action="{{ route('classroom.edit',$classroom) }}" class="main-perfil-student" id="main-perfilStudent" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card-perfil">
        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Erro ao Alterar</strong>
            </div>
        @endif
        <h5 class="card-title">Perfil da Turma</h5>
        <div class="row row-perfil">
            <div class="col">
                <label for="Paroquia" class="legenda">Paróquia</label>
                <input type="text" class="form-control" id="Paroquia" placeholder="Nome da Paroquia"
                       aria-label="Paroquia" name="parish" value="{{$classroom->parish}}">
            </div>
        </div>
        <div class="row row-perfil">
            <div class="col">
                <label for="Periodo" class="legenda">Ano/Semestre</label>
                <input type="text" class="form-control" id="Periodo" placeholder="Periodo"
                       aria-label="Periodo" name="year" value="{{$classroom->year}}">
            </div>
            <div class="col">
                <label for="Nome" class="legenda">Categoria</label>
                <select class="form-select" id="type" placeholder="Tipo" aria-label="type" name="type">
                    <option selected>Selecione categoria</option>
                    @foreach ($categories as $category)
                        @if ($category->id == $classroom->type)
                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif

                    @endforeach
                  </select>
            </div>
        </div>
        <div class="row row-perfil">
            <div class="col">
                <label for="Nome" class="legenda">Coordenadores</label>
                <select class="form-select" multiple id="type" aria-label="type" name="coordinators[]">
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user ->name}}</option>
                    @endforeach
                  </select>
            </div>
        </div>
    </div>
    <nav aria-label="..." class="nav-bottom-perfil">
        <div class="first-btn-perfil">

        </div>
        <div class="seconde-btn-perfil">
            <button type="reset" class="btn btn-danger">Resetar <i class="fa-solid fa-trash-can"></i></button>
            <a href="{{route('classroom.list')}}">
                <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
            </a>
            <button name="buttonSubmit" type="submit" class="btn btn-success btn-add-editar">Alterar <i class="fa-solid fa-circle-plus"></i></button>
        </div>
    </nav>
</form>
@endsection
