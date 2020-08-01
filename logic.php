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

$employ = "SELECT id, name, project FROM employees";
$result = mysqli_query($conn, $employ);

$proj = "SELECT id, name FROM projects";
$result2 = mysqli_query($conn, $proj);

mysqli_close($conn);

#---------------HELPER FUNCTIONS TO GENERATE TABLE CONTENT-------------------

function employ($result)
{
    if (isset($_POST["employees"])) {
        echo ('
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
        }
    }
}

function projects($result2)
{
    if (isset($_POST["projects"])) {
        echo ('<th>ID</thead>
        <th>Name</th>');

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                echo ('<tr>');
                echo ('<td>' . $row["id"] . '</td>');
                echo ('<td>' . $row["name"] . '</td>');
            }
        }
    }
}

function default_table($result)
{
    if (isset($_POST["employees"]) != true and isset($_POST["projects"]) != true) {
        echo ('
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
        };
    }
}


#-------------------TABLE-------------------

function table($result, $result2)
{
    default_table($result);
    projects($result);
    employ($result2);
}

