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
                Оператор INSERT обычно использует с INTO(перевод - добавить в).<br>
                Синтаксис для оператора INSERT мы указали ранее, но повторим его еще раз -
                но с учетом нашей БД.
            </p>
            <p>
                INSERT INTO далее пишется имя таблицы(в нашем случаи movie), затем пишем параметры VALUES(т.е. указываем какие параметры надо/нужно добавить в нашу таблицу БД). <br>
                Затем в скобках перечисляем параметры, нашем примере параметрами будут - ID, name, descriptions, year, add_date.<br>
                Поскольку значение параметра - ID, в нашей таблице присваивается автоматически, то мы пишем значение для данного параметра - null, т.е. значение без значения.
            </p>
            <p class="dop_inform">
                ДЛЯ ИНФОРМАЦИИ<br>
                null - вместо значения указываем/используем там, где значение должно быть, но его пока нет.
            </p>
            <p>
                На месте параметра add_date указываем функцию - Now(), чтобы автоматически проставлялась текущая дата, когда внесли изменения в таблицу.
            </p>
            <p>
                Таким образом, для внесения новой информации в нашу таблицу
                мы создаем переменную имеющую значение с использованием оператора INSERT, т.е. для нашего примера код будет следующим:<br>
                $query="INSERT INTO movie VALUES(null,'Безумный Макс','Описание фильма','2015', NOW())";
            </p>
            <p>
                Теперь после того как мы создали переменную $query пишем код о её применении, а именно:<br>
                $mysqli->query($query);<br>
                т.е. mysqli запросить query, в которую мы поместили нашу переменную $query о добавлении новой информации в нашу таблицу БД.
            </p>
            <p class="code_bd">
                В конечном виде наш код по добавлению новой информации в нашу
                таблицу БД будет выглядеть следующим образом:<br>
                ?php<br>
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');<br>
                if (mysqli_connect_errno()) {<br>
                printf("Соединение не установлено", mysqli_connect_error());<br>
                exit();<br>
                }<br>
                $mysqi->set_charset('utf8');<br>
                $query="INSERT INTO movie VALUES(null,'Безумный Макс','Описание фильма Безумный Макс','2015',now())";<br>
                $mysqli->query($query);<br>
                $mysqi->close();<br>
                ?>
            </p>
        </section>
        <section class="code_php">
            <p>
                Теперь ниже мы пишем наш код на PHP и выдим результат как в таблице так и на экране монитора в браузере.<br>
                Главное не забудьте обновить окно браузера.
            </p>
            /*<?php
                $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');
                if (mysqli_connect_errno()) {
                    printf("Соединение не установлено", mysqli_connect_error());
                    exit();
                }
                $mysqi->set_charset('utf8');

                /*$query = "INSERT INTO movie VALUES(null,'Безумный Макс','Описание фильма Безумный Макс','2015',now())";
                $mysqi->query($query);*/

                $mysqi->close();
                ?>*/

            <p>
                В браузере мы не увидим внесенные нами изменения, так как в коде мы не писали соответствующую строку/скрипт.<br>
                Однако изменения мы увидим в нашей таблице, когда зайдем в панель управления БД MyAdminPHP.<br>
                Если нам нужно увидеть изменения, которые мы внесли в нашу таблице на экране в браузере, то нам надо написать следующий скрипт/код.<br>
                $quer = $mysqi->query('SELECT * FROM movie');<br>
                while ($row = mysqli_fetch_assoc($query)) {<br>
                echo $row['name'] . $row['descriptions'].$row['year'].$row['add-date']."br>";<br>
                }
            </p>
            <p>
                Теперь давайте проверим наш код и напишем его ниже, чтобы увидеть результат. Предварительно верхний код мы задокументируем в /* */.
            </p>

            <?php
            $mysqi = new mysqli('localhost', 'root', '', 'study7.2lesson');
            if (mysqli_connect_errno()) {
                printf("Соединение не установлено", mysqli_connect_error());
                exit();
            }
            $mysqi->set_charset('utf8');

            /*$query = "INSERT INTO movie VALUES(null,'Безумный Макс','Описание фильма Безумный Макс','2015',now())";
            $mysqi->query($query);*/

            $quer = $mysqi->query('SELECT * FROM movie');
            while ($row = mysqli_fetch_assoc($quer)) {
                echo $row['name'] . $row['descriptions'] . $row['year'] . "<br>";
            }
            $mysqi->close();
            ?>

            <p>
                <b>ВАЖНО!</b>
                Нужно помнить, что наш скрипт/код по внесению информации в БД будет срабатывать каждый раз как мы обновляем таблицу или браузер. То есть при повторном запуску скрипта/кода информация будет добавлятся из него в нашу таблицу БД снова и снова.<br>
                Поэтому строку с внесением информации в нашу таблицу БД мы в коде закоментируем, чтобы не вновить каждый раз при запуске кода эту информацию в БД.
            </p>
        </section>

    </main>

</body>

</html>