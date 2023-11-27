<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JL TELHAS E FERRAGENS - Criação de conta</title>
    <link rel="icon" href="src/imagens/JLImagens/JL-Logo.jpg" type="image/jpg">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Styles -->
    <link rel="stylesheet" href="src/styles/reset.css">
    <link rel="stylesheet" href="src/styles/style.css">
    <link rel="stylesheet" href="src/styles/styleNav.css">
    <link rel="stylesheet" href="src/styles/styleFooter.css">
    <link rel="stylesheet" href="src/styles/styleCreateAccount.css">


</head>
<body>
    <?php
        include "header.php";
    ?>
    <main>
        <!-- <h1>ACCOUNT</h1>
        <br>
        <br> -->
        <h1 class="title">Bem vindo!</h1>
        
    </main>
    <?php
        include "footer.php";
    ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="validaForm.js"></script>
    <script src="src/scripts/headerComplement.js"></script>
    <script>
      activeCreateAccount();
    </script>

    <!-- <script>
      const getUser = () =>{
        const user = JSON.parse(localStorage.getItem("@User"))
        const h1El = document.querySelector(".title")
        if(!user){
          h1El.textContent = `Algum erro ocorreu... tente realizar login novamente...`
        }else{
          h1El.textContent = `Bem vindo ${user.nome}!`
        }
      }
      getUser();
    </script> -->

  </body>
</html>