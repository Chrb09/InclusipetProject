<div class="sidebar">
  <div class="sidebar-background"></div>
  <div class="sidebar-nav">
    <b>Área do Funcionario</b>
    <button class="sidebar-button <?php if ($sidebarActive == 'perfil')
      echo ' ativo'; ?>" onclick="location.href='perfil.php'" type="button">Perfil</button>
    <button class="sidebar-button <?php if ($sidebarActive == 'agendamentos')
      echo ' ativo'; ?>" onclick="location.href='agendamentos.php'" type="button">
      Agendamentos
    </button>
    <button class="sidebar-button <?php if ($sidebarActive == 'adocao')
      echo ' ativo'; ?>" onclick="location.href='aprovaradocao.php'" type="button">Aprovar Adoção</button>
    <button class="sidebar-button <?php if ($sidebarActive == 'funcionario')
      echo ' ativo'; ?>" onclick="location.href='cadastrarfuncionario.php'" type="button">
      Cadastrar Funcionario
    </button>
    <button class="sidebar-button <?php if ($sidebarActive == 'tutor')
      echo ' ativo'; ?>" onclick="location.href='funcoesdotutor.php'" type="button">
      Funçoes do tutor
    </button>
  </div>
  <div class="copyright-sidebar">®2024 Inclusipet. Todos os direitos reservados.</div>
</div>