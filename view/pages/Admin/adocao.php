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
    <title>Adoção</title>
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
                <div class="titulo">Adoção</div>
                <br />
                <form class="form-container" action="" id="sign-up-form" method="POST">
                    <div class="form__cadastro">
                        <div class="form-input desativado">
                            <label for="">CodAdocao</label><br />
                            <input type="text" name="CodAdocao" placeholder="CodAdocao..." />
                        </div>
                        <div class="form-input">
                            <label for="">CodEspecie </label><br />
                            <input type="text" name="CodEspecie " placeholder="CodEspecie ..." required />
                        </div>
                        <div class="form-input">
                            <label for="">CodCliente </label><br />
                            <input type="text" name="CodCliente " placeholder="CodCliente ..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Nome</label><br />
                            <input type="text" name="Nome" placeholder="Nome..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Idade</label><br />
                            <input type="text" name="Idade" placeholder="Idade..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Porte</label><br />
                            <input type="text" name="Porte" placeholder="Porte..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Castrado</label><br />
                            <input type="text" name="Castrado" placeholder="Castrado..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Sexo</label><br />
                            <input type="text" name="Sexo" placeholder="Sexo..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Descricao</label><br />
                            <input type="text" name="Descricao" placeholder="Descricao..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Telefone</label><br />
                            <input type="text" name="Telefone" placeholder="Telefone..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Endereco</label><br />
                            <input type="text" name="Endereco" placeholder="Endereco..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Adotado</label><br />
                            <input type="text" name="Adotado" placeholder="Adotado..." required />
                        </div>
                        <div class="form-input">
                            <label for="">Aprovado</label><br />
                            <input type="text" name="Aprovado" placeholder="Aprovado..." required />
                        </div>
                        <div class="form-input">
                            <label for="">MotivoRecusar</label><br />
                            <input type="text" name="MotivoRecusar" placeholder="MotivoRecusar..." required />
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
                                <option value="CodAdocao">CodAdocao</option>
                                <option value="CodEspecie">CodEspecie</option>
                                <option value="CodCliente">CodCliente</option>
                                <option value="Nome">Nome</option>
                                <option value="Idade">Idade</option>
                                <option value="Porte">Porte</option>
                                <option value="Sexo">Sexo</option>
                                <option value="Descricao">Descricao</option>
                                <option value="Telefone">Telefone</option>
                                <option value="Endereco">Endereco</option>
                                <option value="Adotado">Adotado</option>
                                <option value="Aprovado">Aprovado</option>
                                <option value="MotivoRecusar">MotivoRecusar</option>
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
                                <th>CodAdocao </th>
                                <th>CodEspecie </th>
                                <th>CodCliente </th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Porte</th>
                                <th>Castrado</th>
                                <th>Sexo</th>
                                <th>Descricao</th>
                                <th>Telefone</th>
                                <th>Endereco</th>
                                <th>Adotado</th>
                                <th>Aprovado</th>
                                <th>MotivoRecusar</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
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
    const pesquisar = document.getElementById('pesquisar');
    const coluna = document.getElementById('coluna');
    const mostrar = document.getElementById('mostrar');

    pesquisar.addEventListener('change', filtrar());
    coluna.addEventListener('change', filtrar());
    mostrar.addEventListener('change', filtrar());

    function filtrar() {
        const tbody = document.getElementById('tbody');

        // Limpa o select de raças
        tbody.innerHTML = '<tr> <td> <button class="button-dashboard"> <img src="../../assets/img/Perfil/editar_icon.png" alt=""> </button> <button class="button-dashboard excluir"> <img src="../../assets/img/Perfil/excluir_icon.png" alt=""> </button> </td> </tr> '

        fetch(`filtrar.php?tabela=adocao&pesquisar=${pesquisar.value}&coluna=${coluna.value}&mostrar=${mostrar.value}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(info => {
                    const td = document.createElement('td');
                    const tr = document.createElement('tr');
                    td.textContent = info;
                    tr.appendChild(td);
                    tbody.appendChild(tr);
                });
            })
            .catch(error => console.error('Erro ao filtrar:', error));
    }


</script>


</html>