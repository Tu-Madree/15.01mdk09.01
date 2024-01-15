<form action="" method="POST">
    <input name="login">
    <input type="password" name="password">
    <input type="password" name="confirm">
    <input type="submit">
</form>

<?php
// $link = new mysqli("localhost", "root", "", "sibagatova");
// if (!empty($_POST['login']) and !empty($_POST['password'])) {
//     $login = $_POST['login'];
//     $password = $_POST['password'];
//     $query = "INSERT INTO loginPas SET login='$login', password='$password'";
//     mysqli_query($link, $query);
//     $_SESSION['auth'] = true; // пометка об авторизации
//     $id = mysqli_insert_id($link);
//     $_SESSION['id'] = $id; // пишем id в сессию

// }
?>

<?php
// $link = new mysqli("localhost", "root", "", "sibagatova");
// if (!empty($_POST['login']) and !empty($_POST['password']) and !empty($_POST['confirm'])) {
//     if ($_POST['password'] == $_POST['confirm']) {
//         // регистрируем
//     } else {
//         // выведем сообщение о несовпадении
//         echo "несовпадение пароля";
//     }
// }
?>
<?php
$link = new mysqli("localhost", "root", "", "sibagatova");
if (!empty($_POST['login']) and !empty($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $query = "SELECT * FROM loginPas WHERE login='$login'";
    $user = mysqli_fetch_assoc(mysqli_query($link, $query));
    if (empty($user)) {
        $query = "INSERT INTO loginPas SET login='$login', password='$password'";
        mysqli_query($link, $query);
        $_SESSION['auth'] = true;
    } else {
        // логин занят, выведем сообщение об этом 
        $_SESSION['auth'] = false;
        echo "этот логин занят";
       
    }
}
?>

