<?php

#---------------LOG IN TO DATABASE-------------------

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "ofisas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#---------------SELECTING DATA FROM DB-------------------

$sql = "SELECT id, name, project FROM employees";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>



<!---------------HTML------------------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form>
        <input type="button" action="get" name="projects" value="Projects">
        <input type="button" action="get" name="emploees" value="Employees">
    </form>

    <!---------------TABLE------------------>
    
    <?php
    echo ('<table>
        <th>ID</thead>
        <th>Name</th>
        <th>Project</th>');

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo ('<tr>');
            echo ('<td>' . $row["id"] . '</td>');
            echo ('<td>' . $row["name"] . '</td>');
            echo ('<td>' . $row["project"] . '</td>');
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
</body>

</html>