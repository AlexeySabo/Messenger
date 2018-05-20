<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Страница моего сайта A</title>
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
            <td><input type='file' name='Avatar'></td>
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

require_once("connect.php");

/*


    echo("Файл успешно загружен <br>");
    echo("Характеристики файла: <br>");
    echo("Имя файла: ");
    echo($_FILES["Avatar"]["name"]);
    echo("<br>Размер файла: ");
    echo($_FILES["Avatar"]["size"]);
    echo("<br>Каталог для загрузки: ");
    echo($_FILES["Avatar"]["tmp_name"]);
    echo("<br>Тип файла: ");
    echo($_FILES["Avatar"]["type"]);


*/


/*try {
// Проверяем, заполнены ли поля HTML-формы
    if (empty($_POST['name'])) exit('Не заполнено поле "Название"');
// Добавляем новостное сообщение в таблицу news
    $query = "INSERT INTO Names VALUES (NULL, :name)";
    $names = $pdo->prepare($query);
    $names->execute(['name' => $_POST['name']]);
} catch (PDOException $e) {
    echo "Ошибка выполнения запроса: " . $e->getMessage();
}*/

?>