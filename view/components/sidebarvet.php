<?php
require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php');

$funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
$funcionarioData = $funcionarioDao->verifyToken(true);

$message = new Message($BASE_URL);
$flassMessage = $message->getMessage();

if (!empty($flassMessage["msg"])) {
  $message->clearMessage();
}

// funcionario 
$funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
$funcionarioData = $funcionarioDao->verifyToken(true);

?>

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
    <?php if ($funcionarioData->admin == '1'): ?>
      <button class="sidebar-button <?php if ($sidebarActive == 'admin')
        echo ' ativo'; ?>" onclick="location.href='../Admin/dashboard.php'" type="button">
        Dashboard Admin
      </button>
    <?php endif; ?>
  </div>
  <div class="copyright-sidebar">®2023-<?= date("Y") ?> Inclusipet. Todos os direitos reservados.</div>
</div>