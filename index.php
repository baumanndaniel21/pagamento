<!DOCTYPE html>
<html lang="pt_br">

<head>
    <script src="js/color-modes.js"></script>


    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css@3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="theme-color" content="#712cf9">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }
    </style>
    <title>Folha de pagamento</title>
    <link href="css\sign-in.css" rel="stylesheet">
</head>

<body>



    <main class="form-signin w-100 m-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal">Folha de pagamento</h1>
            <div class="form-floating">
                <input type="number" step="0.01" class="form-control" id="vl_hora" placeholder="R$" name="vl_hora"
                    required>
                <label for="vl_hora">Quanto você ganha por hora?</label>
            </div>

            <div class="form-floating">

                <input type="number" id="hora_trabalhada" class="form-control" name="hora_trabalhada" required
                    placeholder="hora" maxlength="2" />
                <label for="hora_trabalhada">Horas</label>
            </div>
            <div class="form-floating">
                <input type="number" id="minuto_trabalhado" class="form-control" class="form-control"
                    name="minuto_trabalhado" required placeholder="minutos" min="0" max="59" maxlength="2" />
                <label for="minuto_trabalhado">Minutos</label>
            </div>
            <input type="submit" class="btn btn-primary w-100 py-2" value="Calcular" />
        </form>



        <?php
        include 'inss.php';
        include 'irpf.php';    
        //if ($_POST) {
        

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //Atribuir os valores nas variáveis recebidas do formulário
            /*
            $valorHora = $_POST['vl_hora'];
            $horaTrabalhada = $_POST['hora_trabalhada'];
            $minutoTrabalhado = $_POST['minuto_trabalhado'];
*/
            /*Implementando as melhorias sugeridas pelo chatGPT
            Sanitização de Entradas:
            Certifique-se de sanitizar as entradas do formulário para evitar possíveis vulnerabilidades de segurança, como ataques de injeção.*/
            $valorHora = isset($_POST['vl_hora']) ? floatval($_POST['vl_hora']) : 0;
            $horaTrabalhada = isset($_POST['hora_trabalhada']) ? intval($_POST['hora_trabalhada']) : 0;
            $minutoTrabalhado = isset($_POST['minuto_trabalhado']) ? intval($_POST['minuto_trabalhado']) : 0;



            echo ("Valor da hora R$ " . number_format($valorHora, 2, ',', '.') . " <br/>");

            //Realizar calculo
            $horaTotal = ($horaTrabalhada + $minutoTrabalhado / 60);
            // Separar a parte inteira das horas e os minutos
            $horasInteiras = floor($horaTotal);
            $minutos = round(($horaTotal - $horasInteiras) * 60);

            // Formatar a saída
            echo "Horas trabalhadas: " . $horasInteiras . "h " . $minutos . "min";
           
            //echo ("Hora total: $horaTotal");
            $salario = $valorHora * $horaTotal;

            echo ("<br/>+ Salário Bruto: R$ " . number_format($salario, 2, ',', '.'));
            echo ("<br/>- IR  : R$ " . number_format(calculaIRPF($salario, descontoINSS($salario)), 2, ',', '.'));
            echo ("<br/>- INSS: R$ " . number_format(descontoINSS($salario), 2, ',', '.'));
            $salarioLiquido = $salario - descontoINSS($salario) - calculaIRPF($salario, descontoINSS($salario));
            echo ("<br/>= Salário Liquido : R$ " . number_format($salarioLiquido, 2, ',', '.'));

        } //Fim IF Post
        
      
        ?>
    </main>
    <script src="js/bootstrap.bundle.min.js" </script>
</body >

</html >