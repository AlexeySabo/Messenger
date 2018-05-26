<?php require_once("connect.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Обзор возможностей PHP в Связке MySQL</title>
    <meta charset='utf-8'>
</head>
<body>

<a href="/index.php">Главная страница сайта</a><hr>
<a href="/Apage.php">Страница тестирования A</a><hr>
<a href="/Bpage.php">Страница тестирования B</a><hr>
<a href="/Cpage.php">Закрытая страница тестирования C</a><hr>
<a href="/Users.php">Запись пользователей в базу данных</a><hr>


<h4>Зарегистрироваться</h4>
<table>
    <form action="" method="POST" enctype="multipart/form-data">
        <td>
            <tr>Логин:</tr>
            <tr><input type='text' name='Login'></tr>
        </td>
        <td>
            <tr>Пароль:</tr>
            <tr><input type='password' name='Password'></tr>
        </td>
        <td>
            <tr>Аватар:</tr>
            <tr><input type='file' name='Avatar'></tr>
        </td>
        <td>
            <tr>Кнопка:</tr>
            <tr><input type='submit' value='Зарегистрировать'></tr>
        </td>
    </form>

    <?php
    $query = "INSERT INTO Users VALUES (default, :Login, :Password, :Avatar)";
    $names = $pdo->prepare($query);

    $names->execute(['Login' => $_POST['Login'], 'Password' => $_POST['Password'], 'Avatar' => md5($_FILES['Avatar']['name'])]);

    $query = "SELECT * FROM Users";
    $names = $pdo->query($query);
    while ($catalog = $names->fetch()) {
        $uid=$catalog[ 'User_id' ];
    }

    @copy ( $_FILES[ 'Avatar' ][ 'tmp_name' ] , ( 'Avatars\\' . $uid . md5($_FILES[ 'Avatar' ][ 'name' ] ) ));

    $query = "SELECT * FROM Users";
    $names = $pdo->query($query);
    ?>

</table>


</body>
</html>

<?php



?>
