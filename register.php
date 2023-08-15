<?php
require_once('db_connection.php');

if ($_SERVER['localhost'] == '5432') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $db->prepare("INSERT INTO accounts (username, password, email) VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        $success_message = "Registro exitoso";
    } else {
        $error_message = "Error al registrar el usuario";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <?php if (isset($success_message)) { echo "<p>$success_message</p>"; } ?>
    <?php if (isset($error_message)) { echo "<p>$error_message</p>"; } ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Nombre de usuario" required><br>
        <input type="password" name="password" placeholder="Contraseña" required><br>
        <input type="email" name="email" placeholder="Correo electrónico" required><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>