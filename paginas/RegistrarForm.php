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
        $dados = $db->update("usuario",$_POST);
        header("location: UsuarioList.php");
    }

    else if($_POST){
        $dados = $db->Insert("usuario",$_POST);
        header("location: UsuarioList.php");
    }

    if($_GET['id']){
        $usuario = $db->find("usuario",$_POST);
    }
?>
<body>
    <h2>Sistema Academico</h2>


    <h3>Formulário Registrar Usuario</h3>

    <form action="UsuarioForm.php" method="post">
        <input type="hidden" name="id">

        <label for="nome">Nome</label>
        <input type="text" name="nome"?><br>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" ?><br>

        <label for="email">Email</label>
        <input type="text" name="email" ?><br>

        <label for="senha">Senha</label>
        <input type="text" name="senha"><br>

        <label for="c_senha">Confirmar Senha</label>
        <input type="text" name="c_senha"><br>

        <button type="submit">Salvar</button><br>
        <a href="UsuarioList.php">Voltar</a>
    </form>
</body>
</html>