<div class="section-nav-mobile">
  <div class="details <?php if ($sidebarActive == 'quemsomos' || $sidebarActive == 'profissionais')
    echo ' open_faq'; ?>"">
    <div class=" summary">Quem Somos</div>
  <div class="wrapper-faq">
    <div class="colapse">
      <div class="nav-mobile">
        <button class="sidebar-button <?php if ($sidebarActive == 'quemsomos')
          echo ' ativo'; ?>" onclick=" location.href='quemsomos.php'" type=" button">Sobre Nós</button>
        <button class="sidebar-button<?php if ($sidebarActive == 'profissionais')
          echo ' ativo'; ?>" onclick="location.href='profissionais.php'" type="button">
          Nossos Profissionais
        </button>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)" class="arrow_faq">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
  </svg>
</div>
<div class="details <?php if ($sidebarActive == 'atendimento' || $sidebarActive == 'cirurgia' || $sidebarActive == 'vacinacao')
  echo ' open_faq'; ?>">
  <div class="summary">Serviços</div>
  <div class="wrapper-faq">
    <div class="colapse">
      <div class="nav-mobile">
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
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)" class="arrow_faq">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
  </svg>
</div>
<div class="details <?php if ($sidebarActive == 'ortopedia' || $sidebarActive == 'fisioterapia' || $sidebarActive == 'proteses' || $sidebarActive == 'neurologia' || $sidebarActive == 'terapia' || $sidebarActive == 'aconselhamento')
  echo ' open_faq'; ?>">
  <div class="summary">Especialidades</div>
  <div class="wrapper-faq">
    <div class="colapse">
      <div class="nav-mobile">
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
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)" class="arrow_faq">
    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
  </svg>
</div>
</div>
<script src="../../assets/js/nav_mobile.js"></script>