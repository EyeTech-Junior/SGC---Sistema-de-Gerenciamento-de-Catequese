@extends('admin.app')
@section('content')
    <main id="list-screen-students" class="main-list-screen-students content px-3 py-2">
        <div class="container-fluid main-list">
            <div class="mb-3 mt-3 title-coordenacao">
                <h4 class="mb-0">Gerenciamento da Turma</h4>
            </div>
            <div class="container-fluid mb-3 p-0">
                <form class="d-flex w-100 search-list" role="search" method="POST" action="{{ route('classroom.searchClass') }}">
                    @csrf
                    <label hidden="hidden">
                        <input hidden="hidden" name="id" value="{{$classroom->id}}">
                    </label>
                    <input id="pesquisar-aluno" class="form-control m-0" name="search" placeholder="Pesquisar Aluno" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="lists">
                <div class="container-list">
                    <div class="list-group">
                            <span id="list-coordenadores-title"
                                  class="list-group-item list-group-item-action active list-title"
                                  aria-current="true">
                                Lista de Alunos da Turma
                            </span>
                        <div class="list-group-numbered">
                                @csrf
                                @foreach($list as $class)
                                    @foreach($students as $student)
                                        @if($student->id == $class->student_id)
                                            @if(!empty($student->id))
                                                <button type="button"
                                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                                    <span class="ms-2 me-auto">{{$student->name}}</span>
                                                    <div class="grid gap-0 column-gap-3">
                                                    <a href="{{ route('classroom.remove', ["$classroom->id", "$student->id"]) }}">Remover</a>
                                                    <span><a href="{{ route('student.lowProfile',$student->id) }}">Perfil</a></span>
                                                    </div>
                                                </button>
                                            @endif
                                        @endif
                                    @endforeach
                                @endforeach
                        </div>
                    </div>
                </div>
                    <div class="container-list">
                        <div class="list-group">
                            <span id="list-coordenadores-title"
                                  class="list-group-item list-group-item-action active list-title"
                                  aria-current="true">
                                Lista de Alunos Ativos
                            </span>
                            <div class="list-group-numbered">
                                @foreach ($students as $item)
                                    @if ($item->status == 1)
                                        <button type="button"
                                                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                            <span class="ms-2 me-auto">{{$item->name}}</span>
                                            <div class="grid gap-0 column-gap-3">
                                                <a href="{{ route('classroom.register', ["$classroom->id", "$item->id"]) }}">Adicionar</a>
                                                <a href="{{ route('student.lowProfile',$item->id) }}">Perfil</a>
                                            </div>
                                        </button>
                                    @endif
                                @endforeach
                            </div>
                            <nav aria-label="..." class="nav-bottom">
                            </nav>
                        </div>
                </div>
            </div>
        </div>
    </main>
@endsection
