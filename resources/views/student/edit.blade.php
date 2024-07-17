@extends('admin.app')
@section('content')
        <form onsubmit="buttonSubmit.disabled=true; return true;" class="main-perfil-student" id="main-perfilStudent" method="POST" action="{{ route('student.edit', $student) }}" enctype="multipart/form-data">

            @method('PUT')
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
                <h5 class="card-title">Alterar dados do Aluno</h5>
                <div class="row row-perfil">
                    <div class="col">
                        <label for="NomeCompleto" class="legenda">Nome Completo</label>
                        <input type="text" class="form-control" id="NomeCompleto" placeholder="Nome Completo"
                               aria-label="Nome Completo" name="name" value="{{$student->name}}">
                        <label for="Padrinho" class="legenda">Padrinho</label>
                        <input type="text" class="form-control" id="Padrinho" placeholder="Padrinho"
                               aria-label="Padrinho" name="padrinho" value="{{$student->padrinho}}">
                        <label for="Email" class="legenda">Email</label>
                        <input type="text" class="form-control" id="Email" placeholder="Email"
                               aria-label="Email" name="email" value="{{$student->email}}">
                        <label for="Documento" class="legenda">Adicionar documento .PDF</label>
                        <input class="form-control" type="file" id="Documento" name="file" placeholder="Documento">
                    </div>
                    <div class="col">
                        <label for="Documento" class="legenda">Documento RG/CN</label>
                        <input type="text" class="form-control" id="Documento" placeholder="Documento"
                               aria-label="Documento" name="identification" value="{{$student->identification}}">
                        <label for="Madrinha" class="legenda">Madrinha</label>
                        <input type="text" class="form-control" id="Madrinha" placeholder="Madrinha"
                               aria-label="Madrinha" name="madrinha" value="{{$student->madrinha}}">
                        <label for="Telefone" class="legenda">Telefone</label>
                        <input type="text" class="form-control" id="Telefone" placeholder="Telefone"
                               aria-label="Telefone" name="phone" value="{{$student->phone}}">
                        <label for="Endereco" class="legenda">Endereço</label>
                        <input class="form-control" id="Endereco" name="address" placeholder="Endereço" value="{{$student->address}}">
                    </div>
                </div>


                <div class="row row-perfil">
                    <div class="col">
                        <label for="Obervacao" class="legenda">Observações</label>
                        <input class="form-control" id="Obervacao" name="observation" value="{{$student->observation}}">
                    </div>
                </div>
                    <div class="row row-perfil">
                        <div class="col">
                            <label for="Status" class="legenda">Status</label>
                            <select class="form-control" id="Status" name="status" aria-label="Status">
                                    <option value="1" @if($student->status == 1) selected @endif>Ativo</option>
                                    <option value="2" @if($student->status == 2) selected @endif>Inativo</option>
                                    <option value="0" @if($student->status == 0) selected @endif>Pendente</option>
                            </select>
                        </div>
                    </div>
            </div>
            <nav aria-label="..." class="nav-bottom-perfil">
                <div class="first-btn-perfil">

                </div>
                <div class="seconde-btn-perfil">
                    <button type="reset" class="btn btn-danger">Resetar <i class="fa-solid fa-trash-can"></i></button>
                    <a href="{{ route('student.lowProfile',$student->id) }}">
                        <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
                    </a>

                    <button type="submit" class="btn btn-success btn-add-editar">Alterar <i class="fa-solid fa-pen"></i></button>
                </div>
            </nav>
        </form>

@endsection


