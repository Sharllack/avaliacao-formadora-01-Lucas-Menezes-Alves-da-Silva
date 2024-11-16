<?php

$userError = '';
$authError = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = isset($_POST['user']) ? filter_var($_POST['user'], FILTER_SANITIZE_STRING) : '';
    $pass = isset($_POST['pass']) ? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : '';

    $userAuth = '16727125724';
    $passAuth = 'LoideMartha12*';

    if ($user == '' || $pass == '') {
        $authError = 'Preencha Todos os Dados Corretamente.';
    } elseif ($user == $userAuth && $pass != $passAuth) {
        sleep(2);
        $authError = 'Senha incorreta.';
    } elseif ($user != $userAuth) {
        sleep(2);
        $authError = 'Usuário Não Consta no Banco de Dados.';
    } else {
        sleep(2);
        $authError = 'Login Efetuado Com Sucesso.';
        echo json_encode(['success' => true, 'message' => $authError]);
        exit;
    }

    echo json_encode(['success' => false, 'message' => $authError]);
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo_geral/style.css">
    <link rel="stylesheet" href="./estilo_geral/media_query.css">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link rel="stylesheet" href="./estilo_ex02/style.css">
    <title>Login</title>
</head>

<body>
    <div class="bgLoad" style="display: none;">
        <div class="load"></div>
    </div>
    <div id="particles-js"></div>
    <header>
        <div class="home">
            <a href="./index.php">Principal</a>
        </div>
        <div class="ex">
            <a href="./ex01.php">Exercício 1</a>
            <a href="./ex02.php">Exercício 2</a>
            <a href="./ex03.php">Exercício 3</a>
        </div>
        <div class="menu">
            <img src="./imagens/menu_24dp_E8EAED_FILL0_wght400_GRAD0_opsz24.png" alt="menu" class="menuIcon">
        </div>
    </header>
    <div class="back">
        <a href="./index.php">Voltar</a>
    </div>

    <div class="logo">
        <img src="./imagens/logo.png" alt="logo">
    </div>

    <main>
        <section>
            <h1>Login</h1>
            <form class="form">
                <label for="user">Usuário</label><br>
                <input type="text" name="user" id="user" placeholder="Usuário">
                <span class="userError"></span>
                <br>

                <label for="pass">Senha</label><br>
                <input type="password" name="pass" id="pass" placeholder="Senha" style="margin-bottom: 5px;">
                <span class="authError" style="margin-bottom: 15px; display: block;"></span>
                <button type="submit">Entrar</button>
            </form>
        </section>
    </main>

    <script src="./js_ex02/jquery.js"></script>
    <script src="./js_index/particle.js"></script>
    <script src="./js_ex02/script.js"></script>
    <script src="./js_geral/scripts.js"></script>
</body>

</html>