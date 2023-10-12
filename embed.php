<!DOCTYPE html>
<html>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>Push2Run Remote</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<?php
session_start();
require_once('config.php');
if ($debugMode != false) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    ini_set('error_reporting', E_ALL);
    error_reporting(E_ALL);
}
$buttonsArray = json_decode(file_get_contents('buttons.json'), true);



if ((!isset($_SESSION['choButton'])) && (!isset($_SESSION['username']))) {
    die("<h1 style=\"text-align: center;\">This isn't the page you are looking for! </h1><img style=\"display: block; margin-left: auto; margin-right: auto;\" height=\"40%\" src=\"https://i.kym-cdn.com/photos/images/original/000/915/056/50e.jpg\">");
}

$sessionUsername = $_SESSION['username']; // loggedIn.php
$button = $_SESSION['choButton']; // loggedIn.php
// allowed values are the button names within the buttons.json file
$allowedValues = array_column($buttonsArray, 'ButtonName');
// allowedValues and "test"
array_push($allowedValues, "test");

if ($sessionUsername == $username) {
// if button is in the allowed values array
if (in_array($button, $allowedValues)) {
        $curl = curl_init('https://api.pushbullet.com/v2/pushes');

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $pushBulletAuth,
        ]);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            "type" => "note",
            "title" => $pushBulletTitle,
            "body" => "\"" . $button . "\""
        ]);

        // // UN-COMMENT TO BYPASS THE SSL VERIFICATION IF YOU DON'T HAVE THE CERT BUNDLE (NOT RECOMMENDED).
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
    } else {
        $button = "Nope";
    }
}

if ($debugMode != true) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
?>
    <span style="color: white !important;">
        <?php
        echo "Response: ";
        print_r($response);
        echo "<br><br>";
        echo "Button:<br>";
        var_dump($button);
        ?>
    </span>
<?php
}
?>
