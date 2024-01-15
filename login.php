<form action="" method="POST">
    <input name="login">
    <input name="password" type="password">
    <input type="submit">
</form>

<?php
//автризция
$link = new mysqli("localhost", "root", "", "sibagatova");
session_start();
if (!empty($_POST['password']) and !empty($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM loginPas WHERE login='$login' AND password='$password'";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);
    if (!empty($user)) {
        $_SESSION['auth'] = true;
    } else {
        // неверно ввел логин или пароль
        echo "неверный логин или пароль";
    }
}
?>
<?php
if (!empty($_SESSION['auth'])) {
}
?>
<?php if (!empty($_SESSION['auth'])): ?>
    <!DOCTYPE html>
    <html>
    <head>
    </head>
    <body>
    <p>текст только для авторизованного пользователя</p>
    </body>
    </html>
<?php else: ?>
    <p>пожалуйста, авторизуйтесь</p>
<?php endif; ?>

<?php
session_start();
$_SESSION['auth'] = null;
?>


