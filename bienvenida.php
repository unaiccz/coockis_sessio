<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola</title>
</head>
<body>
<a href="bienvenida.php">welcome</a>
<a href="index.php">index</a>
    <h1>Welcome</h1>
    <?php
    session_start();
    if (isset($_SESSION['active']) && $_SESSION['active'] == true && isset($_COOKIE['username'])) {
        echo "<p>Hola " . htmlspecialchars($_COOKIE['username']) . "</p>";
        
    } else {
        header('Location: index.php');
        exit();
    }
    ?>
    <h4>
        Tiempo:
    </h4>
    <div id="counter">

    </div>
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

        // Iniciar el contador cuando la página se carga
        mostrar_s(60);
    </script>
</body>
</html>