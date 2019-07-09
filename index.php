<?php
    //exibir mensagem de erro inforda pelo logar.php
if (isset($_GET['error'])) {
    $erro = $_GET['error'];
    if ($erro == 1) {
        $mensagem = "<br> <span>Oops! Você não inseriu o Username! </span>";
    } else if ($erro == 2) {
        $mensagem = "<br> <span>Oops! Você não inseriu sua Senha! </span>";
    } else if ($erro == 3) {
        $mensagem = "<br> <span>Usuário não encontrado em nosso sistema! </span>";
    }  else if ($erro == 4) {
        $mensagem = "<br> <span>Sua senha está incorreta! </span>";
    }
} else {
    $mensagem = "";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ClaraVisão | Login</title>
    <link rel="stylesheet" href="css/login.css" media="screen,projection">
    <link rel="stylesheet" href="css/materialize.min.css" media="screen,projection">
    <link rel="shortcut icon" href="favicon.png" />
</head>
<body>
    <!-- Tela inicial do sistema -->
    <div class="container center-align">
        <div class="row center">
            <div class="col s12 topo">
                <div class="card cardLogin">
                    <div class="card-content white-text center">
                        <form action="src/logar.php" method="POST" accept-charset="utf-8">
                            <div class="form-group col-md-12 text-center">
                                <img class="logo" src="img/logo.png" alt="ClaraVisão" height="120">
                                <br>
                                <span class="titulo">Faça login para continuar</span>
                                <?php 
                                print $mensagem;
                                ?>
                                <br>
                            </div>
                            <br>
                            <input class="caixa" type="text" name="username" placeholder="Usuário" autofocus class="form-control"> 
                            <br>
                            <input class="caixa" type="password" name="password" placeholder="Senha" autofocus class="form-control">
                            <br> <br>
                            <input class="botao" type="submit" value="Entrar">
                        </form>
                        <!-- Linkar o formulario de esqueci minha senha -->
                        <!-- Passa o valor S para a variavel r, validando o formulario de esqueceu a senha -->
                        <br>
                        <a class="recuperar" href="src/recuperarSenha.php?r=S">Esqueceu a senha? Clique aqui</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/materialize.min.js"></script>
</body>
</html>