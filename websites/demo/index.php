<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            [
            "name" => "Book of vonderes",
            "author" => "Henry",
            "price" => "4"
            ]

        ]
    ?>

    <li>
        <?php foreach ($books as $book) : ?>
            <li>
                <?= $book["name"] ?>
            </li>
        <?php endforeach ?>
    </li>

</body>
</html>

