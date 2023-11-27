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
      <form name="SignUp" action="processaFormLogin.php" method="post" id="form-create-account">
        <h2>Login</h2>
        <div class="form-group">
          <label for="InputEmail">Endereço de email</label>
          <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Seu email" name="email">
          <span class="span_SignUp" id="spanEmail"></span>
        </div>
        <div class="form-group">
          <label for="InputPassword">Senha</label>
          <input type="password" class="form-control" id="InputPassword" placeholder="Senha" name="senha">
          <span class="span_SignUp" id="spanPassword"></span>
        </div>
        <div class="form-group">
            <p>Não possui conta? <a href="createAccount.php">Cadastre-se</a></p>
        </div>


        <button class="btn btn-primary" id="btn-form">Enviar</button>
      </form>
    </main>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="validaFormLogin.js"></script>
    <script src="src/scripts/headerComplement.js"></script>
    <script>
      activeCreateAccount();
    </script>

    <script>
        const getUser = () =>{
            const user = JSON.parse(localStorage.getItem("@User"))
            if(user){
                let email = document.querySelector("#InputEmail");
                email.value = `${user.email}`;
            }
        }
      getUser();
    </script>
    

  </body>
</html>