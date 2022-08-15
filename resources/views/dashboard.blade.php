<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="UTF-8">
    <div class="bg-gray-200 text-black">
        <div class="bg-light border bg-white first-letter:bg-white p-1">
            <h1>
                <p style="text-align:center;">Dados do Clube</p>
            </h1>
        </div>
        <div class="px-2 py-3 bg-gray-100 sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md text-gray-800">

            <h3 style="text-align:center;">Esportes</p>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#sport">
                    Visualizar
                </button>
                <p>

                    <center>
                        <div class="modal fade" id="sport" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="sport">Esportes</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="/sports/"><button type="button" class="btn btn-success">Visualizar
                                            </button></a>
                                        <a href="sports/create"><button type="submit"
                                                class="btn btn-info">Cadastrar</button></a>
                                        <p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </center>

                </p>

                <h3 style="text-align:center;">Quadras</p>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#block">
                        Visualizar
                    </button>
                    <p>

                        <center>
                            <div class="modal fade" id="block" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center" id="client">Quadras</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <a href="/blocks/"><button type="button"
                                                    class="btn btn-success">Visualizar</button></a>
                                            <a href="blocks/create"><button type="submit"
                                                    class="btn btn-info">Cadastrar</button></a>
                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </center>

                    </p>


                    <h3 style="text-align:center;">Clientes</p>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#client">
                            Visualizar
                        </button>
                        <p>

                            <center>
                                <div class="modal fade" id="client" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="client">Clientes</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="/clients/"><button type="button"
                                                        class="btn btn-success">Visualizar</button></a>
                                                <a href="clients/create"><button type="submit"
                                                        class="btn btn-info">Cadastrar</button></a>
                                                <hr>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                        </p>

                        <h3 style="text-align:center;">Equipamentos </p>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#equipment">
                                Visualizar
                            </button>

                            <center>
                                <div class="modal fade" id="equipment" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="equipment">Equipamentos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="/equipments"><button
                                                        type="button"class="btn btn-success">Visualizar</button></a>
                                                <a href="equipments/create"><button type="submit"
                                                        class="btn btn-info">Cadastrar</button></a>
                                                <a href="equipment-stocks"><button type="submit"
                                                        class="btn btn-warning">Estoque</button></a>

                                                <hr>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Fechar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>

                            </p>
                            <h3 style="text-align:center;">Agendamentos e Relatorios </p>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#reportschedule">
                                    Visualizar
                                </button>

                                <center>
                                    <div class="modal fade" id="reportschedule" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-center" id="reportschedule">
                                                        Agendamentos
                                                        e Relatorios</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h5>Agendamentos</h5>
                                                    <a href="/schedules/"><button type="button"
                                                            class="btn btn-success">Agendamentos</button></a>
                                                    <p>
                                                        <hr>
                                                    <h5>Relatorios</h5>
                                                    <a href="report/schedules"><button type="button"
                                                            class="btn btn-warning">Todos
                                                            Relatorios</button></a>
                                                    <a href="report"><button type="button"
                                                            class="btn btn-warning">Fazer
                                                            Relatorio</button></a>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </center>
</x-app-layout>
