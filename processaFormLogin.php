<?php
    $errorMsgEmail="";
    $errorMsgSenha="";
    $errorMsgSenhaConfirm="";

    $entrou = true;
    $finalizar = false;

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
    
    //A função trim retorna uma nova string após remover eventuais espaços no início e no fim da string passada como parâmetro (assim como tabulações e quebras de linhas)
    //strpos retorna a posição da primeira ocorrência de um caractere na string. Se não encontrar o caractere (nesse caso, o espaço em branco), retorna false.

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
    }
    
    // BANCO-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
    if ($errorMsgEmail != "" || $errorMsgSenha != "") {
        $entrou = false;
    }else{
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        
        try {

            require "conexaoMysql.php";
            $pdo = mysqlConnect();

            $sql = "SELECT nome, email, senha
            FROM cliente
            WHERE email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $nomeDB = htmlspecialchars($row['nome']);
                $emailDB = htmlspecialchars($row['email']);
                $senhaDB = htmlspecialchars($row['senha']);

                // Verifica se a senha fornecida corresponde à senha no banco de dados usando password_verify()
                if (!password_verify($senha, $senhaDB)) {
                    $errorMsgSenhaConfirm = "A senha fornecida está incorreta!";
                    $entrou = false;
                }
            } else {
                $errorMsgEmail = "O e-mail fornecido não está registrado!";
                $entrou = false;
            }
            
        }
        catch (Exception $e) {
            exit('Mas, Falha inesperada: ' . $e->getMessage());
            $entrou==false;
        }
    }
    if($entrou == true){
        // echo "
        // <script>
        //     saveUser();
        // </script>
        // ";
       $finalizar = true;
    }
    if($finalizar == true){
         // Redirecionamento para outra página após o processamento do formulário
         header('Location: account.php');
         exit();
    }
    
?>


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
        // MENSAGENS DE ERRO-=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=-=-=-=-=--=-=
            if($errorMsgEmail != ""){
                echo <<<HTML
                    <p>$errorMsgEmail</p>
                HTML; 
                $entrou=false;
            }
            if($errorMsgSenha != ""){
                echo <<<HTML
                    <p>$errorMsgSenha</p>
                HTML; 
                $entrou=false;
            }
            if($errorMsgSenhaConfirm != ""){
                echo <<<HTML
                    <p>$errorMsgSenhaConfirm</p>
                HTML; 
                $entrou=false;
            }
            
        ?>
    </main>
    <?php
        include "footer.php";
    ?>
    <!-- Não está funcionando: -->
    <script>
        const saveUser = () => {
            const user = {
                nome: "<?php echo isset($nomeDB) ? $nomeDB : ''; ?>",
                email: document.getElementById("InputEmail").value
            }
            localStorage.setItem("@User", JSON.stringify(user))
            alert(`Nome: ${user.nome} - Email: ${user.email}`);
        };
    </script>
    
  </body>
</html>