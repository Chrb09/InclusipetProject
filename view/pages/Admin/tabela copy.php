<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
    <!-- CSS EXTERNO GERAL -->
    <link rel="stylesheet" href="../../assets/css/StylePerfil.css" />
    <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
    <link rel="stylesheet" href="../../assets/css/StyleDashboard.css" />
    <!-- CSS EXTERNO PAGINA -->
    <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
    <!-- ICON -->
    <title>Tabela</title>
</head>

<body>
    <!-- PERFIL -->
    <div class="container-usuario">
        <?php

        $sidebarActive = "admin";
        include('../../components/sidebarvet.php');
        ?>
        <div class="main">
            <?php include('../../components/headers/headerperfilfuncionario.php');
            if ($funcionarioData->admin != '1') {
                $message->setMessage("É necessario ser administrador para acessar essa página!", "error", "popup", "../../../view/pages/Funcionario/perfil.php");
                exit();
            }
            ?>

            <div class="content">
                <?php include('../../components/navmobilevet.php');
                ?>
                <!-- Conteudo principal -->
                <div class="titulo">Tabela</div>
                <br />
                <form class="form-container" action="" id="sign-up-form" method="POST">
                    <div class="form__cadastro">
                        <div class="form-input desativado">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Campo</label><br />
                            <input type="text" name="" placeholder="..." required />
                        </div>
                    </div>
                    <div class="button-wrapper-form button-side">
                        <button class="botao-solido" type="submit">Cadastrar</button>
                        <button class="botao botao-borda" type="reset">Limpar</button>
                    </div>
                </form>
                <div class="hr"></div>

                <div class="top">

                    <div class="group-top">
                        <label for="pesquisar">Pesquisar:</label>
                        <input type="text" id="pesquisar" name="pesquisar" placeholder="Pesquise por um registro..." />
                    </div>

                    <div class="group-top">
                        <label for="coluna">Coluna:</label>
                        <div class="custom-select">
                            <select id="coluna" name="coluna">
                                <option value="campo1">Campo 1</option>
                            </select>
                        </div>
                    </div>

                    <div class="group-top">
                        <label for="mostrar">Mostrar:</label>
                        <div class="custom-select">
                            <select id="mostrar" name="mostrar">
                                <option value="ASC">Ascendente</option>
                                <option value="DESC">Descendente</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>

                <div class="table-wrapper">
                    <table class="table-dashboard">
                        <thead>
                            <tr>
                                <th>Ações</th>
                                <th>Header 1</th>
                                <th>Header 2</th>
                                <th>Header 3</th>
                                <th>Header 4</th>
                                <th>Header 5</th>
                                <th>Header 6</th>
                                <th>Header 7</th>
                                <th>Header 8</th>
                                <th>Header 9</th>
                                <th>Header 10</th>
                                <th>Header 11</th>
                                <th>Header 12</th>
                                <th>Header 13</th>
                                <th>Header 14</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                                <td>Content 1</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                                <td>Content 2</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                                <td>Content 3</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                                <td>Content 4</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                                <td>Content 5</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                                <td>Content 6</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                                <td>Content 7</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                                <td>Content 8</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                                <td>Content 9</td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="button-dashboard">
                                        <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                                    </button>
                                    <button class="button-dashboard excluir">
                                        <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                                    </button>
                                </td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                                <td>Content 10</td>
                            </tr>
                        <tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

<script>

</script>


</html>