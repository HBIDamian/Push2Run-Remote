<?php
ob_start();
session_start();
require_once('config.php');

if (isset($_SESSION['login'])) {
    header('LOCATION: loggedIn.php');
    die();
}
if (!$autoFillUsername == true) {
    $username = "";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>Push2Run Remote Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, target-densitydpi=device-dpi">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-16x16.png">
    <link rel="mask-icon" href="assets/images/safari-pinned-tab.svg" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="manifest" href="manifest.json">.
    <link rel="stylesheet" href="assets/css/login.css" media="screen">
    <link rel="stylesheet" href="assets/css/background.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username === 'damian' && password_verify($password, $hashedPassword)) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            header('Location: ./loggedIn.php');
            die();
        } else {
            echo ("<p style=\"color:white;\">Error: Password not found!</p>");
        }
    }
    ?>
    <form action="" method="post">
        <h3>Login Here</h3>
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo ($username) ?>" placeholder="Email or Phone" id="username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="submit" name="submit">Log In</button>
    </form>
</body>

</html>