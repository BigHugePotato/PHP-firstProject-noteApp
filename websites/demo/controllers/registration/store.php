<?php

use Core\App;
use Core\Database;
use Core\Validator;

error_log('Form submission received');

$email = $_POST["email"];
$password = $_POST["password"];

$errors = [];

if (!Validator::email($email)) {
    $errors["email"] = "Please provide a valid email address";
}

if (!Validator::string($password, 7, 255)) {
    $errors["password"] = "Please provide a password of at least 7 characters.";
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "errors" => $errors
    ]);
    exit();
}

$db = App::resolve(Database::class);

$results = $db->query("select * from users where email = :email", [
    "email" => $email
])->find();

if ($results) {
    header("location: /");
    exit();
} else {
    $db->query("INSERT INTO users(email, password, name) VALUES(:email, :password, :name)", 
    [
        "email" => $email,
        "password" => $password,
        "name" => ""
    ]);
}

$_SESSION["user"] = [
    "emai" => $email
];

header("location: /");
exit();
