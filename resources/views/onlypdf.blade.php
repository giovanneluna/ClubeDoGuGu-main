<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <center>
        <h1>Relatorio de Agendamento</h1>
    </center>
    <hr>

    <table class=" fontable table table-bordered text-dark">
        <thead class="table-dark">
            <tr>
                <th scope="col">Nome do Cliente</th>
                <th scope="col">Quadra</th>
                <th scope="col">Data do Agendamento</th>
                <th scope="col">Inicio do Agendamento</th>
                <th scope="col">Fim do Agendamento</th>
                <th scope="col">Valor do Agendamento</th>
                <th scope="col">Pago</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <tr>
                <td scope="row">{{ $schedule->client->name }}</td>
                <td scope="row">{{ $schedule->block->block_type }} </td>
                <td scope="row">{{ $schedule->date }}</td>
                <td scope="row">{{ $schedule->time }}</td>
                <td scope="row">{{ $schedule->endTime }}</td>
                <td scope="row">{{ $schedule->total_price }}</td>
                <td scope="row">{{ $schedule->paid_out ? 'Sim' : 'Não' }}</td>
        </tbody>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
        </script>
</body>

</html>

<style>
    .fontable {
        font-family: 'arial';
        font-size: 10px;
    }

    tr {
        text-align: center;
    }
</style>
