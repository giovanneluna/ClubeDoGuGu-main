<x-app-layout>

    <head>
        <div class="p-3 mb-2 bg-gray-100 text-dark">

            <h2 class="d-flex justify-content-center">Estoque de Equipamentos</h2>

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
                crossorigin="anonymous">

    </head>

    <body>
        <center>
            <a href="equipment-stocks/create" button type="submit" class="btn btn-info">Cadastrar Estoque</a>
        </center>
        <br>

        <table class=" table table-bordered text-dark">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Equipamento</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            @foreach ($equipmentStocks as $equipmentStock)
                <tbody class="table-group-divider">
                    <tr>
                        <td scope="row">{{ $equipmentStock->id }}</td>
                        <td scope="row">{{ $equipmentStock->equipment->name }}</td>
                        <td scope="row">{{ $equipmentStock->quantity }}</td>
                        <td scope="row"><a href="{{ route('equipment-stocks.edit', $equipmentStock->id) }}"><button
                                    type="submit" class="btn btn-success ">Editar</button></a></td>
                        <td scope="row">
                            <form method="POST" action="{{ route('equipment-stocks.destroy', $equipmentStock->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="form-group">
                                    <input type="submit" class="btn btn-danger delete-user" value="DELETAR">
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
                </div>
            @endforeach
    </body>
</x-app-layout>
<style>
    .fontable {
        font-family: 'arial';
        font-size: 10px;
    }

    tr {
        text-align: center;
    }
</style>
