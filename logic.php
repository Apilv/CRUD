<?php

#---------------LOG IN TO DB-------------------
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "project_crud";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

#---------------SELECTING DATA FROM DB-------------------

#------ EMPLOYEES

$sql = "SELECT employees.ID, employees.Name, employees.ProjectID, projects.deadline
FROM employees
LEFT Join projects ON employees.ProjectID = projects.ID
ORDER BY projects.deadline ASC;";

$result = mysqli_query($conn, $sql);


#------ PROJECTS

$proj = "SELECT projects.id, GROUP_CONCAT(' ', employees.name) as Team, project, deadline FROM project_crud.projects
LEFT JOIN employees on projects.id = employees.projectid
GROUP BY projects.ID;";

$result2 = mysqli_query($conn, $proj);

mysqli_close($conn);

#---------------HELPER FUNCTIONS TO GENERATE TABLE CONTENT-------------------

function employ($result)
{
    if (isset($_POST["employees"]) or isset($_POST["projects"]) != true) {
        echo ('
        <th>ID</th>
        <th>Name</th>
        <th>Project</th>
        <th>Deadline</th>');

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo ('<tr>');
                echo ('<td>' . $row["ID"] . '</td>');
                echo ('<td>' . $row["Name"] . '</td>');
                echo ('<td>' . $row["ProjectID"] . '</td>');
                echo ('<td>' . $row["deadline"] . '</td>');
            }
        }
    }
}

function projects($result2)
{
    if (isset($_POST["projects"])) {
        echo ('<th>ID</th>
        <th>Project</th>
        <th>Team</th>
        <th>Deadline</th>');

        if (mysqli_num_rows($result2) > 0) {
            while ($row = mysqli_fetch_assoc($result2)) {
                echo ('<tr>');
                echo ('<td>' . $row["id"] . '</td>');
                echo ('<td>' . $row["project"] . '</td>');
                echo ('<td>' . $row["Team"] . '</td>');
                echo ('<td>' . $row["deadline"] . '</td>');
            }
        }
    }
}



#-------------------TABLE-------------------

function table($result, $result2)
{
    projects($result2);
    employ($result);
}

#-------------------DELETE-------------------

