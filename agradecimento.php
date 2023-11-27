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

    <!-- Scripts -->
    <script src="src/scripts/validaForm.js"></script>
    

</head>
<body>
    <?php
        include "header.php";
    ?>
    <main>
        <h1 class="title"></h1>
    </main>
    <?php
        include "footer.php";
    ?>
    <script>
      const getUser = () =>{
        const user = JSON.parse(localStorage.getItem("@User"))
        const h1El = document.querySelector(".title")
        if(!user){
          h1El.textContent = `Cadastro realizado com sucesso!`
        }else{
          h1El.textContent = `${user.nome} cadastrado com sucesso!`
        }
      }
      getUser();
    </script>
  </body>
</html>