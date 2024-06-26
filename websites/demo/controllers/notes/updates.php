<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = 1;

$note = $db->query("SELECT * FROM notes where id = :id", [
    "id" => $_POST["id"]
])->findOrFail();

authorize($note["user_id"] === $currentUser);

$errors = [];

if (!Validator::string($_POST["body"], 1, 1000)) {
    $errors["body"] = "A body no more than 1000 chars is required";
}

if (count($errors)) {
    return view("notes/edit/view.php", [
        "heading" => "Edit Note",
        "errors" => $errors,
        "note" => $note
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    "id" => $_POST["id"],
    "body" => $_POST["body"]
]);

header("location: /notes");
die();
