<?php
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
    ($_SERVER['PHP_AUTH_USER'] !== 'admin' || $_SERVER['PHP_AUTH_PW'] !== 'password')) {
    header('WWW-Authenticate: Basic realm="Admin Login"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Identifiants invalides. Veuillez fournir les identifiants d\'administration corrects.';
    exit;
}

include 'database.php';
include 'template.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h2>Admin Login</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = "admin";
        $password = "password";

        $submitted_username = $_POST['username'];
        $submitted_password = $_POST['password'];

        if ($submitted_username === $username && $submitted_password === $password) {
            header("Location: admin.php");
            exit();
        } else {
            echo "<p>Identifiants incorrects. Veuillez réessayer.</p>";
        }
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
