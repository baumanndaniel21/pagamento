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
        <input type="number" name="hora_trabalhada" required placeholder="hora" maxlength="2"/>:
        <input type="number" name="minuto_trabalhado" required placeholder="minutos"  min="0" max="59" maxlength="2"/>
        <br />
        <input type="submit" value="Calcular" />
    </form>
    <?php 
    if($_POST){
        //Atribuir os valores nas variáveis recebidas do formulário
        $valorHora = $_POST['vl_hora'];
        $horaTrabalhada = $_POST['hora_trabalhada'];
        $minutoTrabalhado = $_POST['minuto_trabalhado'];
        echo ("Valor da hora R$ $valorHora");

    }//Fim IF Post
    ?>
</body>

</html>
