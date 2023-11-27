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
    <!-- <link rel="stylesheet" href="src/styles/styleCreateAccount.css"> -->
    <link rel="stylesheet" href="src/styles/styleConsultas.css">


</head>
<body>
    <?php
        include "header.php";
    ?>
    <main>
        <div class="div-title">
            <h1>CONSULTAS</h1>
            <h2>Pesquisa de Usuários</h2>
            <form action="" method="post" class="form-consulta">
                <input type="text" id="searchName" name="searchName" placeholder="Digite parte do nome" required>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </form>
        </div>
      


    <div class="div-consultas">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $searchName = $_POST['searchName'];
                require "conexaoMysql.php";
                $pdo = mysqlConnect();
                echo '<hr>';

                $sql = "SELECT nome, email, conheciaAntes, conheceu
                FROM cliente
                WHERE nome LIKE :searchName";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':searchName', '%' . $searchName . '%');
                $stmt->execute();

                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($results) {
                    echo '<ul class="user-list">';
                    foreach ($results as $row) {
                        echo '<li class="user-item">';
                        echo '<strong>Nome:</strong> ' . htmlspecialchars($row['nome']) . '<br>';
                        echo '<strong>Email:</strong> ' . htmlspecialchars($row['email']) . '<br>';
                        echo '<strong>Já Conhecia Antes?</strong> ' . htmlspecialchars($row['conheciaAntes']) . '<br>';
                        echo '<strong>Por onde Conheceu?</strong> ' . htmlspecialchars($row['conheceu']) . '<br>';
                        echo '</li>';
                        echo '<hr>';
                    }
                    echo '</ul>';
                } else {
                    echo '<p>Nenhum resultado encontrado para a pesquisa atual.</p>';
                }
            }
        ?>
    </div>
    
      
        
    </main>
    <?php
        include "footer.php";
    ?>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Scripts -->
    
    <script src="src/scripts/headerComplement.js"></script>
    <script>
        
    </script>

  </body>
</html>