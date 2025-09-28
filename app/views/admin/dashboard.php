<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | e-cashier</title>
</head>
<body>
    <?php 
        session_start();
        if (!isset($_SESSION['user'])) {
            header("Location: /app/services/auth/login.php");
            exit;
        }

        echo "Selamat datang, " . $_SESSION['user']['name'];
        echo "Role anda: " . $_SESSION['user']['role'];
    ?>
</body>
</html>