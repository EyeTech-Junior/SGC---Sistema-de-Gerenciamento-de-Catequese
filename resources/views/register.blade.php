<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" href="{{URL::asset('/img/bx-church.png')}}">
    @vite(['resources/css/register.css', 'resources/js/app.js', 'resources/js/register.js'])
</head>

<body class="d-flex align-items-center pv-4">
    <main class="w-100 m-auto form-container">
        <form action="{{ route('registrar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
                <div class="alert alert-success">
                    <strong>Sucesso</strong>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    <strong>Erro no cadastro</strong>
                </div>
            @endif
            <h1 class="h1 mb-3 fw-bolder text-center titulo">Registro</h1>
            <div class="mb-3">
                <label for="name" class="legenda">Nome</label>
                <input type="text" class="form-control" id="name" placeholder="Seu Nome Completo"
                    autocomplete="on" required name="name">
            </div>
            <div class="mb-3">
                <label for="document" class="legenda">Centidão de Nascimento ou RG</label>
                <input type="text" class="form-control" id="document" placeholder="Nº do Seu Documento" required
                    name="identification">
            </div>
            <div class="mb-3">
                <label for="padrinho" class="legenda">Email</label>
                <input type="text" class="form-control" id="padrinho" placeholder="Email" required name="email">
            </div>
            <div class="mb-3">
                <label for="madrinha" class="legenda">Telefone</label>
                <input type="text" class="form-control" id="madrinha" placeholder="Telefone" required
                    name="phone">
            </div>
            <div>
                <p class="legenda">Arquivo</p>
                <div class="legenda input">
                    <input type="file" name="file" id="file-1" class="inputfile inputfile-1"
                        data-multiple-caption="{count} archivos seleccionados" multiple />
                    <label for="file-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17"
                            viewBox="0 0 20 17">
                            <path
                                d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z">
                            </path>
                        </svg>
                        <span class="iborrainputfile">Seleccionar archivo</span>
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 mt-4">Registrar</button>
        </form>
    </main>
</body>
</html>
