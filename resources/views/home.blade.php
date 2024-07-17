@extends('admin.app')
@section('content')
    <main id="turmas-screen" class="container-fluid main-turmas">
        <div class="title-turmas">
            <h3 class="mb-0">Visualização das Turmas</h3>
            <a href="{{ route('classroom.create') }}">
            <button id="btn-addTurma" class="btn btn-success btn-turma btn-sm rounded-pill">Nova Turma</button>
            </a>
        </div>
        <div class="row row-cols-2 turmas">
                @foreach ($classrooms as $item)
                    @foreach ($categories as $category)
                        @if ($category->id == $item->type)
                        <div class="col card-turma">
                            <a href="{{ route('classroom.addStudent', $item->id) }}" class="card turma mb-3">
                                <h5 class="card-title m-0">{{ $item->year }} - {{ $category->name }} - {{ $item->parish }}
                                </h5>
                                <div class="card-color"></div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @endforeach
        </div>
        {{ $classrooms->links() }}
    </main>
@endsection
