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
  <title>Dashboard</title>
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
        <div class="titulo">Dashboard</div>
        <br />
        <div class="grid-dashboard">
          <a class="nav-perfil" href="tabelapk.php?tabela=adocao"><img src="../../assets/img/Perfil/anunciar.png"
              alt="" />
            <div class="card-txt">
              <p>Adocao</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=agendamento"><img src="../../assets/img/Perfil/agendar.png"
              alt="" />
            <div class="card-txt">
              <p>Agendamento</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=animal"><img src="../../assets/img/Perfil/cadastrar.png"
              alt="" />
            <div class="card-txt">
              <p>Animal</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=cargo"><img src="../../assets/img/Perfil/funcionario.png"
              alt="" />
            <div class="card-txt">
              <p>Cargo</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=cliente"><img src="../../assets/img/Perfil/funcionario.png"
              alt="" />
            <div class="card-txt">
              <p>Cliente</p>
            </div>
          </a>
          <a class="nav-perfil desativado" href="tabelasempk.php?tabela=detalhes_adocao"><img
              src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Detalhes <br> Adocao</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=especie"><img src="../../assets/img/Perfil/cadastrar.png"
              alt="" />
            <div class="card-txt">
              <p>Especie</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=funcionario"><img
              src="../../assets/img/Perfil/funcionario.png" alt="" />
            <div class="card-txt">
              <p>Funcionario</p>
            </div>
          </a>
          <a class="nav-perfil desativado" href="tabelasempk.php?tabela=imagem_adocao"><img
              src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Imagem <br> Adocao</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=raca"><img src="../../assets/img/Perfil/cadastrar.png"
              alt="" />
            <div class="card-txt">
              <p>Raca</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=servico"><img src="../../assets/img/Perfil/agendar.png"
              alt="" />
            <div class="card-txt">
              <p>Servico</p>
            </div>
          </a>
          <a class="nav-perfil" href="tabelapk.php?tabela=unidade"><img src="../../assets/img/Perfil/agendar.png"
              alt="" />
            <div class="card-txt">
              <p>Unidade</p>
            </div>
          </a>
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