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
        <input type="submit" value="Submit">
    </form>
    <div id="counter">-</div>
    <!-- codigo php -->
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        setcookie('username', $username, time() + 60);
        $_SESSION['active'] = true;
        header('Location: bienvenida.php');
        exit();
    }
    ?>
    <!-- codigo js -->
   
</body>
</html>