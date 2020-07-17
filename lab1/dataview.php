<?php
include_once 'DBConnector.php';
include_once 'user.php';

$result = User::readAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataView</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body>

<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
  </tr>
            <?php
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>"
                    .$row['first_name'];
                    echo "</td>";
                    echo "<td>"
                    .$row['last_name'];
                    echo "</td>";
                    echo "<td>"
                    .$row['user_city'];
                    echo "</td>";
                    echo "</tr>";
                    
                }
            } else {
                echo "0 results";
            }
            ?>
</table>  

</body>
</html>