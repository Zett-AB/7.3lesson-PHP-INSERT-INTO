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
                    На уроке узнаем как вставить данные в MySQL с помощью языка SQL и PHP";

        echo "<h2 class='nkname'>" . $hello . $nickname . "<br>" . "<br>" . $offer . "</h2>";
        ?>
        <section class="begin">
            <p>
                На этом уроке рассмотрим как вставлять/вносить новые данные в нашу таблицу в БД о которой говорили на предыдущем уроке.<br>
                Снова пишем код подключения к нашей БД.<br>
                Наш код:<br>
                ?php<br>
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                if (mysqli_connect_errno()) {<br>
                printf("Соединение не установлено", mysqli_connect_error());<br>
                exit();<br>
                }<br>
                $mysqi->set_charset('utf8');<br>

                $mysqi->close();<br>
                ?>
            </p>
            <p>
                Все соединение с нашей БД установлено и теперь переходим непосредственно к оператору INSERT.
            </p>
        </section>
        <section class="main_part">
            <p>
                Оператор INSERT - используется для вставки одной или нескольких записей в таблицу.<br>
                Существует два синктаксиса для оператора INSERT, все зависит от того, вставляем одну запись или несколько записей.<br>
            </p>
            <p>
                При встаке одной записи в таблицу используется синктаксис:<br>
                INSERT INTO table(column1, column2, ...) VALUES (expression1, expression2, ...);<br>
                где <br>
                table - таблица, в которую нужно вставить записи;<br>
                column1, column2 - столбцы в таблице для вставки записей;<br>
                expression1, expression2 - значения присваивающиеся столбцам в таблица, т.е. column1 будет присвоено значение "expression1", а column2 будет присовено значение "expression2" и т.д.<br>
            </p>
            <p>
                При вставке нескольких записей в таблицу используется синтаксис:<br>
                INSERT INTO table<br>
                (column1, column2, ...)<br>
                SELECT expression1, expression2, ...<br>
                FROM source_table<br>
                [WHERE conditions];<br>
                где<br>
                table - таблица в которую вносим/вставляем записи;<br>
                column1, column2 - столюцы таблицы, куда вставляем/вносим значения;<br>
                expression1, expression2 - значения присваивающиеся столбцам в таблица, т.е. column1 будет присвоено значение "expression1", а column2 будет присовено значение "expression2" и т.д.<br>
                source_table - используется при вставке записей из другой таблицы. Это исходная таблица при выполнении вставки.<br>
                WHERE conditions - необязательный, используется при вставке записей из другой таблицы, это те условия которые должны быть соблюдены для вставки записей.<br>
            </p>
            <p class="important">
                <b>ВАЖНО!</b><br>
                Второй вариант синтаксиса используется когда данные из одной таблицы вставляются в стоблцы другой таблицы.
            </p>
            <p>
                В нашем уроке мы будем использовать первый вариант, так как будем сами вносить/вставлять новые данные/значения в столбцы нашей таблицы.
            </p>
            <p>
                Оператор INSERT обычно использует с INTO(перевод - добавить в).
            </p>
            <p></p>
        </section>
    </main>

</body>

</html>