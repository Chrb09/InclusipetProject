<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleGerenciarAdocao.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Anúncio de Adoção</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $sidebarActive = "adocao";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Começo do conteúdo principal -->
        <div class="titulo">Criar anúncio de adoção</div>

        <div class="top">
          <span>Insira 5 fotos do seu animalzinho</span>
          <div class="fotos">
            <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" />
            <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" />
            <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" />
            <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" />
            <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" />
          </div>
        </div>
        <form action="" class="form__cadastro">
          <div class="form-input">
            <label for="">Nome</label><br />
            <input type="text" name="" id="" />
          </div>

          <div class="form-input">
            <label for="">Espécie</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Cachorro</option>
                <option value="gato">Gato</option>
                <option value="passaro">Pássaro</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Idade</label><br />
            <input type="number" name="" id="" min="0" />
            <div class="radio-div"><input type="checkbox" name="" id="" class="check" /> Não sei a idade</div>
          </div>

          <div class="form-input">
            <label for="">Porte</label><br />
            <div class="custom-select">
              <select id="" name="" size="1">
                <option value="cachorro">Pequeno</option>
                <option value="gato">Médio</option>
                <option value="passaro">Grande</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">Castrado?</label>
            <div class="radio-group">
              <div class="radio-div">
                <input type="radio" name="castrado" value="Sim" class="radio" />
                <label for="">Sim</label>
              </div>
              <div class="radio-div">
                <input type="radio" name="castrado" value="Não" class="radio" />
                <label for="">Não</label>
              </div>
            </div>
          </div>

          <div class="form-input">
            <label for="">Sexo</label>
            <div class="radio-group">
              <div class="radio-div">
                <input type="radio" name="sexo" value="Fêmea" class="radio" />
                <label for="">Fêmea</label>
              </div>
              <div class="radio-div">
                <input type="radio" name="sexo" value="Macho" class="radio" />
                <label for="">Macho</label>
              </div>
            </div>
          </div>

          <div class="form-input">
            <label for="">Descrição do pet</label>
            <textarea name="" id="" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..."></textarea>
          </div>

          <div class="form-input">
            <label for="">Mais detalhes (Escreva um por linha)</label>
            <textarea name="" id="" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..."></textarea>
          </div>

          <div class="form-input">
            <label for="">Seu telefone para contato</label><br />
            <input type="tel" name="" id="" />
          </div>

          <div class="form-input">
            <label for="">Endereço de referência</label><br />
            <input type="text" name="" id="" />
          </div>

          <div class="button-wrapper-form">
            <button class="botao botao-borda" onclick="location.href='../Adocao/animalprevia.php'" type="button">
              Prévia
            </button>
            <button class="botao botao-solido" onclick="" type="button">Salvar</button>
          </div>
        </form>
      </div>
      <!-- Fim do conteúdo principal -->
    </div>
  </div>
</body>

</html>