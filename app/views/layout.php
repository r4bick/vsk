<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VSK</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="basic">
        <p class="info">
            Для формирования необходимо заполнить два поля:
            <br>Дата начала периода (минимальное значение 01-04-2017)
            <br>Дата окончания периода (максимальное значение 01-01-2021)
            <br>Ввод начала и окончания периода необязателен, отчет будет сформирован за все время
            <br>Если будет введена только дата начала или дата окончания,отчет будет сформирован за все время
            <br>Если дата начала позже даты окончания, то отчет сформирован не будет
        </p>
        <div class="form">
            <form action="/handler.php" method="post">
                <p><label for="start">Дата начала периода</label><input type="date" name="start" min="2017-04-01" max="2021-01-01" id="start"></p>
                <p><label for="end">Дата окончания периода</label><input type="date" name="end" min="2017-04-01" max="2021-01-01" id="end"></p>
                <p><input type="submit" value="Получить отчет" id="send"></p>
            </form>
        </div>
    </div>
</body>
</html>
