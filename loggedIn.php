<html>

<head>
    <meta http-equiv='content-type' content='text/html;charset=utf-8' />
    <title>Push2Run</title>
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
                    <tr>
                        <td>&nbsp;</td>
                        <td><button type="submit" name="selectFunction" value="Wake Up" class="btn btn-default green">Wake Up</button></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="selectFunction" value="Shutdown" class="btn btn-default red">Shutdown</button></td>
                        <td><button type="submit" name="selectFunction" value="Restart" class="btn btn-default red">Restart</button></td>
                        <td><button type="submit" name="selectFunction" value="Logout" class="btn btn-default red">Logout</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="selectFunction" value="Sleep" class="btn btn-default orange">Sleep</button></td>
                        <td><button type="submit" name="selectFunction" value="Hibernate" class="btn btn-default orange">Hibernate</button></td>
                        <td><button type="submit" name="selectFunction" value="Lock" class="btn btn-default orange">Lock</button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="selectFunction" value="🔉" class="btn btn-default blue"></button></td>
                        <td><button type="submit" name="selectFunction" value="🔇" class="btn btn-default blue"></button></td>
                        <td><button type="submit" name="selectFunction" value="🔊" class="btn btn-default blue"></button></td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="selectFunction" value="⏪" class="btn btn-default blue"></button>
                        </td>
                        <td><button type="submit" name="selectFunction" value="⏯️" class="btn btn-default blue"></button></td>
                        <td><button type="submit" name="selectFunction" value="⏩" class="btn btn-default blue"></button>
                        </td>
                    </tr>
                    <tr>
                        <td><button type="submit" name="selectFunction" value="Spotify" class="btn btn-default green">Spotify</button></td>
                        <td><button type="submit" name="selectFunction" value="Screenshot" class="btn btn-default green">Screenshot</button></td>
                        <td><button type="submit" name="selectFunction" value="Surfshark" class="btn btn-default green">Surfshark</button></td>
                    </tr>
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
                </tbody>
            </table>
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
                        elm.style.opacity = "0";

                        // create the image tag
                        const img = document.createElement('img');

                        // assign the image source
                        img.src = constructTwemojiURL(icon, options)
                        img.alt = elm.value;
                        img.height = '24';

                        // append the tag to our document body
                        elm.appendChild(img);
                        elm.style.opacity = "1";
                    }
                })
            };
        }
        emojify();
    </script>
</body>

</html>