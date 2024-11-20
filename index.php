<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <a href="bienvenida.php">welcome</a>
    <a href="index.php">index</a>
    <form action="index.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="remember">Remember me:</label>
        <input type="checkbox" id="remember" name="remember">
        <input type="submit" value="Submit">
    </form>
    <div id="counter">-</div>
    <!-- codigo php -->
    <?php
    session_start();
    $post_submitted = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $remember = isset($_POST['remember']);
        if ($remember) {
            setcookie('username', $username, time() + (7 * 24 * 60 * 60));
        } else {
            setcookie('username', $username, time() + 60);
        }
        $_SESSION['active'] = true;
        $post_submitted = true;
        header('Location: bienvenida.php');
        exit();
    }
    ?>
    <!-- codigo js -->
    <script>
        function mostrar_s(n) {
            var counter = n;
            var interval = setInterval(function() {
                document.getElementById('counter').innerText = counter;
                counter--;
                if (counter < 0) {
                    clearInterval(interval);
                }
            }, 1000);
        }

        // Iniciar el contador si se ha hecho un POST
        <?php if ($post_submitted): ?>
            mostrar_s(60);
        <?php endif; ?>
    </script>
</body>
</html>