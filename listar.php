<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href= "todoscss/listar.css">
        <title> produtos </title>
</head>
<body class= "listar">
    <h1>produtos </h1>

    <?php
    $stmt = $pdo->query ('SELECT * FROM produtos');
    $stmt->execute();
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count ($produtos) == 0) {
        echo '<p> Nenhuma fruta escolhida. </p>';
    } else {
        echo '<table border="1">';
        echo '<thead><tr><th>nome</th><th>Tamanho</th><th>Peso</th><th>Quantidade</th><th>Preço</th><th colspan="2">Opções</th></tr></thead>';
        echo '<tbody>';

        foreach ($produtos as $produto) {
            echo '<tr>';
            echo '<td>' . $produto['Nome'] . '</td>';
            echo '<td>' . $produto['Tamanho'] . '</td>';
            echo '<td>' . $produto['Peso'] . '</td>';
            echo '<td>' . $produto['Quantidade'] . '</td>';
            echo '<td>' . $produto['Preco'] . '</td>';
            echo '<td><a style="color:black;" href="atualizar.php?id=' . 
        $produto ['ID'] . '">atualizar</a></td>';
            echo '<td><a style="color:black;" href="deletar.php?id=' . $produto ['ID'] . '">Deletar</a></td>';
            echo '<try>';
        }
        echo '</tbody>';
        echo '</table>';
    }

    ?>
    </body>

    </html>