@extends('admin.app')
@section('content')
<form onsubmit="buttonSubmit.disabled=true; return true;" class="main-add-category" id="main-addCategory" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="card-category">
        @if (session('success'))
            <div class="alert alert-success hidden" role="alert">
                Categoria Alerada com Sucesso!
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger hidden" role="alert">
                Falha ao Alterar Categoria :(
            </div>
        @endif
            <h5 class="card-title">Dados da Categoria</h5>
            <div class="row row-category">
            <div class="col">
                <label for="NomeCategoria" class="legenda">Nome da Categoria</label>
                <input type="text" class="form-control" id="NomeCategoria" placeholder="Nome"
                       aria-label="Nome Categoria" name="name">
                <label for="Descricao" class="legenda">Descrição da Categoria</label>
                <input type="text" class="form-control" id="Descricao" placeholder="Descrição"
                       aria-label="Descricao" name="description">

            </div>
        </div>
    </div>
    <nav aria-label="..." class="nav-bottom-category">
        <div class="second-btn-category">
            <button type="reset" class="btn btn-danger">Deletar <i class="fa-solid fa-trash-can"></i></button>
            <a href="{{route('category.index')}}">
            <button type="button" class="btn btn-danger">Cancelar <i class="fa-solid fa-ban"></i></button>
            </a>
            <button type="submit" class="btn btn-success btn-add-editar">Adicionar <i class="fa-solid fa-circle-plus"></i></button>
        </div>
    </nav>
</form>
@endsection
