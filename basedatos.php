<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>b.D</title>
</head>
<body>
    <?php
    $mysqli = new mysqli("127.0.0.1", "root", "Database1Guillermo_", "abpro", 3306);
    if ($mysqli->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    ?>
</body>
</html>