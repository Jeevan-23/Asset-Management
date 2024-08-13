<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "asset_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Queries to fetch data
$repairsSql = "SELECT RepairID, AssetID, IssueDescription, Status, DateReported, DateCompleted FROM repairs";
$assetsSql = "SELECT AssetID, AssetName, AssetDescription, MaintenanceDate FROM assets ORDER BY MaintenanceDate DESC";
$workersSql = "SELECT WorkerID, WorkerName, Password FROM worker";
$UsersSql = "SELECT UserID,Username,Email,Password  FROM users";

$repairsResult = $conn->query($repairsSql);
$assetsResult = $conn->query($assetsSql);
$workersResult = $conn->query($workersSql);
$usersResult = $conn->query($UsersSql);

if (!$repairsResult || !$assetsResult || !$workersResult) {
    die("Query failed: " . $conn->error);
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tables</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            /* padding: 21px 80px; */
            
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0px 0px 15px 5px lightblue;
            
        }
        table, th, td {
            border: 2px solid white;
        }
        th, td {
            padding: 18px;
            text-align: left;
        }
        td{
            background-color: lightskyblue;
            border: 2px solid white;
            text-align: center;
            /* padding: 5px; */
        }
        th {
            background-color: #44c8f3;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .Complete_button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .Complete_button:hover {
            background-color: #45a049;
        }
        .Repair_table h2{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #45a049;
            font-size: 2rem;
        }
        .Worker_table h2{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #45a049;
            font-size: 2rem;
        }
        .Asset_table h2{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #45a049;
            font-size: 2rem;
        }
        .users_table h2{
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: #45a049;
            font-size: 2rem;
        }
        .main_table{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
<div>
        <?php
        include ('Navbar.html')
            ?>
    </div>
   <div class="main_table">
    
   
<div class="Repair_table">

        <h2>REPAIR DETAILS</h2>
        <table>
            <tr>
                <th>RepairID</th>
                <th>AssetID</th>
                <th>IssueDescription</th>
                <th>Status</th>
                <th>DateReported</th>
                <th>DateCompleted</th>
                <!-- <th>Action</th> -->
            </tr>
            <?php
            while($row = $repairsResult->fetch_assoc()) {
                
                    echo "<tr>";
                    echo "<td>" . $row["RepairID"] . "</td>";
                    echo "<td>" . $row["AssetID"] . "</td>";
                    echo "<td>" . $row["IssueDescription"] . "</td>";
                    echo "<td>" . $row["Status"] . "</td>";
                    echo "<td>" . $row["DateReported"] . "</td>";
                    echo "<td>" . ($row["DateCompleted"] ? $row["DateCompleted"] : "Pending") . "</td>";
                    // echo "<td><button class='Complete_button' onClick='Update_status(" . $row['RepairID'] . ")'>Complete</button></td>";
                    echo "</tr>";
                
            }
            ?>
        </table>
</div>

<div class="Asset_table">


<h2>ASSETS </h2>
<table>
    <tr>
        <th>AssetID</th>
        <th>AssetName</th>
        <th>AssetDescription</th>
        <th>MaintenanceDate</th>
    </tr>
    <?php
    while($row = $assetsResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["AssetID"] . "</td>";
        echo "<td>" . $row["AssetName"] . "</td>";
        echo "<td>" . $row["AssetDescription"] . "</td>";
        echo "<td>" . $row["MaintenanceDate"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</div>
<div class="Worker_table">
<h2>WORKERS INFORMATION</h2>
<table>
    <tr>
        <th>WorkerID</th>
        <th>WorkerName</th>
        <th>Password</th>
    </tr>
    <?php
    while($row = $workersResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["WorkerID"] . "</td>";
        echo "<td>" . $row["WorkerName"] . "</td>";
        echo "<td>" . $row["Password"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</div>

<div class="users_table">
<h2>USERS INFORMATION</h2>
<table>
    <tr>
        <th>UserID</th>
        <th>UserName</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php
    while($row = $usersResult->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["UserID"] . "</td>";
        echo "<td>" . $row["Username"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Password"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
</div>

</div>
<script>
function Update_status(repairID) {
    // Implement the function to update the status of the repair
    // You might want to make an AJAX request to a PHP script that handles the update
    console.log("Updating status for repair ID: " + repairID);
}
</script>

</body>
</html>
