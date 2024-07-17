@extends('admin.app')
@section('content')
    <form onsubmit="buttonSubmit.disabled=true; return true;" class="main-perfil-student" id="main-perfilStudent" method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card-perfil">
            @if (session('success'))
                <div class="alert alert-success hidden" role="alert">
                    Aluno Alerado com Sucesso!
                </div>
            @endif
                @if (session('error'))
                    <div class="alert alert-danger hidden" role="alert">
                        Falha ao Alterar Aluno :(
                    </div>
            @endif
            <h5 class="card-title">Dados do Aluno</h5>
            <div class="row row-perfil">
                <div class="col">
                    <label for="NomeCompleto" class="legenda">Nome Completo</label>
                    <input type="text" class="form-control" id="NomeCompleto" placeholder="Nome Completo"
                           aria-label="Nome Completo" name="name">
                    <label for="Padrinho" class="legenda">Padrinho</label>
                    <input type="text" class="form-control" id="Padrinho" placeholder="Padrinho"
                           aria-label="Padrinho" name="padrinho">
                    <label for="Email" class="legenda">Email</label>
                    <input type="text" class="form-control" id="Email" placeholder="Email"
                           aria-label="Email" name="email">
                    <label for="Documento" class="legenda">Adicionar documento .PDF</label>
                    <input class="form-control" type="file" id="Documento" name="file" placeholder="Documento">
                </div>
                <div class="col">
                    <label for="Documento" class="legenda">Documento RG/CN</label>
                    <input type="text" class="form-control" id="Documento" placeholder="Documento"
                           aria-label="Documento" name="identification">
                    <label for="Madrinha" class="legenda">Madrinha</label>
                    <input type="text" class="form-control" id="Madrinha" placeholder="Madrinha"
                           aria-label="Madrinha" name="madrinha">
                    <label for="Telefone" class="legenda">Telefone</label>
                    <input type="text" class="form-control" id="Telefone" placeholder="Telefone"
                           aria-label="Telefone" name="phone">
                    <label for="Endereco" class="legenda">Endereço</label>
                    <input class="form-control" id="Endereco" name="address" placeholder="Endereço">
                </div>
            </div>
            <div class="row row-perfil">
                <div class="col">
                    <label for="Obervacao" class="legenda">Observações</label>
                    <input class="form-control" id="Obervacao" name="observation">
                </div>
            </div>
        </div>
        <nav aria-label="..." class="nav-bottom-perfil">
            <div class="first-btn-perfil">

            </div>
            <div class="seconde-btn-perfil">
                <button type="reset" class="btn btn-danger">Resetar <i class="fa-solid fa-trash-can"></i></button>
                <a href="{{route('student.list')}}">
                    <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
                </a>
                <button name="buttonSubmit" type="submit" class="btn btn-success btn-add-editar">Adicionar <i class="fa-solid fa-circle-plus"></i></button>
            </div>
        </nav>
    </form>
@endsection
