<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de pagamento</title>
</head>

<body>
    <h1>Folha de pagamento</h1>
    <form method="post">
        <label>Quanto você ganha por hora?</label>
        <input type="number" name="vl_hora" placeholder="R$" required \>
        <br />
        <label>Quantas horas você trabalhou?</label>
        <input type="number" name="hora_trabalhada" required placeholder="hora" maxlength="2" />:
        <input type="number" name="minuto_trabalhado" required placeholder="minutos" min="0" max="59" maxlength="2" />
        <br />
        <input type="submit" value="Calcular" />
    </form>
    <?php
    if ($_POST) {
        //Atribuir os valores nas variáveis recebidas do formulário
        $valorHora = $_POST['vl_hora'];
        $horaTrabalhada = $_POST['hora_trabalhada'];
        $minutoTrabalhado = $_POST['minuto_trabalhado'];
        echo ("Valor da hora R$ $valorHora <br/>");
        echo ("Horas trabalhadas $horaTrabalhada : $minutoTrabalhado");
        //Realizar calculo
        $horaTotal = $horaTrabalhada + $minutoTrabalhado/60;
        //echo ("Hora total: $horaTotal");
        $salario = $valorHora * $horaTotal;
        echo ("<br/>+ Salário Bruto: R$ ".round($salario,2));
        $ir = $salario*11/100;
        echo ("<br/>- IR (11%) : R$ ".round($ir,2));
        $inss = $salario * 8/100;
        echo ("<br/>- INSS (8%) : R$ ".round($inss,2));
        $sindicato = $salario * 5/100;
        echo ("<br/>- Sindicato (5%) : R$ ". round($sindicato,2));
    } //Fim IF Post
    ?>
</body>

</html>