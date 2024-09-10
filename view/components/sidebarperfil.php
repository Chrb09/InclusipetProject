<div class="sidebar">
  <div class="sidebar-background"></div>
  <div class="sidebar-nav">
    <b>Área do Usuario</b>
    <button class="sidebar-button <?php if ($sidebarActive == 'perfil')
      echo ' ativo'; ?>" onclick="location.href='perfil.php'" type="button">Perfil</button>
    <button class="sidebar-button <?php if ($sidebarActive == 'pets')
      echo ' ativo'; ?>" onclick="location.href='meuspets.php'" type="button">Meus Pets</button>
    <button class="sidebar-button <?php if ($sidebarActive == 'agendamentos')
      echo ' ativo'; ?>" onclick="location.href='meusagendamentos.php'" type="button">
      Meus Agendamentos
    </button>
    <button class="sidebar-button <?php if ($sidebarActive == 'exames')
      echo ' ativo'; ?>" onclick="location.href='resultadosexames.php'" type="button">
      Resultados Exames
    </button>
    <button class="sidebar-button <?php if ($sidebarActive == 'adocao')
      echo ' ativo'; ?>" onclick="location.href='gerenciaradocao.php'" type="button">
      Gerenciar Adoção
    </button>
  </div>
  <div class="copyright-sidebar">®2023 Inclusipet. Todos os direitos reservados.</div>
</div>