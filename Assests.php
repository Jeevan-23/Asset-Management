<?php
// session_start(); 
include('db.php'); 
if (!isset($_SESSION['loggedin']) !== true) {
    header("Location: login.php"); 
    exit; 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table {
            width: 72rem;
            border-collapse: collapse;
            padding: 12px;
        }
        th{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            text-align: center;
            background-color: lightskyblue;
        }
        td {
            border: 2px solid lightskyblue;
            padding: 18px;
            text-align: left;
            text-align: center;
            font-weight: 400;
            background-color: lightyellow;
        }
        .topnav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
        .Container_Table{
            margin-top: 150px;
        }
        .Container_Table h1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            font-weight: bolder;
            color: green;
        }
        .Asset_button{
            margin-top: 25px;
            background-color: black;
            border: none;
            padding: 15px 10px;
            color: white;
            border-radius: 12px;
        }
        .Asset_button a{
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 15px;
        }
        .Asset_button:hover{
            box-shadow: 0px 0px 5px black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <?php include('Navbar.html'); ?>
    </div>
    <div class="Container_Table">
        <h1>ASSETS DETAILS</h1>
        <table>
            <thead>
                <tr>
                    <th>AssetID</th>
                    <th>AssetName</th>
                    <th>AssetDescription</th>
                    <th>MaintenanceDate</th>
                    <!-- <th>Actions</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM assets ORDER BY AssetID ASC";
                $result = $conn->query($sql);

                if (!$result) {
                    die("Error executing query: " . $conn->error);
                }

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['AssetID'] . "</td>";
                        echo "<td>" . $row['AssetName'] . "</td>";
                        echo "<td>" . $row['AssetDescription'] . "</td>";
                        echo "<td>" . $row['MaintenanceDate'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No assets found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <button class="Asset_button"><a href="Add_Assests.php">Add Assests</a></button>
    </div>
</body>
</html>
