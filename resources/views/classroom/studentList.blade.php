@extends('admin.app')
@section('content')
    <main id="list-screen-students" class="main-list-screen-students content px-3 py-2">
        <div class=" container-fluid main-list">
            <div class="mb-3 mt-3 title-coordenacao">
                <h4 class="mb-0">Visualização dos Alunos da Turma</h4>
            </div>
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    <strong>Erro ao cadastrar turma</strong>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <strong>Sucesso ao notificar os alunos</strong>
                </div>
            @endif
            <div class="container-fluid p-0 container-search-list">
                <form class="d-flex w-100 search-list" role="search" method="POST" action="{{ route('classroom.studentSearch') }}">
                    @csrf
                    <input id="pesquisar-turma" hidden="" name="id" value="{{$id}}">
                    <input id="pesquisar-turma" class="form-control m-0" name="search" placeholder="Pesquisar Aluno"
                           aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
            <div class="list-group list">
                <span id="list-coordenadores-title"
                      class="list-group-item list-group-item-action active list-title"
                      aria-current="true">
                        Lista dos Alunos
                    </span>
                <div class="list-group-numbered">
                    @foreach ($classrooms as $item)
                        @foreach ($students as $student)
                            @if ($student->id == $item->student_id)
                                <a href="{{ route('student.lowProfile',$student->id) }}">
                                    <button type="button"
                                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <span class="ms-2 me-auto">{{$student->name}}</span>
                                    </button>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
            <nav aria-label="..." class="nav-bottom">
                <div class="group-buttons">
                <a href="{{ route('classroom.addStudent',$id) }}"><button id="btn-adicionar-aluno" class="btn btn-success btn-sm rounded-pill btn-add-aluno show">Gerenciar Alunos</button></a>
                <a href="{{ route('mail.send',$id) }}"> <button id="btn-enviar-email" class="btn btn-primary btn-sm rounded-pill btn-send-email">Notificar alunos (Email) </button></a>
                </div>
                {{ $students->links() }}
            </nav>
        </div>
    </main>
@endsection
