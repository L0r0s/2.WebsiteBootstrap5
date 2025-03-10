<?php
// Start the session: must be the first command
session_start();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    $_SESSION['err'] = "Sign Up: Username or password is empty";
    header("Location: signup.php");
    exit();
}

$user = $_POST['username'];
$password = $_POST['password'];

if (empty($user) || empty($password)) {
    $_SESSION['err'] = "Sign Up: Username or password is empty";
    header("Location: signup.php");
    exit();
}

$connection = new mysqli('localhost', 'root', '', 'LoginFussballWebsite');
if ($connection->connect_error) {
    $_SESSION['err'] = $connection->connect_error;
    header("Location: signup.php");
    exit();
}

// Check if the username already exists
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['err'] = "Sign Up: Username already exists";
    $stmt->close();
    $connection->close();
    header("Location: signup.php");
    exit();
}

$stmt->close();

// Insert the new user into the database
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("ss", $user, $password);
$stmt->execute();

if ($stmt->error) {
    $_SESSION['err'] = $stmt->error;
    header("Location: signup.php");
    $stmt->close();
    $connection->close();
    exit();
}

$stmt->close();
$connection->close();

$_SESSION['username'] = $user;
header("Location: Fußballspieler .php");
exit();
?>