<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ex11</title>
</head>
<body>
<div class="task">
    <form action="proxy.php" method="POST">
        <textarea id="text" name="text"><?php
            if (isset($_SESSION["ex11"]))
                echo $_SESSION["ex11"];
            ?></textarea><br>
        <input type="submit" name="go" value="Отправить"><br>
    </form>
</div>
</body>
</html>
