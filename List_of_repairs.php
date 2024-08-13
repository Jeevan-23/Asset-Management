<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asset_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT RepairID, AssetID, IssueDescription, Status, DateReported, DateCompleted FROM repairs ORDER BY IssueDescription DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reported Issues</title>
    <style>
        body{
            padding: 10px 70px;
            display: flex;
            justify-content: center;
            align-items:center;
            
        }
        table {
            width: 72rem;
            border-collapse: collapse;
            /* margin-top: 175px; */
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        td{
            background-color: lightblue;
        }
        th {
            background-color: #44c8f3;

        }
        .topnav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
        .list_head{
            margin-top: 175px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <?php
            include('Navbar.html')
        ?>
    </div>
    <div>

   
    <h2 class="list_head">REPORTED ISSUES</h2>
    <table>
        <thead>
            <tr>
                <!-- <th>RepairID</th> -->
                <th>AssetID</th>
                <th>IssueDescription</th>
                <th>Status</th>
                <th>DateReported</th>
                <th>DateCompleted</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    // echo "<td>" . $row["RepairID"] . "</td>";
                    echo "<td>" . $row["AssetID"] . "</td>";
                    echo "<td>" . $row["IssueDescription"] . "</td>";
                    echo "<td>" . $row["Status"] . "</td>";
                    echo "<td>" . $row["DateReported"] . "</td>";
                    echo "<td>" . ($row["DateCompleted"] ? $row["DateCompleted"] : "Pending") . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No issues found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
    </div>
</body>
</html>
