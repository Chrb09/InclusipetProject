<div class="sidebar">
  <div class="sidebar-background"></div>
  <div class="sidebar-nav">
    <b>Quem Somos</b>
    <button class="sidebar-button <?php if ($sidebarActive == 'quemsomos')
      echo ' ativo'; ?>" onclick=" location.href='quemsomos.php'" type=" button">Sobre Nós</button>
    <button class="sidebar-button<?php if ($sidebarActive == 'profissionais')
      echo ' ativo'; ?>" onclick="location.href='profissionais.php'" type="button">
      Nossos Profissionais
    </button>
    <div class="hr"></div>
    <b>Serviços</b>
    <button class="sidebar-button<?php if ($sidebarActive == 'atendimento')
      echo ' ativo'; ?>" onclick="location.href='atendvet.php'" type="button">
      Atendimento Veterinário
    </button>
    <button class="sidebar-button<?php if ($sidebarActive == 'cirurgia')
      echo ' ativo'; ?>" onclick="location.href='cirurproced.php'" type="button">
      Cirurgias & Procedimentos
    </button>
    <button class="sidebar-button<?php if ($sidebarActive == 'vacinacao')
      echo ' ativo'; ?>" onclick="location.href='vacinacao.php'" type="button">Vacinação</button>
    <div class="hr"></div>
    <b>Especialidades</b>
    <button class="sidebar-button<?php if ($sidebarActive == 'ortopedia')
      echo ' ativo'; ?>" onclick="location.href='ortopedia.php'" type="button">Ortopedia</button>
    <button class="sidebar-button<?php if ($sidebarActive == 'fisioterapia')
      echo ' ativo'; ?>" onclick="location.href='fisioterapia.php'" type="button">
      Fisioterapia & Reabilitação
    </button>
    <button class="sidebar-button<?php if ($sidebarActive == 'proteses')
      echo ' ativo'; ?>" onclick="location.href='proteses.php'" type="button">
      Próteses & Órteses
    </button>
    <button class="sidebar-button<?php if ($sidebarActive == 'neurologia')
      echo ' ativo'; ?>" onclick="location.href='neurologia.php'" type="button">Neurologia</button>
    <button class="sidebar-button<?php if ($sidebarActive == 'terapia')
      echo ' ativo'; ?>" onclick="location.href='terapia.php'" type="button">
      Terapia Comportamental
    </button>
    <button class="sidebar-button<?php if ($sidebarActive == 'aconselhamento')
      echo ' ativo'; ?>" onclick="location.href='aconselhamento.php'" type="button">
      Aconselhamento para Donos
    </button>
  </div>
</div>