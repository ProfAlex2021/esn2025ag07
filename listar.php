<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Lista de Produtos - PDO</title>
    </head>

    <body class="w3-black">
        <a href="index.php" class="w3-display-topleft">
            <i class="fa fa-arrow-circle-left w3-large w3-indigo w3-button w3-xxlarge"></i>
        </a><?php
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "pwii";
        try {
            $conecta = new PDO("mysql:dbname=$bd; host=$host; port=3306; charset=utf8", $usuario, $senha);
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo '
            <div class="w3-paddingw3-content w3-half w3-displaytopmiddle w3-margin">
                <h1 class="w3-center w3-indigo w3-round-large w3-margin">Lista de Produtos</h1>
                <table class="w3-table-all w3-centered w3-text-black">
                    <thead>
                        <tr class="w3-center w3-indigo">
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Excluir</th>
                            <th>Atualizar</th>
                        </tr>
                    </thead>
                    <tbody>';
            $sql = "SELECT * FROM produto";
            $resultado = $conecta->query($sql);
            if ($resultado != null)
                foreach ($resultado as $linha) {
                    echo '
                        <tr>
                            <td>' . $linha['idproduto'] . '</td>
                            <td>' . $linha['nome'] . '</td>
                            <td>' . $linha['preco'] . '</td>
                            <td>' . $linha['quantidade'] . '</td>
                            <td>
                                <a href="excluir.php' .
                                        '?id=' . $linha['idproduto'] .
                                        '&nome=' . $linha['nome'] .
                                        '&preco=' . $linha['preco'] .
                                        '&quantidade=' . $linha['quantidade'] . '">
                                    <i class="fa fa-user-times w3-large w3-text-indigo"></i>
                                </a>
                            </td>
                            <td>
                                <a href="atualizar.php' .
                                            '?id=' . $linha['idproduto'] .
                                            '&nome=' . $linha['nome'] .
                                            '&preco=' . $linha['preco'] .
                                            '&quantidade=' . $linha['quantidade'] .'">
                                    <i class="fa fa-refresh w3-large w3-text-indigo"></i>
                                </a>
                            </td>
                        </tr>';
                }
            echo '
                    </tbody>
                </table>
            </div>';
        } catch (PDOException $e) {
            echo "falha ao conectar: " . $e->getMessage();
        }
        ?>
        </div>
    </body>

</html>