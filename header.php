<?php
echo <<<HTML
    <header class="header">
      <nav class="navbar fixed-top navbar-expand-lg ">
        <div class="container-fluid  gap-2">
          <button class="navbar-toggler navbar-toggler-custom order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
          </button>
          <a class="navbar-brand order-2 mx-auto" href="index.php">
            <img src="src/imagens/JLImagens/LogoWideOriginal.jpg" class="logo" width="173" height="30" alt="LOGO - JL TELHAS E FERRAGENS">
          </a>
          <a class="navbar-brand order-4" id="create-account-link" href="login.php">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon_menu-person" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
          </a>
          <a class="navbar-brand order-5 disabled" id="" href="#">
            <svg xmlns="http://w3.org/2000/svg" class="icon_menu-cart" width="22" height="22" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
          </a>
          <div class="collapse navbar-collapse order-3" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" id="home-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" id="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Produtos
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="" href="produtos/churrasqueiras.php">Churrasqueiras</a></li>
                    <li><a class="dropdown-item" id="" href="#">Telhas</a></li>
                    <li><a class="dropdown-item" id="" href="#">Fogões</a></li>
                    <li><a class="dropdown-item" id="" href="#">Tubos e Conexões</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item disabled" id="" href="#">Outros</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="" href="#">Sobre Nós</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="" href="#">Contato</a>
                </li>
            </div>
            <form class="d-flex mr-left ms-2" role="search" id="barra-de-pesquisa">
              <input class="form-control me-2 col-12" id="color-input-picker" type="search" placeholder="Pesquisar" aria-label="Search">
              <button class="btn btn-outline-success" id="color-button-picker" type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
              </button>
            </form>
          </div>
        </div>
      </nav>
    </header>
HTML;
?>