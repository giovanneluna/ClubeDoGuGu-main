<x-app-layout>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Editar Quadras</title>
    </head>

    <body>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li><span>{{ $error }}</span></li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('blocks.update', $block->id) }}" method="POST">
            @csrf
            @method('PUT')
            <center>
                <h1>Editar Quadra {{ $block->block_type }}</h1>
                <form class="row g-3">
                    <div class="col-md-4">
                        <label>Tipo de Quadra</label>
                        <input name="block_type" type="text"
                            class="form-control"value="{{ $block->block_type }}"readonly="true">
                    </div>
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label>Esta Disponivel</label>
                            <input name="is_available" type="text"
                                class="form-control"value="{{ $block->is_available }}">
                        </div>
                        <label>Está Disponivel?</label>
                        <div>
                            <input class="form-check-input" type="checkbox" name="is_available" value="1"
                                id="is_available" {{ old('is_available') ? 'checked' : null }}>
                            <label class="form-check-label" for="is_available">
                                Sim
                            </label><br>
                            <input class="form-check-input" type="checkbox" name="is_available" value="0"
                                id="is_available1">
                            <label class="form-check-label" for="is_available1"
                                {{ old('is_available') ? 'checked' : null }}>
                                Não
                            </label>
                        </div>
                        <form class="row g-3">
                            <div class="col-md-4">
                                <label>Capacidade Total da Arquibancada</label>
                                <input name="public_amount" type="text"
                                    class="form-control"value="{{ $block->public_amount }}">
                            </div>
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label>Localização</label>
                                    <input name="local" type="text"
                                        class="form-control"value="{{ $block->local }}">
                                </div>
                                <form class="row g-3">
                                    <div class="col-md-4">
                                        <label>Quantidade Total de Jogadores dentro da Quadra</label>
                                        <input name="amount" type="text"
                                            class="form-control"value="{{ $block->amount }}">
                                    </div>
                                    <button type="submit" class="btn btn-success">Salvar</button>
                                </form>
                            </form>
                        </form>
                    </form>
                </form>

            </center>
    </body>

    </html>
</x-app-layout>
