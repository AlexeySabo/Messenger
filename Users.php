<?php require_once("connect.php"); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Запись информации в базу данных</title>
    <meta charset='utf-8'>
</head>
<body>
<a href="/index.php">Главная страница сайта</a><hr>
<a href="/Apage.php">Страница тестирования A</a><hr>
<a href="/Bpage.php">Страница тестирования B</a><hr>
<a href="/Cpage.php">Закрытая страница тестирования C</a><hr>
<a href="/Users.php">Запись пользователей в базу данных</a><hr>
<h4>Добавлениие нового пользователя</h4>
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
    $query = "INSERT INTO Users VALUES (NULL, :Login, :Password, :Avatar)";
    $names = $pdo->prepare($query);
    $names->execute(['Login' => $_POST['Login'], 'Password' => $_POST['Password'], 'Avatar' => ($_FILES['Avatar']['name'])]);

    @copy($_FILES['Avatar']['tmp_name'], $_FILES['Avatar']['name']);

    $query = "SELECT * FROM Users";
    $names = $pdo->query($query);

    ?>

</table>

<h4>Список пользователей</h4>
<table>
    <?while($catalog = $names->fetch()) {
    $uid = $catalog['User_id']; ?>
    <form action='' method='POST' enctype='multipart/form-data'>
        <tr>
            <td>ID пользователя:</td>
            <td><?echo $catalog['User_id']; ?></td>
        </tr>
        <tr>
            <td>Логин:</td>
            <td><?echo $catalog['Login']; ?></td>
            <td><input type='text' name='Login<?echo $uid; ?>'></td>
        </tr>
        <tr>
            <td>Пароль:</td>
            <td><?echo $catalog['Password']; ?></td>
            <td><input type='password' name='Password<?echo $uid; ?>'></td>
        </tr>
        <tr>
            <td>Аватар:</td>
            <td><img src="<?echo 'Avatars\\'.$uid.$catalog['Avatar']; ?>"/></td>
            <td><input type="file" name="Avatar<?echo $uid; ?>"></td>
        </tr>
        <tr>
            <td>Изменить</td>
            <td><input type="submit" value="Изменить"></td>
        </tr>
        <tr>
            <td><br></td>
            <td><br></td>
        </tr>
    </form>
        <?
        if (!empty($_POST['Login'.$uid])) {
            $query = "UPDATE Users SET Login = :Login WHERE User_id = $uid";
            $names = $pdo->prepare($query);
            $names->execute(['Login' => $_POST['Login' . $uid]]);
        }

        if (!empty($_POST['Password'.$uid])) {
            $query = "UPDATE Users SET Password = :Password WHERE User_id = $uid";
            $names = $pdo->prepare($query);
            $names->execute(['Password' => $_POST['Password' . $uid]]);
        }

        if (!empty($_FILES['Avatar'.$uid]['name'])) {
            $query = "UPDATE Users SET Avatar = :Avatar WHERE User_id = $uid";
            $names = $pdo->prepare($query);
            $names->execute(['Avatar' => ($_FILES['Avatar'.$uid]['name'])]);
            @copy(($_FILES['Avatar'.$uid]['tmp_name']), ('Avatars\\'.$uid.$_FILES['Avatar'.$uid]['name']));
        }


//

     /*   $query2 = "UPDATE Users SET Login = :Login, Password = :Password, Avatar = :Avatar, File = :File WHERE User_id = $uid";
        $names2 = $pdo->prepare($query2);

        if (!empty($_POST['Login'.$uid])||($_POST['Password'.$uid])||($_POST['Avatar'.$uid])||($_POST['File'.$uid])){
        $names2->execute(['Login' => $_POST['Login' . $uid], 'Password' => $_POST['Password' . $uid], 'Avatar' => $_POST['Avatar' . $uid], 'File' => $_POST['File' . $uid]]);}*/
        }



//        $file_path = "'\'images'\'";



     /*   if(@copy($_FILES['Avatar.$uid']['tmp_name'], $_FILES['Avatar.$uid']['name']))
        {
        print_r($_FILES);
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
        } else {
            echo("Ошибка загрузки файла");
        }
*/

    ?>
</table>

</body>
</html>

