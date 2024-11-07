<div class="section-nav-mobile">
  <div class="details open_faq">
    <div class="summary">Área do Funcionário</div>
    <div class="wrapper-faq">
      <div class="colapse">
        <div class="nav-mobile">
          <button class="sidebar-button <?php if ($sidebarActive == 'perfil')
            echo ' ativo'; ?>" onclick="location.href='../Funcionario/perfil.php'" type="button">Perfil</button>
          <button class="sidebar-button <?php if ($sidebarActive == 'agendamentos')
            echo ' ativo'; ?>" onclick="location.href='../Funcionario/agendamentos.php'" type="button">
            Agendamentos
          </button>
          <button class="sidebar-button <?php if ($sidebarActive == 'adocao')
            echo ' ativo'; ?>" onclick="location.href='../Funcionario/aprovaradocao.php'" type="button">Aprovar
            Adoção</button>
          <button class="sidebar-button <?php if ($sidebarActive == 'funcionario')
            echo ' ativo'; ?>" onclick="location.href='../Funcionario/cadastrarfuncionario.php'" type="button">
            Cadastrar Funcionário
          </button>
          <button class="sidebar-button <?php if ($sidebarActive == 'tutor')
            echo ' ativo'; ?>" onclick="location.href='../Funcionario/funcoesdotutor.php'" type="button">
            Funções do tutor
          </button>
        </div>
      </div>
    </div>
    <?php
    include('../../assets/svg/arrow_faq.php');
    ?>
  </div>
</div>
<script src="../../assets/js/nav_mobile.js"></script>