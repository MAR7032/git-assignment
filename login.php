<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'database.php';


include 'database.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['user'] = $row['name'];
            header("Location: index.php");
            exit();
        } else {
            echo "Wrong password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

</body>
</html>