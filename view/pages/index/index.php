<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/swiper.css" />
  <link rel="stylesheet" href="../../assets/css/StyleIndex.css" />
  <link rel="stylesheet" href="../../assets/css/InfiniteScroll.css" />

  <script src="../../assets/js/swiper.js"></script>
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Home</title>
</head>

<body>
  <!-- HEADER-->
  <?php include_once('../../components/header.php'); ?>
  <!-- CARROSSEL -->
  <div class="swiper swiper-index">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide index-slide1"></div>
      <div class="swiper-slide index-slide2"></div>
      <div class="swiper-slide index-slide3"></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
  </div>

  <!--Hero-->
  <div class="hero">
    <div class="container container-hero">
      <div class="texto-hero">
        <b>Especialista em animais com deficiencia</b>
        <div class="titulo titulo-hero">Clínica Inclusipet</div>
        <p>
          Oferecemos cuidados personalizados e adaptados para garantir que todos os animais, independentemente de suas
          limitações físicas, desfrutem de uma vida plena. Com uma equipe que possui experiência e sensibilidade para
          lidar com animais deficientes.
        </p>
      </div>
      <div class="img-hero">
        <img src="../../assets/img/Index/hero.png" alt="" />
      </div>
    </div>
    <div class="container linha-hero">
      <div class="card-hero">
        <a href="../Login/login.php">
          <img src="../../assets/img/Index/agendamento.png" alt="" />
          <div class="titulo-card-hero">
            Agende sua <br />
            <b>Visita Conosco</b>
          </div>
        </a>
        <p>Cadastre o seu pet e faça um agendamento direto do conforto de sua casa!</p>
        <a href="../Login/login.php" class="link">Acessar
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="seta__link">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </a>
      </div>

      <div class="card-hero">
        <a href="../QuemSomos/quemsomos.php">
          <img src="../../assets/img/Index/sobre_nos.png" alt="" />
          <div class="titulo-card-hero">
            Quem <br />
            <b>Somos</b>
          </div>
        </a>
        <p>Fique mais confortavel sabendo que seu pet ficará em nossas mãos</p>
        <a href="../QuemSomos/quemsomos.php" class="link">Acessar
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="seta__link">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </a>
      </div>
      <div class="card-hero">
        <a href="../Adocao/adocao.php">
          <img src="../../assets/img/Index/adocao.png" alt="" />
          <div class="titulo-card-hero">
            Adote um <br />
            <b>Animalzinho</b>
          </div>
        </a>
        <p>Encontre e adote um animal que está precisando de um novo lar.</p>
        <a href="../Adocao/adocao.php" class="link">Acessar
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="seta__link">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </a>
      </div>
      <div class="card-hero">
        <a href="../Contato/contato.php">
          <img src="../../assets/img/Index/contato.png" alt="" />
          <div class="titulo-card-hero">
            Envie uma<br />
            <b>Mensagem</b>
          </div>
        </a>
        <p>Precisa de ajuda com algo? Quer enviar um feedback? Mande uma mensagem!</p>
        <a href="../Contato/contato.php" class="link">Acessar
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            class="seta__link">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
          </svg>
        </a>
      </div>
    </div>
    <div class="swiper swiper_hero">
      <div class="swiper-wrapper">
        <div class="card-hero swiper-slide">
          <a href="../Login/login.php">
            <img src="../../assets/img/Index/agendamento.png" alt="" />
            <div class="titulo-card-hero">
              Agende sua <br />
              <b>Visita Conosco</b>
            </div>
          </a>
          <p>Cadastre o seu pet e faça um agendamento direto do conforto de sua casa!</p>
          <a href="../Login/login.php" class="link">Acessar
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              class="seta__link">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>

        <div class="card-hero swiper-slide">
          <a href="../QuemSomos/quemsomos.php">
            <img src="../../assets/img/Index/sobre_nos.png" alt="" />
            <div class="titulo-card-hero">
              Quem <br />
              <b>Somos</b>
            </div>
          </a>
          <p>Fique mais confortavel sabendo que seu pet ficará em nossas mãos</p>
          <a href="../QuemSomos/quemsomos.php" class="link">Acessar
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              class="seta__link">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
        <div class="card-hero swiper-slide">
          <a href="../Adocao/adocao.php">
            <img src="../../assets/img/Index/adocao.png" alt="" />
            <div class="titulo-card-hero">
              Adote um <br />
              <b>Animalzinho</b>
            </div>
          </a>
          <p>Encontre e adote um animal que está precisando de um novo lar.</p>
          <a href="../Adocao/adocao.php" class="link">Acessar
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              class="seta__link">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
        <div class="card-hero swiper-slide">
          <a href="../Contato/contato.php">
            <img src="../../assets/img/Index/contato.png" alt="" />
            <div class="titulo-card-hero">
              Envie uma<br />
              <b>Mensagem</b>
            </div>
          </a>
          <p>Precisa de ajuda com algo? Quer enviar um feedback? Mande uma mensagem!</p>
          <a href="../Contato/contato.php" class="link">Acessar
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
              class="seta__link">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--Reviews-->
  <div class="reviews">
    <div class="container container__reviews">
      <div class="container container__titulo">
        <div class="titulo titulo-branco">Veja o que nossos <br />clientes dizem sobre nós</div>
        <div class="hr hr-branco"></div>
        <div class="subtitulo__reviews">
          <p class="subtitulo-text__reviews">
            +1.000 <br />
            Pets Felizes
          </p>
          <p class="subtitulo-text__reviews">
            +2.500 <br />
            Atendimentos
          </p>
        </div>
      </div>
    </div>
    <div class="scroll-wrapper">
      <div class="scroll-card scroll-card1">
        <div class="cartao__nota">
          <img src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" />
        </div>
        <div class="scroll-card-quote">
          "A Inclusipet mudou a vida do meu cão! Com a atenção e expertise da equipe, ele agora desfruta de uma vida
          cheia de alegria e mobilidade"
        </div>
        <div class="scroll-card-info">
          <img src="../../assets/img/Index/avatar_quote.png" alt="" class="scroll-card-avatar" />

          <div>
            <strong> Mônica<br /> </strong>
            Cliente
          </div>
        </div>
      </div>
      <div class="scroll-card scroll-card2">
        <div class="cartao__nota">
          <img src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" />
        </div>
        <div class="scroll-card-quote">
          "Minha gata encontrou amor e cuidados excepcionais na Inclusipet. Eles a trataram como nenhum outro lugar a
          tinha tratado"
        </div>
        <div class="scroll-card-info">
          <img src="../../assets/img/Index/avatar_quote2.png" alt="" class="scroll-card-avatar" />

          <div>
            <strong> Maria<br /> </strong>
            Cliente
          </div>
        </div>
      </div>
      <div class="scroll-card scroll-card3">
        <div class="cartao__nota">
          <img src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" />
        </div>
        <div class="scroll-card-quote">
          "Incrível! Meu coelho cego recebeu tratamento de primeira classe no Inclusipet. Ele está mais feliz e
          saudável graças à equipe dedicada e suas inovações."
        </div>
        <div class="scroll-card-info">
          <img src="../../assets/img/Index/avatar_quote3.png" alt="" class="scroll-card-avatar" />

          <div>
            <strong> Sarah<br /> </strong>
            Cliente
          </div>
        </div>
      </div>
      <div class="scroll-card scroll-card4">
        <div class="cartao__nota">
          <img src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" /><img
            src="../../assets/img/Index/estrela.png" alt="Estrela" class="scroll-card-estrela" />
        </div>
        <div class="scroll-card-quote">
          "A Inclusipet mudou a vida do meu cão! Com a atenção e expertise da equipe, ele agora desfruta de uma vida
          cheia de alegria e mobilidade"
        </div>
        <div class="scroll-card-info">
          <img src="../../assets/img/Index/avatar_quote.png" alt="" class="scroll-card-avatar" />

          <div>
            <strong> Mônica<br /> </strong>
            Cliente
          </div>
        </div>
      </div>
    </div>
    <div class="container container__reviews">
      <div class="botao__reviews">
        <button class="botao-solido-branco" onclick="location.href='../Perfil/agendamentoantigo.php'" type="button">
          Agende uma visita!
        </button>
      </div>
    </div>
  </div>
  <!--ONGs-->
  <div class="ONGs">
    <div class="container">
      <div class="titulo">Faça uma doação <br />para nossa causa!</div>

      <div class="hr hr-roxo"></div>

      <div class="botoes_doacao">
        <!--Aqueles botões de escolher ong, informe-se e faça uma doação-->

        <div class="ajudar">
          <!--Escolha uma ONG-->
          <img src="../../assets/img/Index/maos.png" alt="Mãos com um conração no meio" />
          <p class="ajudar">Escolha uma ONG</p>
        </div>

        <div class="ajudar informe">
          <!--Informe-se-->
          <img src="../../assets/img/Index/info.png" alt="Informações" />
          <p class="ajudar">Informe-se</p>
        </div>

        <div class="ajudar">
          <!--Faça uma doação-->
          <img src="../../assets/img/Index/cartao-de-credito.png" alt="Carteira com artão saindo dela" />
          <p class="ajudar">Faça uma doação</p>
        </div>
      </div>

      <div class="ong">
        <a href="https://amigosdesaofrancisco.com.br">
          <img src="../../assets/img/Index/ongs/amigos-sao-francisco.png" alt="Ong Amigos São Francisco" /></a>
        <a href="https://www.caosemdono.com.br"><img src="../../assets/img/Index/ongs/cao-sem-dono.png"
            alt="Ong Cão Sem Dono" /></a>
        <a href="https://projetocaosemfome.com"><img src="../../assets/img/Index/ongs/cao-sem-fome.png"
            alt="Projeto Cão Sem Fome" /></a>
        <a href="https://www.instagram.com/empatatia/?hl=pt-br"><img src="../../assets/img/Index/ongs/empatia.png"
            alt="Ong Empatia" /></a>
        <a href="https://www.moradoresderuaeseuscaes.com.br"><img src="../../assets/img/Index/ongs/moradores-de-rua.png"
            alt="Ong Moradores De Rua e Seus Cães" /></a>
        <a href="https://www.quatropatinhas.com.br/4Patinhas/"><img
            src="../../assets/img/Index/ongs/quatro-patinhas.png" alt="Associação Quatro Patinhas" /></a>
        <a href="https://www.instagram.com/institutopetvan/"><img src="../../assets/img/Index/ongs/vanessa-mesquita.png"
            alt="Vanessa Mesquita" /></a>
        <a href="http://ongvivabicho.com.br"><img src="../../assets/img/Index/ongs/viva-bicho.png"
            alt="Ong Viva Bicho" /></a>
      </div>
    </div>
    <div class="swiper swiper_ong">
      <div class="swiper-wrapper">
        <a href="https://amigosdesaofrancisco.com.br" class="swiper-slide">
          <img src="../../assets/img/Index/ongs/amigos-sao-francisco.png" alt="Ong Amigos São Francisco" /></a>
        <a href="https://www.caosemdono.com.br" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/cao-sem-dono.png" alt="Ong Cão Sem Dono" /></a>
        <a href="https://projetocaosemfome.com" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/cao-sem-fome.png" alt="Projeto Cão Sem Fome" /></a>
        <a href="https://www.instagram.com/empatatia/?hl=pt-br" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/empatia.png" alt="Ong Empatia" /></a>
        <a href="https://www.moradoresderuaeseuscaes.com.br" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/moradores-de-rua.png" alt="Ong Moradores De Rua e Seus Cães" /></a>
        <a href="https://www.quatropatinhas.com.br/4Patinhas/" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/quatro-patinhas.png" alt="Associação Quatro Patinhas" /></a>
        <a href="https://www.instagram.com/institutopetvan/" class="swiper-slide"><img
            src="../../assets/img/Index/ongs/vanessa-mesquita.png" alt="Vanessa Mesquita" /></a>
        <a href="http://ongvivabicho.com.br" class="swiper-slide"><img src="../../assets/img/Index/ongs/viva-bicho.png"
            alt="Ong Viva Bicho" /></a>
      </div>
    </div>
  </div>
  <!--Ultimos Posts-->
  <div class="ultimosposts">
    <div class="container container__ultimosposts">
      <div class="container container__titulo">
        <div class="titulo titulo-branco">Últimos Posts</div>
        <div class="hr hr-branco"></div>
      </div>
      <div class="linha__card">
        <div class="cartao__ultimosposts">
          <img src="../../assets/img/Blog/Post1/blog1.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">Desvendando Mitos sobre Animais Deficientes</div>
            <div class="cartao_texto">
              A natureza é repleta de diversidade, e os animais também podem enfrentar desafios de saúde que os tornam
              diferentes
            </div>
            <a href="../Blog/post1.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
        <div class="cartao__ultimosposts">
          <img src="../../assets/img/Blog/Post4/blog4.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">Como Cuidar dos Dentes do Seu Pet</div>
            <div class="cartao_texto">
              Cuidar dos dentes do seu pet é uma parte essencial da saúde geral do animal. A saúde bucal adequada não
              só previne problemas dentários, mas também promove o bem-estar geral do seu companheiro. Aqui estão
              algumas dicas sobre como cuidar dos dentes do seu pet:
            </div>
            <a href="../Blog/post4.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
        <div class="cartao__ultimosposts">
          <img src="../../assets/img/Blog/Post2/blog2.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">A importância de combater a Violência contra os</div>
            <div class="cartao_texto">
              A relação entre seres humanos e animais transcende barreiras, refletindo uma interconexão que molda a
              própria essência de nossa sociedade. No entanto, mesmo diante desse elo intrínseco, a violência
            </div>
            <a href="../Blog/post2.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="swiper swiper_blog">
      <div class="swiper-wrapper">
        <div class="cartao__ultimosposts swiper-slide">
          <img src="../../assets/img/Blog/Post1/blog1.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">Desvendando Mitos sobre Animais Deficientes</div>
            <div class="cartao_texto">
              A natureza é repleta de diversidade, e os animais também podem enfrentar desafios de saúde que os tornam
              diferentes
            </div>
            <a href="../Blog/post1.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
        <div class="cartao__ultimosposts swiper-slide">
          <img src="../../assets/img/Blog/Post4/blog4.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">Como Cuidar dos Dentes do Seu Pet</div>
            <div class="cartao_texto">
              Cuidar dos dentes do seu pet é uma parte essencial da saúde geral do animal. A saúde bucal adequada não
              só previne problemas dentários, mas também promove o bem-estar geral do seu companheiro. Aqui estão
              algumas dicas sobre como cuidar dos dentes do seu pet:
            </div>
            <a href="../Blog/post4.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
        <div class="cartao__ultimosposts swiper-slide">
          <img src="../../assets/img/Blog/Post2/blog2.png" alt="" class="cartao__imagem" />
          <div class="cartao__conteudo">
            <div class="cartao__titulo">A importância de combater a Violência contra os</div>
            <div class="cartao_texto">
              A relação entre seres humanos e animais transcende barreiras, refletindo uma interconexão que molda a
              própria essência de nossa sociedade. No entanto, mesmo diante desse elo intrínseco, a violência
            </div>
            <a href="../Blog/post2.php" class="link">Ler Mais
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="seta__link">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container container__ultimosposts">
      <div class="botao__reviews">
        <button class="botao-solido-branco" onclick="location.href='../Blog/blog.php'" type="button">
          Acessar Blog
        </button>
      </div>
    </div>
  </div>
  <!--FAQ-->
  <div class="FAQ">
    <div class="container">
      <div class="titulo">FAQ</div>
      <div class="hr"></div>
      <div class="details">
        <div class="summary">Quais são os serviços especializados que vocês oferecem para animais deficientes?</div>
        <div class="wrapper-faq">
          <p>
            Oferecemos fisioterapia, próteses personalizadas, cadeiras de rodas, terapia ocupacional, acupuntura e
            tratamentos de reabilitação para ajudar na mobilidade e na qualidade de vida dos animais deficientes.
          </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
          class="arrow_faq">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
      </div>
      <div class="details">
        <div class="summary">Vocês aceitam animais de todas as deficiências?</div>
        <div class="wrapper-faq">
          <p>
            Sim, aceitamos animais com qualquer tipo de deficiência, incluindo deficiências físicas, neurológicas e
            sensoriais. Nosso objetivo é fornecer cuidados personalizados para atender às necessidades específicas de
            cada animal.
          </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
          class="arrow_faq">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
      </div>
      <div class="details">
        <div class="summary">Qual é a experiência e qualificação da equipe em lidar com animais deficientes?</div>
        <div class="wrapper-faq">
          <p>
            Nossa equipe é composta por veterinários e especialistas altamente qualificados e com ampla experiência em
            cuidados com animais deficientes. Todos os membros passam por treinamentos contínuos para se manterem
            atualizados com as melhores práticas e tecnologias disponíveis.
          </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
          class="arrow_faq">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
      </div>
      <div class="details">
        <div class="summary">Como a clínica lida com emergências médicas?</div>
        <div class="wrapper-faq">
          <p>
            Algumas unidades são preparadas para lidar com emergências médicas 24 horas por dia, 7 dias por semana.
            Nossos veterinários treinados em emergências estarão sempre disponíveis para atender animais deficientes
            em situações críticas.
          </p>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
          class="arrow_faq">
          <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
        </svg>
      </div>
    </div>
  </div>
  <script src="../../assets/js/faq.js"></script>
  <!-- FOOTER -->
  <?php
  include_once('../../components/footer.php');
  ?>
  <script src="../../assets/js/carrossel.js"></script>

</html>