<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StylePerfil.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Perfil</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <div class="sidebar">
      <div class="sidebar-background"></div>
      <div class="sidebar-nav">
        <b>Área do Funcionario</b>
        <button class="sidebar-button ativo" onclick="location.href='perfil.php'" type="button">Perfil</button>
        <button class="sidebar-button" onclick="location.href='agendamentos.php'" type="button">Agendamentos</button>
        <button class="sidebar-button" onclick="location.href='aprovaradocao.php'" type="button">
          Aprovar Adoção
        </button>
        <button class="sidebar-button" onclick="location.href='cadastrarfuncionario.php'" type="button">
          Cadastrar Funcionario
        </button>
        <button class="sidebar-button" onclick="location.href='funcoesdotutor.php'" type="button">
          Funçoes do tutor
        </button>
      </div>
      <div class="copyright-sidebar">®2024 Inclusipet. Todos os direitos reservados.</div>
    </div>

    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">
        <div class="section-nav-mobile">
          <div class="details open_faq">
            <div class="summary">Área do Funcionario</div>
            <div class="wrapper-faq">
              <div class="colapse">
                <div class="nav-mobile">
                  <button class="sidebar-button ativo" onclick="location.href='perfil.php'" type="button">
                    Perfil
                  </button>
                  <button class="sidebar-button" onclick="location.href='agendamentos.php'" type="button">
                    Agendamentos
                  </button>
                  <button class="sidebar-button" onclick="location.href='aprovaradocao.php'" type="button">
                    Aprovar Adoção
                  </button>
                  <button class="sidebar-button" onclick="location.href='cadastrarfuncionario.php'" type="button">
                    Cadastrar Funcionario
                  </button>
                  <button class="sidebar-button" onclick="location.href='funcoesdotutor.php'" type="button">
                    Funçoes do tutor
                  </button>
                </div>
              </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
              class="arrow_faq">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </div>
        </div>
        <script src="../../assets/js/nav_mobile.js"></script>

        <!-- Conteudo principal -->
        <div class="titulo">Perfil</div>

        <div class="usuario" id="usuario">
          <div class="foto-edit">
            <div class="foto-edit-wrapper">
              <img src="../../assets/img/QuemSomos/prof3.png" alt="Foto do pet" class="foto-edit-img" />
              <div class="edit">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />
              </div>
            </div>
            <ins><a href="">Alterar Senha</a></ins>
          </div>
          <div class="info_usuario">
            <table class="info-table">
              <tr>
                <th>Nome:</th>
                <td>YuYuHakusho Roxo</td>
              </tr>
              <tr>
                <th>Cargo:</th>
                <td>Clínico Geral</td>
              </tr>
              <tr>
                <th>CPF:</th>
                <td>252.910.260-06</td>
              </tr>
              <tr>
                <th>RG:</th>
                <td>42.707.138-0</td>
              </tr>
              <tr>
                <th>CEP:</th>
                <td>83020-030</td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td>+11 91234-5678</td>
              </tr>
              <tr>
                <th>Unidade:</th>
                <td>Artur Alvim</td>
              </tr>
            </table>
            <div class="linha">
              <button class="botao-solido sair-button" onclick="" type="button">
                <img src="../../assets/img/Perfil/sair.png" alt="" />Sair
              </button>
            </div>
          </div>
        </div>
        <br />
        <br />
        <div class="acoes">
          <a class="nav-perfil" href="agendamento.php"><img src="../../assets/img/Perfil/agendar.png" alt="" />
            <div class="card-txt">
              <p>Calendario</p>
              <strong>Agendamentos</strong>
            </div>
          </a>
          <a class="nav-perfil" href="anuncioadocao.php"><img src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Aprovar Anuncio</p>
              <strong>de Adoção</strong>
            </div>
          </a>
          <a class="nav-perfil" href="cadastraranimal.php"><img src="../../assets/img/Perfil/funcionario.png" alt="" />
            <div class="card-txt">
              <p>Cadastrar</p>
              <strong>Funcionario</strong>
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

</html>