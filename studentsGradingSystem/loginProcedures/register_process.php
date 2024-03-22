<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $pdo =connection();
    $stmt = $pdo->prepare("INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':surname', $surname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header('Location: login.php');
        exit;
    } else {
        echo "Error: Unable to register.";
    }
}



