<div class="section-nav-mobile">
  <div class="details open_faq">
    <div class="summary">Área do Usuario</div>
    <div class="wrapper-faq">
      <div class="colapse">
        <div class="nav-mobile">
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
      </div>
    </div>
    <?php
    include('../../assets/svg/arrow_faq.php');
    ?>
  </div>
</div>
<script src="../../assets/js/nav_mobile.js"></script>