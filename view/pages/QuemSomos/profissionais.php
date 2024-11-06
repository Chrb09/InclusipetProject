<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleQuemSomos.css" />
  <link rel="stylesheet" href="../../assets/css/StyleProfissionais.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Nossos Profissionais</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "quemsomos";
  include('../../components/headers/header.php');
  ?>
  <!--Conteudo-->

  <div class="main">
    <?php
    $sidebarActive = "profissionais";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");

      $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);

      $funcionarios = $funcionarioDao->getAllFuncionario();
      ?>
      <div class="titulo">Nossos Profissionais</div>
      <!--CODIGO DA PAGINA AQUI-->
      <div class="card-container">
        <?php foreach ($funcionarios as $funcionario): ?>
          <div class="card">
            <img src="../../assets/img/ImagensFuncionario/<?= $funcionario->imagem ?>" alt="" />
            <div class="table-wrapper">
              <table class="info">
                <tr>
                  <th>Nome</th>
                  <th>Especialidade</th>
                  <th>Unidade</th>
                  <th>Anos de atuação</th>
                </tr>
                <tr>
                  <td><?= $funcionario->nome ?></td>
                  <td><?= $funcionarioDao->getCargoByCod($funcionario->codcargo) ?></td>
                  <td><?= explode("- ", $funcionarioDao->getUnidadeByCod($funcionario->codunidade)[1])[1] ?></td>
                  <td><?php
                  $tempoAdmissao = 2024 - explode("-", $funcionario->dataAdmissao)[0];
                  if ($tempoAdmissao <= 0) {
                    echo "<1 Ano";
                  } else {
                    echo "$tempoAdmissao Anos";
                  }
                  ?></td>
                </tr>
              </table>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>