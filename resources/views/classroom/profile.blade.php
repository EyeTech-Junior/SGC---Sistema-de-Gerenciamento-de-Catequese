@extends('admin.app')
@section('content')
<form class="main-perfil-student" id="main-perfilStudent" enctype="multipart/form-data">
    @csrf
    <div class="card-perfil">
        @if (session('error'))
            <div class="alert alert-danger">
                <strong>Erro</strong>
            </div>
        @endif
        <h5 class="card-title">Perfil Turma</h5>
        <div class="row row-perfil">
            <div class="col">
                <label for="Paroquia" class="legenda">Paróquia</label>
                <input type="text" class="form-control" id="Paroquia" placeholder="Nome da Paroquia"
                       aria-label="Paroquia" name="parish" value="{{$classroom->parish}}" disabled>
            </div>
        </div>
        <div class="row row-perfil">
            <div class="col">
                <label for="Periodo" class="legenda">Ano/Semestre</label>
                <input type="text" class="form-control" id="Periodo" placeholder="Periodo"
                       aria-label="Periodo" name="year" value="{{$classroom->year}}" disabled>
            </div>
            <div class="col">
                <label for="Nome" class="legenda">Categoria</label>
                <select class="form-select" id="type" aria-label="type" name="type" disabled>
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
                <select class="form-select" multiple id="type" aria-label="type" name="coordinators" disabled>
                    @foreach ($coordinators as $coordinator)
                        @foreach($users as $user)
                            @if ($coordinator->user_id == $user->id and $classroom->id == $coordinator->classroom_id)
                                <option value="@{{$user->id}}" selected>{{$user->name}}</option>
                            @endif

                        @endforeach
                    @endforeach
                  </select>
            </div>
        </div>
    </div>
    <nav aria-label="..." class="nav-bottom-perfil">
        <div class="first-btn-perfil">

        </div>
        <div class="first-btn-perfil">

        </div>

        <div class="seconde-btn-perfil">
            <a href="{{ route('classroom.addStudent',$classroom->id) }}"><button type="button" class="btn btn-success btn-add-editar">Adicionar Alunos <i class="fa-solid fa-circle-plus"></i></button></a>
            <a href="{{ route('classroom.profile',$classroom->id) }}"> <button type="button" class="btn btn-success btn-add-editar">Editar <i class="fa-solid fa-pen"></i></button></a>
            <a href="{{ route('classroom.studentList',$classroom->id) }}"><button type="button" id="list-alunos-title" class="btn btn-primary" aria-current="true">Lista de alunos</button></a>
            <a href="{{ route('mail.send',$classroom->id) }}"><button type="button" id="list-alunos-title" class="btn btn-primary" aria-current="true">Notificar via e-mail</button></a>
        </div>
    </nav>
</form>
@endsection
