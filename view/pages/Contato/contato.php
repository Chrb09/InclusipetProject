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
      <form action="https://formsubmit.co/inclusipet@gmail.com" class="form__login" method="POST"
        onsubmit="return validarMensagem()">
        <input type="hidden" name="_next"
          value="http://localhost/inclusipetProject/model/Arquivo/Inicializacao/contato_process.php">
        <div class="form__row">
          <label for="">Nome</label><br />
          <input type="text" name="name" id="contato-nome" placeholder="Seu nome..." required />
        </div>
        <div class="form__row">
          <label for="">Email</label><br />
          <input type="email" name="email" id="contato-email" placeholder="Seu email..." required />
        </div>
        <div class="form__row">
          <label for="">Mensagem</label><br />
          <textarea name="message" id="contato-mensagem" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..."
            required></textarea>
        </div>
        <div class="form__row linha">
          <input type="checkbox" name="check" id="contato-check" class="check" required />
          <label for="">Eu aceito os
            <strong><a href="creditos.php"><ins>termos</ins></a></strong>
          </label>
        </div>
        <button class="botao-solido" type="submit" name="enviar">Enviar</button>
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
  const nome = document.getElementById("contato-nome");
  const email = document.getElementById("contato-email");
  const mensagem = document.getElementById("contato-mensagem");
  const check = document.getElementById("contato-check");

  function validarMensagem() {
    if (!nome || !email || !mensagem) {
      Toast.fire({
        icon: "warning",
        title: "Preencha todos os campos",
      });
      return false;
    } else if (!check) {
      Toast.fire({
        icon: "warning",
        title: "Aceite os termos",
      });
      return false;
    } else {
      Swal.fire({
        html: `<div><p>Redirecionando, não feche a página</p></div> `,
        showConfirmButton: false,
        icon: "warning",
        focusConfirm: true,
        customClass: {
          popup: 'container-custom',
        },
        backdrop: "rgb(87, 77, 189, 0.5",
      });
    }
  }

</script>

</html>