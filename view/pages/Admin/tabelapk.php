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
    <?php
    if (isset($_GET['tabela'])) {
        $tabela = $_GET['tabela'];
    } else {
        header("Location: dashboard.php");
    }

    ?>
    <title><?= $tabela ?></title>
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

            $stmt = $conn->prepare("DESCRIBE $tabela;");
            $stmt->execute();
            $colunas = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmtKeys = $conn->prepare("SHOW KEYS FROM $tabela WHERE Key_name = 'PRIMARY'");
            $stmtKeys->execute();
            $primaryKeys = $stmtKeys->fetchAll(PDO::FETCH_COLUMN, 4); // Index da coluna da chave primária
            
            ?>

            <div class="content">
                <?php include('../../components/navmobilevet.php');
                ?>
                <!-- Conteudo principal -->
                <div class="titulo"><?= $tabela ?></div>
                <br />
                <form class="form-container" id="dashboard-form">
                    <div class="form__cadastro">
                        <input type="hidden" id="operacao" value="inserir">
                        <?php
                        foreach ($colunas as $coluna) {
                            $nome = $coluna['Field']; // Nome da coluna
                            $tipo = $coluna['Type']; // Tipo completo da coluna
                            $nulo = $coluna['Null'];
                            $maxlength = null;
                            $min = null;
                            $max = null;
                            $isPrimaryKey = in_array($nome, $primaryKeys); // Verifica se a coluna é uma chave primária
                            $isRequired = false;

                            // Extraindo o tamanho da coluna (se houver)
                            if (preg_match('/\((\d+)\)/', $tipo, $matches)) {
                                $maxlength = $matches[1]; // Pega o valor dentro dos parênteses
                                if (stripos($tipo, 'tinyint') !== false) {
                                    $max = 1; // Para `tinyint`, 127 (se unsigned, ajuste para 255)
                                    $min = 0;    // Para signed, -128
                                } elseif (stripos($tipo, 'year') !== false) {
                                    $min = 1901; // Intervalo padrão do tipo `YEAR`
                                    $max = 2155;
                                }
                            }

                            if (!$isPrimaryKey) {
                                if ($nulo == 'NO') {
                                    $isRequired = true;
                                }
                            }

                            // Mapeando os tipos SQL para os tipos de input HTML
                            $tipoInput = 'text'; // Default
                            if (stripos($tipo, 'int') !== false || stripos($tipo, 'tinyint') !== false) {
                                $tipoInput = 'number';
                            } elseif (stripos($tipo, 'double') !== false) {
                                $tipoInput = 'number'; // Pode incluir atributos extras se necessário
                            } elseif (stripos($tipo, 'date') !== false) {
                                $tipoInput = 'date';
                            } elseif (stripos($tipo, 'year') !== false) {
                                $tipoInput = 'number';
                            } elseif (stripos($tipo, 'text') !== false) {
                                $tipoInput = 'textarea'; // Campos `text` podem ser mapeados para textarea
                            } elseif (stripos($tipo, 'varchar') !== false) {
                                $tipoInput = 'text';
                            } elseif (stripos($tipo, 'time') !== false) {
                                $tipoInput = 'time';
                            }

                            // Gerando o HTML dinamicamente
                            $divClass = $isPrimaryKey ? 'form-input desativado' : 'form-input'; // Adiciona 'desativado' se for chave primária
                            echo "<div class='$divClass'>";
                            echo "<label for='$nome'>$nome</label><br />";

                            if ($tipoInput === 'textarea') {
                                echo "<textarea name='$nome' placeholder='$nome...' id='$nome' " . ($isRequired ? " required" : "") . " ></textarea>";
                            } else {
                                echo "<input type='$tipoInput' name='$nome' id='$nome' placeholder='$nome...'" .
                                    ($min !== null ? " min='$min'" : "") .
                                    ($max !== null ? " max='$max'" : "") .
                                    ($maxlength && $tipoInput === 'text' ? " maxlength='$maxlength'" : "") .
                                    ($isPrimaryKey ? " tabindex='-1'" : "") .
                                    ($isRequired ? " required" : "") . " />"; // Desabilita o input se for chave primária
                            }

                            echo "</div>";
                        } ?>
                    </div>
                    <div class="button-wrapper-form button-side" id="button-side">
                        <button class="botao-solido" id="submit" type="submit">Cadastrar</button>
                        <div class="botao botao-borda limpar" id="limpar">Limpar</div>
                        <div class="botao botao-borda limpar" onclick="location.href='dashboard.php'">Voltar</div>
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
                                <?php foreach ($colunas as $coluna): ?>
                                    <option value="<?= $coluna['Field'] ?>"><?= $coluna['Field'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="group-top">
                        <label for="mostrar">Mostrar:</label>
                        <div class="custom-select">
                            <select id="mostrar" name="mostrar">
                                <option value="asc">Ascendente</option>
                                <option value="desc">Descendente</option>
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
                                <?php foreach ($colunas as $coluna): ?>
                                    <th><?= $coluna['Field'] ?></th>
                                <?php endforeach; ?>
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
    const inputPK = document.getElementById('<?= $colunas[0]["Field"] ?>');
    const limparButton = document.getElementById('limpar');
    const formulario = document.getElementById('dashboard-form');
    const operacao = document.getElementById('operacao');

    inputPK.addEventListener('input', () => {
        verificarInput();
    });
    limparButton.addEventListener('click', limpar);

    pesquisar.addEventListener('change', filtrar);
    coluna.addEventListener('change', filtrar);
    mostrar.addEventListener('change', filtrar);

    function filtrar() {
        const tbody = document.getElementById('tbody');

        tbody.innerHTML = '';
        // tbody.innerHTML = '<tr> <td> <button class="button-dashboard"> <img src="../../assets/img/Perfil/editar_icon.png" alt=""> </button> <button class="button-dashboard excluir"> <img src="../../assets/img/Perfil/excluir_icon.png" alt=""> </button> </td> </tr> '

        fetch(`filtrar.php?tabela=<?= $tabela ?>&pesquisar=${pesquisar.value}&coluna=${coluna.value}&mostrar=${mostrar.value}`)
            .then(response => response.json())
            .then(data => {
                if (!data || data.length === 0) {
                    console.warn("Nenhum dado retornado.");
                    tbody.innerHTML = '<tr><td colspan="<?= count($colunas) ?>">Nenhum registro encontrado</td></tr>';
                    return;
                }
                console.log(data)

                data.forEach(info => {
                    const tr = document.createElement('tr');
                    // Adiciona as ações (botões)
                    const actionsTd = document.createElement('td');
                    const firstKey = Object.keys(info)[0];  // Obtém a primeira chave
                    const firstValue = info[firstKey];  // Pega o valor correspondente

                    actionsTd.innerHTML = `
                        <button class="button-dashboard editar" data-id="${firstValue}">
                            <img src="../../assets/img/Perfil/editar_icon.png" alt="">
                        </button>
                        <button class="button-dashboard excluir" data-id="${firstValue}">
                            <img src="../../assets/img/Perfil/excluir_icon.png" alt="">
                        </button>
                    `;
                    tr.appendChild(actionsTd);

                    Object.values(info).forEach(value => {
                        const td = document.createElement('td');
                        td.textContent = value;
                        tr.appendChild(td);
                    });

                    tbody.appendChild(tr);
                });
            })
            .catch(error => console.error('Erro ao filtrar:', error));
    }

    tbody.addEventListener('click', function (event) {
        if (event.target.closest('.editar')) {
            const editarButton = event.target.closest('.editar');
            const codColuna = editarButton.getAttribute('data-id'); // Obtém o CodAdocao

            let url = `filtrar.php ? tabela = <?= $tabela ?> & pesquisar=${codColuna} & coluna=<?= $colunas[0]["Field"] ?>&mostrar=asc`
            url = url.replace(/\s+/g, '');
            console.log(url)
            fetch(url)
                .then(response => response.json())
                .then(data => {

                    console.log(data)
                    const pet = data[0];  // Supondo que só haverá um resultado

                    // Preenche os inputs com os dados do animal
                    // Preenche dinamicamente com base nas colunas
                    <?php
                    foreach ($colunas as $coluna) {
                        $nome = $coluna["Field"];
                        echo "document.getElementById('$nome').value = pet.$nome;";
                    }
                    ?>
                    verificarInput()
                })
                .catch(error => console.error('Erro ao carregar dados para edição:', error));
        } else if (event.target.closest('.excluir')) {
            const deletarButton = event.target.closest('.excluir');
            const codColuna = deletarButton.getAttribute('data-id'); // Obtém o CodAdocao

            Swal.fire({
                title: `<div class="titulo-sweetalert">Excluir</div>`,
                html: `
                <div class="form-sweetalert">
                    <p>Deseja excluir o registro ${codColuna}?</p>
                    <div class="linha-sweetalert">
                        <button class="botao-borda" onclick="Swal.close()"  type="button">Voltar</button>
                        <button class="botao-solido excluir" onclick="excluir(${codColuna})"type="button">Excluir</button>
                    </div>
                </div>
        `,
                customClass: {
                    popup: 'container-input',
                },
                showConfirmButton: false,
                focusConfirm: false,
                backdrop: "rgb(87, 77, 189, 0.5",
            });
        }
    });

    formulario.addEventListener('submit', function (event) {
        event.preventDefault(); // Impede o recarregamento da página

        if (operacao.value == 'inserir') {
            inserir()
        } else if (operacao.value == 'editar') {
            editar()
        }

    });

    function inserir() {
        const formData = new FormData(formulario);

        // Converte os dados para um objeto simples, se necessário
        const dados = Object.fromEntries(formData);

        console.log(dados);

        // Envia os dados com fetch
        fetch('sql.php?operacao=inserir&tabela=<?= $tabela ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
            .then(response => response.json())
            .then(data => {

                if (data.sucesso) {
                    Swal.fire({
                        html: `<div><p for="" >${data.mensagem}</p></div> `,
                        showConfirmButton: true,
                        icon: "success",
                        focusConfirm: true,
                        customClass: {
                            popup: 'container-custom',
                        },
                        backdrop: "rgb(87, 77, 189, 0.5",
                    });
                } else {
                    Swal.fire({
                        html: `<div><p for="" >${data.erro}</p></div> `,
                        showConfirmButton: true,
                        icon: "error",
                        focusConfirm: true,
                        customClass: {
                            popup: 'container-custom',
                        },
                        backdrop: "rgb(87, 77, 189, 0.5",
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    html: `<div><p for="" >${error}</p></div> `,
                    showConfirmButton: true,
                    icon: "error",
                    focusConfirm: true,
                    customClass: {
                        popup: 'container-custom',
                    },
                    backdrop: "rgb(87, 77, 189, 0.5",
                });
            });
        limpar();
        filtrar();
    }
    function editar() {
        const formData = new FormData(formulario);

        // Converte os dados para um objeto simples, se necessário
        const dados = Object.fromEntries(formData);

        dados.primaryKey = '<?= $colunas[0]["Field"] ?>';

        console.log(dados);

        // Envia os dados com fetch
        fetch('sql.php?operacao=editar&tabela=<?= $tabela ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(dados)
        })
            .then(response => response.json())
            .then(data => {

                if (data.sucesso) {
                    Swal.fire({
                        html: `<div><p for="" >${data.mensagem}</p></div> `,
                        showConfirmButton: true,
                        icon: "success",
                        focusConfirm: true,
                        customClass: {
                            popup: 'container-custom',
                        },
                        backdrop: "rgb(87, 77, 189, 0.5",
                    });
                } else {
                    Swal.fire({
                        html: `<div><p for="" >${data.erro}</p></div> `,
                        showConfirmButton: true,
                        icon: "error",
                        focusConfirm: true,
                        customClass: {
                            popup: 'container-custom',
                        },
                        backdrop: "rgb(87, 77, 189, 0.5",
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    html: `<div><p for="" >${error}</p></div> `,
                    showConfirmButton: true,
                    icon: "error",
                    focusConfirm: true,
                    customClass: {
                        popup: 'container-custom',
                    },
                    backdrop: "rgb(87, 77, 189, 0.5",
                });
            });
        limpar();
        filtrar();
    }
    function excluir() {
        Swal.close()
        Swal.fire({
            html: `<div><p for="" > Registro Excluido com sucesso!</p></div> `,
            showConfirmButton: true,
            icon: "success",
            focusConfirm: true,
            customClass: {
                popup: 'container-custom',
            },
            backdrop: "rgb(87, 77, 189, 0.5",
        });
        limpar()
        filtrar()
    }

    function verificarInput() {
        if (inputPK.value.trim() === '') {
            $("#submit").replaceWith(
                `<button class="botao-solido" id="submit" type="submit">Cadastrar</button>`
            )
            operacao.value = 'inserir'
        } else {
            $("#submit").replaceWith(
                `<button class="botao-solido" id="submit" type="submit">Editar</button>`
            )
            operacao.value = 'editar'
        }
    }

    function limpar() {
        <?php
        foreach ($colunas as $coluna) {
            $nome = $coluna["Field"];
            echo "document.getElementById('$nome').value = '';";
        }
        ?>
        verificarInput();
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Sua função aqui
        filtrar(); // Executa a função filtrar uma vez ao carregar a página
    });
</script>


</html>