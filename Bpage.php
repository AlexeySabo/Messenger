<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Страница моего сайта B</title>
    <meta charset='utf-8'>
</head>
<body>

<a href="/index.php">Главная страница сайта</a><hr>
<a href="/Apage.php">Страница тестирования A</a><hr>
<a href="/Bpage.php">Страница тестирования B</a><hr>
<a href="/Cpage.php">Закрытая страница тестирования C</a><hr>
<a href="/Users.php">Запись пользователей в базу данных</a><hr>

<table>
    <form action='' method='POST'>
        <tr>
            <td>Название:</td>
            <td><input type='text' name='name'></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='Добавить'></td>
        </tr>
    </form>
</table>

</body>
</html>

<?php
//
require_once("connect.php");

    $query = "INSERT INTO news VALUES (NULL, :name, NOW())";
    $news = $pdo->prepare($query);
    $news->execute(['name' => $_POST['name']]);

?>