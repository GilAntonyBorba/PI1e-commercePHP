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

    <!-- Scripts -->
    
    

</head>
<body>
    <?php
        include "header.php";
    ?>
    <main>
        <?php
            $errorMsgNome="";
            $errorMsgEmail="";
            $errorMsgSenha="";
            $errorMsgSenhaConfirm="";
            $errorMsgRadio="";
            $errorMsgCheckbox="";

            $agradecimento = true;

            $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
            $senhaConfirm = isset($_POST["senha-confirm"]) ? $_POST["senha-confirm"] : "";
            $radioConheciaAntes = isset($_POST["conheciaAntes"]) ? $_POST["conheciaAntes"] : "";
            $checkboxes = isset($_POST['conheceu']) ? $_POST['conheceu'] : array();

            //A função trim retorna uma nova string após remover eventuais espaços no início e no fim da string passada como parâmetro (assim como tabulações e quebras de linhas)
            //strpos retorna a posição da primeira ocorrência de um caractere na string. Se não encontrar o caractere (nesse caso, o espaço em branco), retorna false.

            // NAME-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if (trim($nome) == ""){
                $errorMsgNome = "Usuário deve ser preenchido"; 
            }else if(strpos(trim($nome), ' ') === false){
                $errorMsgNome = "Usuário deve conter pelo menos dois termos (nome e sobrenome, separados por um espaço em branco)"; 
            }

            // EMAIL-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if (trim($email) == ""){
                $errorMsgEmail = "O E-mail deve ser preenchido"; 
            }else if(strpos(trim($email), '@') < 2){
                $errorMsgEmail = "O E-mail deve conter o @ a partir da segunda posição"; 
            }

            // SENHA-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if (trim($senha) == ""){
                $errorMsgSenha = "Uma senha deve ser fornecida"; 
            }else if(strpos(trim($senha), ' ') !== false){
                $errorMsgSenha = "UA senha não deve ter espaços em branco"; 
            }else if (strlen(trim($senha)) < 8) {
                $errorMsgSenha = "A senha deve conter pelo menos 8 caracteres"; 
            }else if(trim($senha)!==trim($senhaConfirm)){
                $errorMsgSenhaConfirm = "A confirmação de senha não confere!";
            }
            
            //Radio-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if (trim($radioConheciaAntes) == ""){
                $errorMsgRadio = 'Nenhuma opção selecionada em "Já nos conhecia anteriormente"';
            }

            //Checkboxes-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if (is_array($checkboxes)) {
                $cont = count($checkboxes);
                if ($cont === 0) {
                    $errorMsgCheckbox = 'Nenhuma opção selecionada em "Por onde nos conheceu"';
                }
            } else {
                if(trim($checkboxes) == ""){
                    $errorMsgCheckbox = 'Nenhuma opção selecionada em "Por onde nos conheceu"';
                }
            }

            // MENSAGENS DE ERRO-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if($errorMsgNome != ""){
                echo <<<HTML
                    <p>$errorMsgNome</p>
                HTML;
                $agradecimento=false;
            }
            if($errorMsgEmail != ""){
                echo <<<HTML
                    <p>$errorMsgEmail</p>
                HTML; 
                $agradecimento=false;
            }
            if($errorMsgSenha != ""){
                echo <<<HTML
                    <p>$errorMsgSenha</p>
                HTML; 
                $agradecimento=false;
            }
            if($errorMsgSenhaConfirm != ""){
                echo <<<HTML
                    <p>$errorMsgSenhaConfirm</p>
                HTML; 
                $agradecimento=false;
            }
            if($errorMsgRadio != ""){
                echo <<<HTML
                    <p>$errorMsgRadio</p>
                HTML; 
                $agradecimento=false;
            }
            if($errorMsgCheckbox != ""){
                echo <<<HTML
                    <p>$errorMsgCheckbox</p>
                HTML; 
                $agradecimento=false;
            }

            // ENVIANDO PARA O BANCO-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if($agradecimento==true){
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                
                try {

                    require "conexaoMysql.php";
                    $pdo = mysqlConnect();

                    // Inicia a transação
                    $pdo->beginTransaction();

                    //para armazenar valores de múltiplos checkboxes em uma única coluna do banco 
                    //serialização dos valores antes de armazená-los
                    //json_encode() no PHP para converter um array de valores de checkbox em uma string JSON
                    $checkboxesSerialized = json_encode($checkboxes);

                    $sql = <<<SQL
                        INSERT INTO cliente (nome, email, senha, conheciaAntes, conheceu)
                        VALUES (? , ? , ? , ? , ?)
                    SQL;

               
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$nome,$email,$senhaHash,$radioConheciaAntes,$checkboxesSerialized]);


                    // Finaliza a transação se tudo ocorreu sem erros
                    $pdo->commit();
                }
                catch (Exception $e) {
                    // Se algo deu errado, reverte a transação
                    $pdo->rollBack();
                    exit('Mas, Falha inesperada: ' . $e->getMessage());
                    $agradecimento==false;
                }   
            }
            
      
         
            
            
            // AGRADECIMENTO-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if($agradecimento==true){
                $checkboxValues = implode(", ", $checkboxes);

                //htmlspecialchars converte, por padrão:
                // < em &lt;
                // > em &gt;
                // & em &amp;
                // " em &quot;
                $nome = htmlspecialchars($nome);
                $email = htmlspecialchars($email);
                $senha = htmlspecialchars($senha);
                $radioConheciaAntes = htmlspecialchars($radioConheciaAntes);
                $checkboxValues = htmlspecialchars($checkboxValues);

                echo <<<HTML
                    <h1 class="title"></h1>
                    <h2>Dados fornecidos:</h2>
                    <!-- NÃO FAÇA ABAIXO ANTES DE VERIFICAR XSS
                    e também só deve ser feito quando for resgatado do banco
                    -->
                    
                    <p>Nome: $nome</p>
                    <p>Email: $email</p>
                    <p>Senha: $senha</p>
                    <p>Já nos conhecia anteriormente? $radioConheciaAntes</p>
                    <p>Por onde nos conheceu? $checkboxValues</p>
                    <br>
                    <h3><a href="login.php">Ir para a página de login</a></h3>
                    
                    
                HTML;
                echo "
                <script>
                    getUser();
                </script>
                ";
               
            }    
        ?>
    </main>
    <?php
        include "footer.php";
    ?>
    <script>
      const getUser = () =>{
        const user = JSON.parse(localStorage.getItem("@User"))
        const h1El = document.querySelector(".title")
        if(!user){
          h1El.textContent = 'Cadastro realizado com sucesso!'
        }else{
          h1El.textContent = `${user.nome} cadastrado com sucesso!`
        }
      }
      getUser();
    </script>
    
  </body>
</html>