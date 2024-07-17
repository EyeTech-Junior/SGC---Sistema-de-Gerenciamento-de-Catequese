@extends('admin.app')
@section('content')
    <main id="list-screen-students" class="main-list-screen-students content px-3 py-2">
        <div class=" container-fluid main-list">
            <div class="mb-3 mt-3 title-coordenacao">
                <h4 class="mb-0">Visualização das categorias</h4>
            </div>
            <div class="container-fluid mb-3 p-0">
                <form class="d-flex w-100 search-list" role="search" method="POST" action="{{ route('category.search') }}">
                    @csrf
                    <input id="pesquisar-coordenador" class="form-control m-0" name="search" placeholder="Pesquisar Categoria" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="list-group list">
                <button type="button" id="list-coordenadores-title" class="list-group-item list-group-item-action active list-title" aria-current="true">
                    Lista das Categorias
                </button>
                <div class="list-group-numbered">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            <strong>Erro ao pesquisar categoria</strong>
                        </div>
                    @endif
                    @foreach ($categories as $item)
                            @if ($item->type == 0)
                                <a href="{{ route('category.edit',$item->id) }}">
                                    <button type="button"
                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div class="ms-2 me-auto">{{ $item->name }}</div>
                                        <span class="badge text-bg-primary rounded-pill">Ativo</span>
                                    </button>
                                </a>
                            @else
                                <a href="{{ route('category.edit',$item->id) }}">
                                    <button type="button"
                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div class="ms-2 me-auto">{{ $item->name }}</div>
                                        <span class="badge text-bg-danger rounded-pill">inativo</span>
                                    </button>
                                </a>
                            @endif
                    @endforeach
                </div>
            </div>
            <nav aria-label="..." class="nav-bottom">
                <a href="{{ route('category.create') }}"><button id="btn-adicionar-aluno" class="btn btn-success btn-sm rounded-pill btn-add-aluno show">Adicionar Categoria</button></a>
                {{ $categories->onEachSide(0)->links() }}
            </nav>
        </div>
    </main>
@endsection
