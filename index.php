<?php

    require_once(__DIR__."/env.php");
    require_once(__DIR__."/src/shorten.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <title><?php echo $APP_NAME; ?></title>
    <!-- <h1>Create by <a href="https://ganofins.com">Ganofins aka Ganesh Bagaria</a></h1> -->
</head>
<body>
    <header>
        <nav>
            <div class="navigation-bar" id="nav-bar">
                <a href="<?php echo $APP_URL; ?>">
                    <img src="img/logo.png" height="40px" width="40px" class="logo">
                </a>
            </div>
        </nav>
    </header>
    <main>
        <h1 class="site-name"><?php echo $APP_NAME; ?></h1>
        <div class="shorten-url">
            <form class="shorten-form" method="post">
                <input class="shorten-input" type="url" name="url" placeholder="Enter a URL to Shorten" required>
                <input class="shorten-btn" type="submit" value="Shorten" name="shorten-btn">
            </form>
        </div>
        <div class="shortened-url">
            <?php
                if(isset($shortened_url_value))
                {
                    echo "<p class='shortened-url'>".$shortened_url_value."</p>";
                }
            ?>
        </div>
    </main>
</body>
</html>