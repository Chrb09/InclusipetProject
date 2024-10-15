<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleContato.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Contatos</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "contato";
  include('../../components/headers/header.php');
  ?>
  <!-- CONTATO -->

  <div class="container bottom">
    <div class="section-enviar">
      <div class="titulo">
        Envie uma <br />
        mensagem
      </div>
      <form action="" class="form__login">
        <div class="form__row">
          <label for="">Nome</label><br />
          <input type="text" name="" id="" />
        </div>
        <div class="form__row">
          <label for="">Email</label><br />
          <input type="email" value="" />
        </div>
        <div class="form__row">
          <label for="">Mensagem</label><br />
          <textarea name="" id="" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..."></textarea>
        </div>
        <div class="form__row linha">
          <input type="checkbox" name="" id="" class="check" />
          <label for="">Eu aceito os
            <strong><a href="creditos.php"><ins>termos</ins></a></strong>
          </label>
        </div>
        <button class="botao-solido" onclick="alerta()" type="button">Enviar</button>
      </form>
    </div>
    <div class="section-telefone">
      <div class="titulo">
        Ligue por <br />
        telefone
      </div>
      <div class="content">
        <div class="telefone">
          <img src="../../assets/img/Contato/telefone.png" alt="" class="tel-icon" />
          <strong>+(55) 11 90000-0000</strong>
        </div>
        <div>
          <b>Segunda a sexta</b>
          <p>8h às 21h</p>
        </div>
        <div>
          <b>Sábados</b>
          <p>8h às 18h</p>
        </div>
        <div>
          <b>Domingos & Feriados</b>
          <p>9h às 16h</p>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function alerta() {
    Swal.fire({
      title: "Enviado com sucesso",
      icon: "success",
      confirmButtonColor: "#574dbd",
    });
  }
</script>

</html>