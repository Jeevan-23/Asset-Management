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
            text-align: center;
        }
        th, td {
            padding: 10px;
            
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
        .Complete_button{
            text-align: center;
            background-color: white;
            color:black;
            padding:8px;
            border:none;
            box-shadow:0px 0px 4px black;
            border-radius: 12px;
            font-weight: bold;
        }
        .Complete_button:hover{
            cursor: pointer;
            scale:1.1;
        }
    </style>
</head>
<body>
    <div class="topnav">
        <?php
            include('workerbar.html')
        ?>
    </div>
    <div>

   
    <h2 class="list_head">PENDING ISSUES</h2>
    <table>
        <thead>
            <tr>
                <!-- <th>RepairID</th> -->
                <th>AssetID</th>
                <th>IssueDescription</th>
                <th>Status</th>
                <th>DateReported</th>
                <!-- <th>DateCompleted</th> -->
                <th>Update status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    if($row["Status"] != "Completed")
                    { echo "<tr>";
                    // echo "<td>" . $row["RepairID"] . "</td>";
                    echo "<td>" . $row["AssetID"] . "</td>";
                    echo "<td>" . $row["IssueDescription"] . "</td>";
                    echo "<td>" . ($row["Status"] == "Completed"?" ":$row["Status"]) . "</td>";
                    echo "<td>" . $row["DateReported"] . "</td>";
                    // echo "<td>" . ($row["DateCompleted"] ? $row["DateCompleted"] : "Pending") . "</td>";
                    echo "<form method='POST'>";
                    echo "<td>" . " <button value=".$row['RepairID']." name='Repair_ID' class='Complete_button'>Completed</button> " . "</td>";
                    echo "</form>";
                    echo "</tr>";}
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
<script>
   function Update_status(vs){
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $repairID = $_POST["Repair_ID"];
            
            // Update status to "Completed"
            $sql = "UPDATE repairs SET Status='Completed', DateCompleted=NOW() WHERE RepairID=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $repairID);

            if ($stmt->execute()) {
                echo "Issue status updated successfully";
            } else {
                echo "Error updating status: " . $stmt->error;
            }

            $stmt->close();
        }

        $conn->close();
        ?>
    }
</script>
