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
      <form name="SignUp" action="processaForm.php" method="post" id="form-create-account">
        <h2>Crie uma conta</h2>
        <div class="form-group">
          <label for="InputName">Nome</label>
          <input type="text" class="form-control" id="InputName" aria-describedby="NameHelp" placeholder="Seu Nome" name="nome">
          <span class="span_SignUp" id="spanNome"></span>
        </div>
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
          <label for="InputPasswordConfirm">Confirmar Senha</label>
          <input type="password" class="form-control" id="InputPasswordConfirm" placeholder="Senha" name="senha-confirm">
          <span class="span_SignUp" id="spanPasswordConfirm"></span>
        </div>
        
        <div>
          <p></p>
          <label>Ajude-nos respondendo algumas perguntas básicas</label>
          <fieldset class="fieldset-form-group">
            <div class="form-group" id="radioOptions">
              <p id="pRadio" class="created-legend">Já nos conhecia anteriormente?</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="sim" name="conheciaAntes" value="Sim">
                    <label class="form-check-label" for="sim">Sim</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="nao" name="conheciaAntes" value="Não">
                    <label class="form-check-label" for="nao">Não</label>
                </div>
            </div>
            <div class="div-divider">
              <hr>
            </div>
            <div class="form-group">
              <p id="pCheck" class="">Por onde nos conheceu?</p>
              <div class="form-check">
                <input class="form-check-input"  type="checkbox" id="redessociais" name="conheceu[]" value="Redes Sociais">
                <label class="form-check-label" for="redessociais">Redes Sociais</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input"  type="checkbox" id="loja" name="conheceu[]" value="Loja Presencial">
                  <label class="form-check-label" for="loja">Loja Presencial</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input"  type="checkbox" id="website" name="conheceu[]" value="Website">
                  <label class="form-check-label" for="website">Por este Website</label>
              </div>
              <div class="form-check">
                  <input class="form-check-input"  type="checkbox" id="outros" name="conheceu[]" value="Outros">
                  <label class="form-check-label" for="outros">Outros</label>
              </div>
            </div>
          </fieldset>
        </div>
        <span id="RadioError" class="span_SignUp"></span>
        <span id="checkboxError" class="span_SignUp"></span>
        

        
        <button class="btn btn-primary" id="btn-form">Enviar</button>
      </form>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">

              <div class="modal-header">
                  <h5 class="modal-title">Verifique se os dados fornecidos estão corretos</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <p id="mod-name"></p>
                <p id="mod-email"></p>
                <p id="mod-password"></p>
                <p id="mod-radio"></p>
                <p id="mod-checks"></p>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger" id="btn-mod-limpar" data-bs-dismiss="modal">Limpar</button>
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Alterar</button>
                  <button type="button" class="btn btn-primary" id="btn-mod-env">Enviar</button>
              </div>

          </div>
      </div>
  </div>


    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="validaForm.js"></script>
    <script src="src/scripts/headerComplement.js"></script>
    <script>
      activeCreateAccount();
    </script>
  </body>
</html>