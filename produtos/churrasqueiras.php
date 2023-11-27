<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JL TELHAS E FERRAGENS</title>
    <link rel="icon" href="../src/imagens/JLImagens/JL-Logo.jpg" type="image/jpg">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Styles -->
    <link rel="stylesheet" href="../src/styles/reset.css">
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="stylesheet" href="../src/styles/styleNav.css">
    <link rel="stylesheet" href="../src/styles/styleSwiperBootstrap.css">
    <link rel="stylesheet" href="../src/styles/styleFooter.css">
    

</head>
<body>
    <?php
        include "../headerInsideSrc.php";
    ?>
    <main>

      <h3 class="h3-centralizado">
        CHURRASQUEIRAS
      </h3>
      <!-- (Churrasqueiras) -->

      <div style="display: flex; justify-content: space-evenly; flex-wrap: wrap; flex-direction: row;">
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueira-Lisa/Churrasqueira-Lisa1.jpg" alt="Churrasqueira-Lisa" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
            <h5 class="card-title">Churrasqueira Lisa</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueira-Pre-Moldada/Churrasqueira-Pre-Moldada1.png" alt="Churrasqueira-Pre-Moldada" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
          <h5 class="card-title">Churrasqueira Pre-Moldada</h5>
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueira-Completa/Churrasqueira-Completa1.jpg" alt="Churrasqueira-Completa" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
          <h5 class="card-title">Churrasqueira Completa</h5>
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueira-Completa/Churrasqueira-Completa2.jpg" alt="Churrasqueira-Completa" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
              <h5 class="card-title">Churrasqueira Completa</h5>
          </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueiras-de-botijao/Churrasqueira-de-botijão1.jpg" alt="Churrasqueira-de-botijão" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
          <h5 class="card-title">Churrasqueira de botijão</h5>
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
        <div class="card"  style="width: 18rem;">
          <img src="../src/imagens/JLImagens/Products/Churrasqueira/Churrasqueiras-aro-de-carro/Churrasqueira-aro-de-carro.jpg" alt="CChurrasqueira-aro-de-carro" class="bd-placeholder-img card-img-top">
          <button class="btn-shopping-cart btn-shopping-cart-show"><img src="../src/imagens/Icons/shopping-cart.svg" alt="shopping-cart"></button>
          <div class="card-body">
          <h5 class="card-title">Churrasqueira aro de carro</h5>
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item"><p>R$ </p><button><a href="#">Comprar</a></button></li>
          </ul>
        </div>
      </div>

    </main>
    <?php
        include "../footerInsideSrc.php";
    ?>

    <script src="../src/scripts/CarouselSwiper.js"></script>
    <script src="../src/scripts/Swiper.js"></script>
    <script src="../src/scripts/ShoppingCart.js"></script>
    <script src="../src/scripts/headerComplement.js"></script>
    <script>
      activeChurrasqueiras();
    </script>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </body>
</html>