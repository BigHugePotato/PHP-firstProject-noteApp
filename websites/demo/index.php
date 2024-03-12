<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            $name = "John";
            $hour = date("H");

            if ($hour < 12) {
                echo "Good Morning, $name";
            } elseif ($hour >= 12 && $hour < 18) {
                echo "Good Evening, $name";
            } else {
                echo "Good Morning, $name";
            }
        ?>
</body>
</html>

