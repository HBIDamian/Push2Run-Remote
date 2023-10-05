<html>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>Push2Run Remote</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, target-densitydpi=device-dpi">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://twemoji.maxcdn.com/v/latest/twemoji.min.js"></script>
</head>
<?php
ob_start();
session_start();

// import config
require_once('config.php');
$buttonsArray = json_decode(file_get_contents('buttons.json'), true);

if (!isset($_SESSION['login'])) {
    header('LOCATION: ./');
    die();
} else {
    $username = $_SESSION['username'];
}
?>

<body>
    <div class="container">
        <br>
        <a href="./logOut.php" style="float:right; color:white;">Log Out?</a>
        <br>
        <hr>
        <br>
        <form method="POST">
            <table class="buttons" style="margin:0%; width: 100%;">
                <tbody>
                    <?php
                    $count = 0;
                    foreach ($buttonsArray as $button) {
                        if ($count % $columnLength === 0) {
                            echo "\t\t\t\t\t<tr>\n"; // Start a new row
                        }

                        if ($button['ButtonName'] !== null) {
                            echo "\t\t\t\t\t\t<td>\r\t\t\t\t\t\t\t<button type=\"submit\" name=\"selectFunction\" value=\"" . $button['ButtonName'] . "\" class=\"btn btn-default " . strtolower($button['ButtonColour']) . "\" >" . $button['ButtonName'] . "</button>\n\t\t\t\t\t\t</td>\n";
                        } else {
                            echo "\t\t\t\t\t\t<td>&nbsp;</td>\n"; // Replace with <td>&nbsp;</td> if ButtonName is null
                        }
                        $count++;

                        if ($count % $columnLength === 0) {
                            echo "\t\t\t\t\t</tr>\n"; // End the current row
                        }
                    }
                    ?>
                </tbody>
            </table>
                    <?php
                    if ($debugMode == true) {
                    ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="selectFunction" value="test" class="btn btn-default blue" /></td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php
                    }
                    ?>

        </form>
        <?php
        if (isset($_POST['selectFunction'])) {
            $_SESSION['choButton'] = $_POST['selectFunction'];
            if (empty($_SESSION['choButton'])) {
                echo ('<p style="color: red;">A error has occured because of you being a dickhead!</p>');
            } else {
                header('Location: embed.php');
                exit;
            }
        }
        ?>
    </div>
    <script>
        function constructTwemojiURL(icon, options) {
            return ''.concat(
                options.base,
                options.size,
                '/',
                icon,
                options.ext
            );
        }
        async function emojify() {
            const buttons = document.body.getElementsByTagName("button");
            const emoji = "🔉"
            // document.getElementsByClassName("buttons").style.display = "block";


            for (const elm of buttons) {
                twemoji.parse(elm.value, {
                    callback: (icon, options) => {
                        // create the image tag
                        const img = document.createElement('img');

                        // assign the image source
                        img.src = constructTwemojiURL(icon, options)
                        img.alt = elm.value;
                        img.height = '24';

                        // append the tag to our document body
                        elm.textContent = '';
                        elm.appendChild(img);
                    }
                })
            };
        }
        emojify();
    </script>
</body>

</html>
