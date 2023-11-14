<?php 
    include '../db.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    $db = new DB();
    $db->conn();

    if(!empty($_POST['id'])){
        $dados = $db->update("aluno",$_POST);
        header("location: ALunoList.php");
    }

    else if($_POST){
        $dados = $db->Insert("aluno",$_POST);
        header("location: ALunoList.php");
    }

    if($_GET['id']){
        $aluno = $db->find("aluno",$_POST);
    }
?>
<body>
    <form action="AlunoForm.php" method="post">
        <input type="hidden" name="id">
        <label for="nome">Nome</label>
        <input type="text" name="nome"
        value="<?php echo !empty($aluno->nome) ? $aluno->nome:""?>"><br>
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" value="<?php echo !empty($aluno->cpf) ? $aluno->nome:""?>"><br>
        <label for="relefone">Telefone</label>
        <input type="text" name="telefone" value="<?php echo !empty($aluno->telefone) ? $aluno->nome:""?>">

        <button type="submit"><?php !empty($_GET['id']) ? "Editar" : "Salvar" ?></button>
        <a href="AlunoList.php">Voltar</a>
    </form>
</body>
</html>