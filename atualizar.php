<?php
include 'db.php';
if(!isset($_GET['id'])) {
    header('Location: listar.php');
    exit;
}
$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->execute([$id]);
$appointment = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$appointment){
    header('Location: listar.php');
    exit;
}
$Nome     = $appointment['Nome'];
$Preco    = $appointment['Preco'];
$Tamanho  = $appointment['Tamanho'];
$Quantidade= $appointment['Quantidade'];
$Peso = $appointment ['Peso'];
$Preco = $appointment['Preco'];
?>

<!DOCTYPE html>
<link rel="stylesheet" href="atualizar.css">
<html>
<head>
    <title>Atualizar Compromisso</title>
</head>
<body>
     <h1>Atualizar Compromisso</h1>
     <form method="post">
       
     <label for="Nome">Nome</label>
        <input type="text" name="Nome" 
        value="<?= $appointment['Nome'];?>"required><br> 

        <label for="Tamanho">Tamanho</label>
        <input type="text" name="Tamanho" value="<?= $appointment['Tamanho'];?>" required><br> 

        <label for="Peso">Peso</label>
        <input type="text" name="Peso" value="<?= $appointment['Peso'];?>" maxLength="11" required><br> 

        <label for="quantidade">Quantidade</label>
        <input type="text" name="quantidade"value="<?= $appointment['Quantidade'];?>" required><br> 

        <label for="Preco">Preço</label>
        <input type="text" name="Preco" value="<?= $appointment['Preco'];?>" required><br> 

        <button type="submit">Atualizar</button>
</form>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Nome = $_POST['Nome'];
    $Preco = $_POST['Preco'];
    $Tamanho= $_POST['Tamanho'];
    $Peso = $_POST['Peso'];
    $Quantidade= $_POST['quantidade'];

    $stmt = $pdo->prepare('UPDATE produtos SET Nome = ?, Preco = ?, Tamanho= ?, Peso = ?, Quantidade= ? WHERE id = ?');
    $stmt->execute([$Nome, $Preco, $Tamanho, $Peso, $Quantidade, $id]);
    header('Location: listar.php');
    exit;
}