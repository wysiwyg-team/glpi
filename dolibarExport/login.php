<?php
/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 4/23/2018
 * Time: 5:06 PM
 */

session_start();

echo isset($_SESSION['login']);
if (isset($_SESSION['login'])) {
    header('Location: dolibarExportGenerator.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'ankush' && $password === 'dev123') {
        $_SESSION['login'] = true;
        header('Location: dolibarExportGenerator.php');
    }
    {
        echo "<div>Username and Password do not match.</div>";
    }
die();
}
?>
<form action="" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"> <br> <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"> <br> <br>

    <button type="submit" name="submit">Login</button>
</form>

</body>
</html>
