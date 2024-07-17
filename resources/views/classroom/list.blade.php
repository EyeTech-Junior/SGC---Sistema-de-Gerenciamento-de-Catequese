@extends('admin.app')
@section('content')
    <main id="list-screen-students" class="main-list-screen-students content px-3 py-2">
        <div class=" container-fluid main-list">
            <div class="mb-3 mt-3 title-coordenacao">
                <h4 class="mb-0">Visualização das Turmas</h4>
            </div>
            <div class="container-fluid p-0 container-search-list">
                <form class="d-flex w-100 search-list" role="search" method="POST" action="{{ route('classroom.show') }}">
                    @csrf
                    <input id="pesquisar-turma" class="form-control m-0" name="search" placeholder="Pesquisar Turma"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="list-group list">
                <span id="list-coordenadores-title"
                      class="list-group-item list-group-item-action active list-title"
                      aria-current="true">
                        Lista das Turmas
                    </span>
                <div class="list-group-numbered">
                    @foreach ($classrooms as $item)
                        @foreach ($categories as $category)
                            @if ($category->id == $item->type)
                                <a href="{{ route('classroom.lowProfile', $item->id) }}">
                                    <button type="button"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div class="ms-2 me-auto">{{ $item->year }} - {{ $category->name }} -
                                            {{ $item->parish }}</div>
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
            <nav aria-label="..." class="nav-bottom">
                <a href="{{ route('classroom.create') }}"><button id="btn-adicionar-aluno"
                        class="btn btn-success btn-sm rounded-pill btn-add-aluno show">Adicionar Turma</button></a>
                {{ $classrooms->links() }}
            </nav>
        </div>
    </main>
@endsection
