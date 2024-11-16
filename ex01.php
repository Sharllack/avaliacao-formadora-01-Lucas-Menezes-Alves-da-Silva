<?php
$result = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $numero = isset($_POST['valor']) ? filter_var($_POST['valor'], FILTER_VALIDATE_FLOAT) : '';

    if ($numero === false || $numero === '') {
        $result = 'Preencha com um número positivo para dar seguimento.';
    } elseif ($numero < 0) {
        $result = 'Fatorial não é definido para números negativos.';
    } elseif ($numero != floor($numero)) {
        $result = 'O Número deve ser inteiro.';
    } else {
        $resultado = 1;
        for ($i = 1; $i <= $numero; $i++) {
            $resultado *= $i;
        }

        sleep(2);
        $result = number_format($resultado, 2, ',', '.');
    }

    echo htmlspecialchars($result);
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <link rel="stylesheet" href="./estilo_ex01/style.css">
    <link rel="stylesheet" href="./estilo_ex01/media_query.css">
    <link rel="stylesheet" href="./estilo_geral/style.css">
    <link rel="stylesheet" href="./estilo_geral/media_query.css">
    <title>Calculo Fatorial</title>
    <script>
    function showLoading() {
        document.getElementById('result').innerText = 'Calculando...';
    }
    </script>
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
            <h1>Cálculo Fatorial</h1>
            <form action="" method="post" onsubmit="showLoading()" class="form">
                <div class="imp">
                    <input type="number" name="valor" id="valor" placeholder="Digite Um Número Inteiro..." required
                        value="<?php echo isset($_POST['valor']) ? htmlspecialchars($_POST['valor']) : ''; ?>"
                        step="0.0000001">
                    <button type="submit">Calcular</button>
                </div>
                <p id="result">Resultado: <?= htmlspecialchars($result) ?></p>
            </form>
        </section>
    </main>

    <script src="./js_ex01/jquery.js"></script>
    <script src="./js_ex01/script.js"></script>
    <script src="./js_index/particle.js"></script>
    <script src="./js_geral/scripts.js"></script>
</body>

</html>