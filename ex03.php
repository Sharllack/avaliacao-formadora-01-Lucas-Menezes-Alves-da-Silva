<?php
$result = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $massa = isset($_POST['massa']) ? filter_var($_POST['massa'], FILTER_VALIDATE_FLOAT) : null;
    $volume = isset($_POST['volume']) ? filter_var($_POST['volume'], FILTER_VALIDATE_FLOAT) : null;

    if ($massa === null || $volume === null) {
        $result = 'Preencha os campos corretamente!';
    } elseif ($massa < 0 || $volume < 0) {
        $result = 'O valor não pode ser negativo!';
    } else {
        $densidade = $massa / $volume;
        $result = number_format($densidade, 2, ',', '.');

        sleep(2);
    }

    echo $result;
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
    <link rel="stylesheet" href="./estilo_ex03/style.css">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
    function showLoading() {
        document.getElementById('result').innerText = 'Calculando...';
    }
    </script>
    <title>Calculo de Densidade</title>
</head>

<body>
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
            <h1>Calculo da Densidade</h1>
            <form id="densityForm" class="form" onsubmit="showLoading()">
                <label for="massa">Massa</label><br>
                <input type="number" name="massa" id="massa" placeholder="Massa" required step="0.000000001">
                <label for="volume">Volume</label>
                <input type="number" name="volume" id="volume" placeholder="Volume" required step="0.00000001">

                <button type="submit">Calcular</button>
                <p style="color: white;" id="result">Resultado: <?= htmlspecialchars($result) ?></p>
            </form>
        </section>
    </main>

    <script src="./js_ex03/jquery.js"></script>
    <script src="./js_ex03/script.js"></script>
    <script src="./js_index/particle.js"></script>
    <script src="./js_geral/scripts.js"></script>
</body>

</html>