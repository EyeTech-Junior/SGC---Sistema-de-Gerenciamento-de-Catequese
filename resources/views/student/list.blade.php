@extends('admin.app')
@section('content')
<main id="list-screen-students" class="main-list-screen-students content px-3 py-2">
<div class="container-fluid main-list">
    @if (session('success'))
        <div class="alert alert-success">
            <strong>Sucesso</strong>
        </div>
    @endif
    <div class="mb-3 mt-3 title-coordenacao">
        <h4 class="mb-0">Visualização dos Alunos</h4>
    </div>
    <div class="container-fluid p-0 container-search-list">
        <form class="d-flex w-100 search-list" role="search" method="POST" action="{{ route('student.show') }}">
            @csrf
            <input id="pesquisar-coordenador" class="form-control m-0" name="search"
                placeholder="Pesquisar Aluno" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>
    <div class="list-group">
        <span id="list-coordenadores-title"
            class="list-group-item list-group-item-action active list-title"
            aria-current="true">
            Lista dos Alunos
        </span>
        <div class="list-group-numbered">
        @if (session('error'))
                        <div class="alert alert-danger">
                            <strong>Erro ao pesquisar aluno</strong>
                        </div>
                    @endif
                    @foreach ($students as $item)
                        @if ($item->status == 1)
                                <a href="{{ route('student.lowProfile',$item->id) }}">
                                <button type="button"
                                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <span class="ms-2 me-auto">{{$item->name}}</span>
                                    <span class="badge text-bg-success rounded-pill">Ativo</span>
                                </button>
                            </a>
                        @endif

                        @if ($item->status == 2)
                            <a href="{{ route('student.lowProfile',$item->id) }}">
                                <button type="button"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div class="ms-2 me-auto">{{$item->name}}</div>
                                    <span class="badge text-bg-danger rounded-pill">inativo</span>
                                </button>
                            </a>
                        @endif

                        @if ($item->status == 0)
                            <a href="{{ route('student.lowProfile',$item->id) }}">
                                <button type="button"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                    <div class="ms-2 me-auto">{{$item->name}}</div>
                                    <span class="badge text-bg-secondary rounded-pill">Pendente</span>
                                </button>
                            </a>
                        @endif
                    @endforeach
        </div>
    </div>
    <nav aria-label="..." class="nav-bottom">
        <a href="{{ route('student.create') }}">
        <button id="btn-adicionar-coordenador"
            class="btn btn-success btn-sm rounded-pill btn-add-coordenador">Adicionar Aluno
        </button>
        </a>
        {{ $students->links() }}
    </nav>
</div>
</main>
@endsection

