<?php
include 'logic.php';
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="" method="post">
        <button type="submit" name="projects">Projects</button>
        <button type="submit" name="employees">Employees</button>
    </form>
    <table>
        <?php
        table($result, $result2); ?>
    </table>
</body>

</html>