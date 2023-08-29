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
        <input type="number" name="vl_hora" placeholder="R$" required\>
        <br />
        <label>Quantas horas você trabalhou?</label>
        <input type="number" name="hora_trabalhada" required placeholder="hora" />:
        <input type="number" name="minuto_trabalhado" required placeholder="minutos" />
        <br />
        <input type="submit" value="Calcular" />
    </form>
</body>

</html>