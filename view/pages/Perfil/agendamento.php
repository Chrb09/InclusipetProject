<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleMeusAgendamentos.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Agendamento</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">

    <?php
    $sidebarActive = "agendamentos";
    include('../../components/sidebarperfil.php');
    require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");
    ?>

    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); 
      
      $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);
      // $pets = $petDao->getPetsByCodCliente($clienteData->codcliente);
      ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Começo do conteúdo principal -->
        <div class="titulo">Agendamento de consulta do pet</div>

        <div class="pets">
          <span>Selecione o pet que deseja agendar uma consulta</span>
          <div class="meus-pets">
            <button class="button-pet selecionado" type="button">
              <img src="../../assets/img/Adocao/Animal1/img1.png" alt="" class="img-menor" /> Fonseca
            </button>

            <button class="button-pet" type="button">
              <img src="../../assets/img/Adocao/Animal3/img1.png" alt="" class="img-menor" />Neném
            </button>

            <button class="button-pet" type="button">
              <img src="../../assets/img/Adocao/Animal4/img1.png" alt="" class="img-menor" />Max
            </button>
          </div>
          <button class="button-pet button-cadastrar" onclick="location.href='cadastraranimal.php'" type="button">
            <img src="../../assets/img/Perfil/adicionar.png" alt="" class="img-menor novo-pet" />
            <div class="cadastrar-pet">Cadastrar Novo Pet</div>
          </button>
        </div>

        <form action="" class="form__cadastro">
          <div class="form-input">
            <label for="">Unidade</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="passaro">Pássaro</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Serviço</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="passaro">Pássaro</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Especialidade</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="passaro">Pássaro</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Profissional</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="passaro">Pássaro</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Data desejada para consulta</label><br />
            <input type="date" value="" max="" min="1900-01-01" />
          </div>

          <div class="form-input">
            <label for="">Horário desejado para consulta</label><br />
            <input type="time" value="" max="" min="1900-01-01" />
          </div>

          <div class="button-wrapper-form">
            <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
              Continuar
            </button>
          </div>
        </form>
        <!-- Fim do conteúdo principal -->
      </div>
    </div>
  </div>
</body>

</html>