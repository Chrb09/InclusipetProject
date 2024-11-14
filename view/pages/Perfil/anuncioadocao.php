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
  <style>
    #form-data {
      display: flex;
      flex-direction: column;
      width: 100%;
      gap: 0.35em;
    }
  </style>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "adocao";
    include('../../components/sidebarperfil.php');

    require_once("../../../controller/DAO/AdocaoDAO/AdocaoDAO.php");
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php');

      $adocaoDao = new AdocaoDAO($conn, $BASE_URL); // instancia do AdocaoDAO
      $especies = $adocaoDao->getAllEspecie();

      if (isset($_GET['edit'])) {
        $CodAdocao = $_GET['edit'];
        $adocaoInfo = $adocaoDao->getAdocaoByCodAdocao($CodAdocao);
        $imagens = $adocaoDao->getImagemAdocaoByCod($CodAdocao);
        $detalhes = $adocaoDao->getDetalheAdocaoByCod($CodAdocao);
      }

      ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Começo do conteúdo principal -->
        <?php if (!isset($_GET['edit'])) { ?>
          <div class="titulo">Criar anúncio de adoção</div>

          <div class="top">
            <span>Insira 5 fotos do seu animalzinho</span>
            <div class="fotos">
              <label for="foto-pet-1" class="foto-pet-adocao">
                <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" id="pet-img-1" />
              </label>
              <label for="foto-pet-2" class="foto-pet-adocao">
                <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" id="pet-img-2" />
              </label>
              <label for="foto-pet-3" class="foto-pet-adocao">
                <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" id="pet-img-3" />
              </label>
              <label for="foto-pet-4" class="foto-pet-adocao">
                <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" id="pet-img-4" />
              </label>
              <label for="foto-pet-5" class="foto-pet-adocao">
                <img src="../../assets/img/Perfil/fotos-pet.png" alt="foto do pet" id="pet-img-5" />
              </label>
            </div>
          </div>

          <!-- CADASTRO DO PET PARA ADOCAO -->
          <form action="../../../model/Arquivo/Inicializacao/adoption_process.php" class="form__cadastro"
            onsubmit="return validarAnuncio()" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto-pet-1" id="foto-pet-1" hidden>
            <input type="file" name="foto-pet-2" id="foto-pet-2" hidden>
            <input type="file" name="foto-pet-3" id="foto-pet-3" hidden>
            <input type="file" name="foto-pet-4" id="foto-pet-4" hidden>
            <input type="file" name="foto-pet-5" id="foto-pet-5" hidden>

            <input type="hidden" name="type" value="create_adoption">


            <!-- nome -->
            <div class="form-input">
              <label for="">Nome</label><br />
              <input type="text" name="nome" id="" maxlength="50" required placeholder="Nome do seu animalzinho.." />
            </div>

            <!-- especie -->
            <div class="form-input">
              <label for="">Espécie</label><br />
              <div class="custom-select">
                <select id="" name="especie" required>
                  <?php foreach ($especies as $especie): ?>
                    <!-- Define uma opção no select com o valor da  -->
                    <option value="<?= $especie[0] ?>">
                      <?= $adocaoDao->getEspecieByCod($especie[0]) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- idade -->
            <div class="form-input">
              <div id="form-data">
                <label for="">Idade</label><br />
                <input type="number" name="idade" id="datanasc" min="0" max="99" required placeholder="00" />
              </div>
              <div class="radio-div"><input type="checkbox" name="" id="checkdata" class="check" /> Não sei a idade</div>
            </div>

            <!-- porte -->
            <div class="form-input">
              <label for="">Porte</label><br />
              <div class="custom-select">
                <select id="" name="porte" required>
                  <option value="Pequeno">Pequeno</option>
                  <option value="Médio">Médio</option>
                  <option value="Grande">Grande</option>
                </select>
              </div>
            </div>

            <!-- castrado -->
            <div class="form-input">
              <label for="">Castrado?</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="castrado" value="1" class="radio" required />
                  <label for="">Sim</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="castrado" value="0" class="radio" required />
                  <label for="">Não</label>
                </div>
              </div>
            </div>

            <!-- sexo -->
            <div class="form-input">
              <label for="">Sexo</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Fêmea" class="radio" required />
                  <label for="">Fêmea</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Macho" class="radio" required />
                  <label for="">Macho</label>
                </div>
              </div>
            </div>

            <!-- descrição -->
            <div class="form-input">
              <label for="">Descrição do pet</label>
              <textarea name="descricao" maxlength="500" id="" cols="30" rows="5"
                placeholder="Descrição do seu animalzinho..." required></textarea>
            </div>

            <!-- mais detalhes -->
            <div class="form-input">
              <label for="">Mais detalhes (Separado por virgulha)</label>
              <textarea name="detalhes" id="" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..."
                required></textarea>
            </div>

            <!-- telefone -->
            <div class="form-input">
              <label for="">Seu telefone para contato</label><br />
              <input type="tel" name="telefone" id="telefone" required placeholder="(00)00000-0000" />
            </div>

            <!-- endereço -->
            <div class="form-input">
              <label for="">Endereço de referência</label><br />
              <input type="text" name="endereco" maxlength="50" id="" required placeholder="Endereço de referencia..." />
            </div>

            <div class="button-wrapper-form">
              <!-- TODO
            <button class="botao botao-borda" type="submit">
              Prévia
            </button>
-->
              <button class="botao botao-solido" type="submit">Salvar</button>
            </div>
          </form>

        <?php } else {
          ?>
          <div class="titulo">Editar anúncio de adoção</div>

          <div class="top">
            <span>Após editar será necessario aprovação novamente</span>
            <div class="fotos">
              <label for="foto-pet-1" class="foto-pet-adocao">
                <img src="../../assets/img/ImagensAdocao/<?= $adocaoInfo->CodAdocao ?>/<?= $imagens[0] ?>"
                  alt="foto do pet" id="pet-img-1" />
              </label>
              <label for="foto-pet-2" class="foto-pet-adocao">
                <img src="../../assets/img/ImagensAdocao/<?= $adocaoInfo->CodAdocao ?>/<?= $imagens[1] ?>"
                  alt="foto do pet" id="pet-img-2" />
              </label>
              <label for="foto-pet-3" class="foto-pet-adocao">
                <img src="../../assets/img/ImagensAdocao/<?= $adocaoInfo->CodAdocao ?>/<?= $imagens[2] ?>"
                  alt="foto do pet" id="pet-img-3" />
              </label>
              <label for="foto-pet-4" class="foto-pet-adocao">
                <img src="../../assets/img/ImagensAdocao/<?= $adocaoInfo->CodAdocao ?>/<?= $imagens[3] ?>"
                  alt="foto do pet" id="pet-img-4" />
              </label>
              <label for="foto-pet-5" class="foto-pet-adocao">
                <img src="../../assets/img/ImagensAdocao/<?= $adocaoInfo->CodAdocao ?>/<?= $imagens[4] ?>"
                  alt="foto do pet" id="pet-img-5" />
              </label>
            </div>
          </div>

          <!-- CADASTRO DO PET PARA ADOCAO -->
          <form action="../../../model/Arquivo/Inicializacao/adoption_process.php" class="form__cadastro" method="POST"
            enctype="multipart/form-data">
            <input type="hidden" name="codAdocao" value="<?= $adocaoInfo->CodAdocao ?>" hidden>
            <input type="file" name="foto-pet-1" id="foto-pet-1" hidden>
            <input type="file" name="foto-pet-2" id="foto-pet-2" hidden>
            <input type="file" name="foto-pet-3" id="foto-pet-3" hidden>
            <input type="file" name="foto-pet-4" id="foto-pet-4" hidden>
            <input type="file" name="foto-pet-5" id="foto-pet-5" hidden>

            <input type="hidden" name="type" value="edit_adoption">


            <!-- nome -->
            <div class="form-input">
              <label for="">Nome</label><br />
              <input type="text" name="nome" id="" maxlength="50" required placeholder="Nome do seu animalzinho.."
                value="<?= $adocaoInfo->Nome ?>" />
            </div>

            <!-- especie -->
            <div class="form-input">
              <label for="">Espécie</label><br />
              <div class="custom-select">
                <select id="" name="especie" required>
                  <?php foreach ($especies as $especie): ?>
                    <!-- Define uma opção no select com o valor da  -->
                    <option value="<?= $especie[0] ?>" <?= ($adocaoInfo->CodEspecie == $especie[0]) ? 'selected' : '' ?>>
                      <?= $adocaoDao->getEspecieByCod($especie[0]) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- idade -->
            <div class="form-input">
              <div id="form-data">
                <label for="">Idade</label><br />
                <input type="number" name="idade" id="datanasc" min="0" max="99" required placeholder="00"
                  value="<?= $adocaoInfo->Idade ?>" />
              </div>
              <div class="radio-div"><input type="checkbox" name="" id="checkdata" class="check"
                  <?= ($adocaoInfo->Idade == '') ? 'checked' : '' ?> /> Não sei a idade</div>
            </div>

            <!-- porte -->
            <div class="form-input">
              <label for="">Porte</label><br />
              <div class="custom-select">
                <select id="" name="porte" required>
                  <option value="Pequeno" <?= ($adocaoInfo->Porte == 'Pequeno') ? 'selected' : '' ?>>Pequeno</option>
                  <option value="Médio" <?= ($adocaoInfo->Porte == 'Médio') ? 'selected' : '' ?>>Médio</option>
                  <option value="Grande" <?= ($adocaoInfo->Porte == 'Grande') ? 'selected' : '' ?>>Grande</option>
                </select>
              </div>
            </div>

            <!-- castrado -->
            <div class="form-input">
              <label for="">Castrado?</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="castrado" value="1" class="radio" required <?= ($adocaoInfo->Castrado == '1') ? 'checked' : '' ?> />
                  <label for="">Sim</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="castrado" value="0" class="radio" <?= ($adocaoInfo->Castrado == '0') ? 'checked' : '' ?> required />
                  <label for="">Não</label>
                </div>
              </div>
            </div>

            <!-- sexo -->
            <div class="form-input">
              <label for="">Sexo</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Fêmea" <?= ($adocaoInfo->Sexo == 'Fêmea') ? 'checked' : '' ?>
                    class="radio" required />
                  <label for="">Fêmea</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Macho" <?= ($adocaoInfo->Sexo == 'Macho') ? 'checked' : '' ?>
                    class="radio" required />
                  <label for="">Macho</label>
                </div>
              </div>
            </div>

            <!-- descrição -->
            <div class="form-input">
              <label for="">Descrição do pet</label>
              <textarea name="descricao" maxlength="500" id="" cols="30" rows="5"
                placeholder="Descrição do seu animalzinho..." required><?= $adocaoInfo->Descricao ?></textarea>
            </div>

            <!-- mais detalhes -->
            <div class="form-input">
              <label for="">Mais detalhes (Separado por virgulha)</label>
              <textarea name="detalhes" id="" cols="30" rows="5" placeholder="Escreva sua mensagem aqui..." required><?php foreach ($detalhes as $detalhe) {
                echo ("$detalhe, ");
              } ?></textarea>
            </div>

            <!-- telefone -->
            <div class="form-input">
              <label for="">Seu telefone para contato</label><br />
              <input type="tel" name="telefone" id="telefone" required placeholder="(00)00000-0000"
                value="<?= $adocaoInfo->Telefone ?>" />
            </div>

            <!-- endereço -->
            <div class="form-input">
              <label for="">Endereço de referência</label><br />
              <input type="text" name="endereco" maxlength="50" id="" required placeholder="Endereço de referencia..."
                value="<?= $adocaoInfo->Endereco ?>" />
            </div>

            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="location.href='gerenciaradocao.php'" type="button">
                Voltar
              </button>
              <button class="botao botao-solido" type="submit">Salvar</button>
            </div>
          </form>
          <?php
        } ?>
      </div>
      <!-- Fim do conteúdo principal -->
    </div>
  </div>
</body>

<script>
  $("#telefone").mask("(00)00000-0000");

  let Picture1 = document.querySelector('#pet-img-1');  // Added the line.
  let PicInput1 = document.querySelector('#foto-pet-1');
  let Picture2 = document.querySelector('#pet-img-2');  // Added the line.
  let PicInput2 = document.querySelector('#foto-pet-2');
  let Picture3 = document.querySelector('#pet-img-3');  // Added the line.
  let PicInput3 = document.querySelector('#foto-pet-3');
  let Picture4 = document.querySelector('#pet-img-4');  // Added the line.
  let PicInput4 = document.querySelector('#foto-pet-4');
  let Picture5 = document.querySelector('#pet-img-5');  // Added the line.
  let PicInput5 = document.querySelector('#foto-pet-5');

  let checkdata = document.querySelector('#checkdata');
  let formdata = document.querySelector('#form-data');
  let datanasc = document.querySelector('#datanasc');

  let PictureArray = [Picture1, Picture2, Picture3, Picture4, Picture5]
  let InputArray = [PicInput1, PicInput2, PicInput3, PicInput4, PicInput5]

  for (let i = 0; i < 5; i++) {
    InputArray[i].addEventListener("change", function () {
      let arrBinaryFile = []
      let file = InputArray[i].files[0]  // Changed the line.
      let filename = file.name.split(/(\\|\/)/g).pop()
      let reader = new FileReader()

      // Array
      reader.readAsArrayBuffer(file);
      reader.onloadend = function (evt) {

        if (evt.target.readyState == FileReader.DONE) {
          var arrayBuffer = evt.target.result,
            array = new Uint8Array(arrayBuffer)
          for (var i = 0; i < array.length; i++) {
            arrBinaryFile.push(array[i])
          }
        }
      }
      //imgPicture.src = file.value;
      PictureArray[i].src = URL.createObjectURL(file)
    });
  }

  checkdata.addEventListener("change", function () {
    datanasc.value = ""
    if (checkdata.checked) {
      formdata.classList.add("desativado")
      datanasc.disabled = true
      datanasc.required = false
    } else {
      formdata.classList.remove("desativado")
      datanasc.disabled = false
      datanasc.required = true
    }
  })

  function validarAnuncio() {
    if (PicInput1.files.length == 0) {
      Toast.fire({
        icon: "warning",
        title: "Preencha a primeira imagem",
      });
      return false;
    } else if (PicInput2.files.length == 0) {
      Toast.fire({
        icon: "warning",
        title: "Preencha a segunda imagem",
      });
      return false;
    } else if (PicInput3.files.length == 0) {
      Toast.fire({
        icon: "warning",
        title: "Preencha a terceira imagem",
      });
      return false;
    } else if (PicInput4.files.length == 0) {
      Toast.fire({
        icon: "warning",
        title: "Preencha a quarta imagem",
      });
      return false;
    } else if (PicInput5.files.length == 0) {
      Toast.fire({
        icon: "warning",
        title: "Preencha a quinta imagem",
      });
      return false;
    }
  }


</script>

</html>