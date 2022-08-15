<x-app-layout>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Relatorio de Agendamento</title>
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
        <center>
            <h1>Relatorio de Agendamento</h1>
        </center>
        <br>
        <center>
            <form action="{{ route('report.schedules') }}" method="GET">
                @csrf
                <x-select :options="$clients" class="form-control" name="client_id" valueField="name"
                    label="Nome do Cliente" placeholder="Nome:" />
                <x-select :options="$blocks" class="form-control" name="block_id" valueField="block_type" label="Quadra"
                    placeholder="Quadra:" />
                <form class="row g-3">
                    <div class="col-md-4">
                        <label for="start">Data</label>
                        <input class="form-control" type="date" id="start" name="date" value=""
                            min="2022-01-01" max="2028-12-31">
                    </div>
                    <label>Tempo Inicial</label>
                    <input type="time" id="time" name="time">
                    <label>Tempo Final</label>
                    <input type="time" id="endTime" name="endTime">
                    <x-input name="total_price" placeholder="Ex:bola" type="text" label="Preço Total" />
                    <label>Pago</label>
                    <div>
                        <input class="form-check-input" type="checkbox" name="paid_out" value="1" id="paid_out">
                        <label class="form-check-label" for="paid_out">
                            Sim
                        </label>
                        <input class="form-check-input" type="checkbox" name="paid_out" value="0" id="paid_out">
                        <label class="form-check-label" for="paid_out">
                            Não
                        </label>
                    </div>
                    <button type="submit" class="btn btn-info">Verificar</button>
                </form>
            </form>
        </center>
    </body>

    </html>
</x-app-layout>
