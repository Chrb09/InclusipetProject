<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleMeusPets.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Cadastrar Animal</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $sidebarActive = "pets";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <!-- Começo do conteúdo principal -->
        <div class="titulo">Cadastrar Pet</div>

        <div class="cadastrar_pet">
          <div class="foto-edit">
            <div class="foto-edit-wrapper">
              <img src="../../assets/img/Perfil/fotos-pet.png" alt="Foto do pet" class="foto-edit-img" />
              <div class="edit"><img src="../../assets/img/Perfil/editar_icon.png" alt="" /></div>
            </div>
            <p>Nome do Pet</p>
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
              <label for="">Raça</label><br />
              <div class="custom-select">
                <select id="" name="" size="0" placeholder="Selecione...">
                  <option value="cachorro">Cachorro</option>
                  <option value="gato">Gato</option>
                  <option value="passaro">Pássaro</option>
                </select>
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
              <label for="">Data de Nascimento</label><br />
              <input type="date" value="" max="" min="1900-01-01" />
              <div class="radio-div">
                <input type="checkbox" name="" id="" class="check" /> Não lembro a data exata
              </div>
            </div>
            <div class="form-input desativado">
              <label for="">Data Aproximada</label><br />
              <input type="date" value="" disabled />
            </div>
            <div class="form-input">
              <label for="">Peso (kg)</label><br />
              <input type="number" value="" />
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

            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="location.href='meuspets.php'" type="button">Voltar</button>
              <button class="botao botao-solido" onclick="" type="button">Salvar</button>
            </div>
          </form>
        </div>
        <!-- Fim do conteúdo principal -->
      </div>
    </div>
  </div>
</body>

</html>