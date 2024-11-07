<div class="sidebar">
  <div class="sidebar-background"></div>
  <div class="sidebar-nav">
    <b>Área do Funcionário</b>
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
  <div class="copyright-sidebar">®2024 Inclusipet. Todos os direitos reservados.</div>
</div>