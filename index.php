<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Урок 7.3. Вставка данных в MySQL. Оператор INSERT</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="normalize.css">
</head>

<body>
    <main>
        <header>
            <h1>Урок 7.3. Вставка данных в MySQL. Оператор INSERT</h1>
            <h4 class="subtitle">
                В этом уроке вы узнаете как вставить данные в MySQL с помощью языка SQL и PHP
            </h4>
        </header>
        <?php
        $nickname = "Александр!";
        $hello = "Привет ";
        $offer = "Продолжаем изучать PHP<br>
                    На уроке узнаеv как вставить данные в MySQL с помощью языка SQL и PHP";

        echo "<h2 class='nkname'>" . $hello . $nickname . "<br>" . "<br>" . $offer . "</h2>";
        ?>

    </main>

</body>

</html>