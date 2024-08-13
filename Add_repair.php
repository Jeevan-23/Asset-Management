<!DOCTYPE html>
<html>
<head>
    <title>Report New Issue</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            /* height: 100vh; */
        }

        h2 {
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            resize: none
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
        .topnav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
</style>
<body>
    <div class="topnav">
       <?php
        include('Navbar.html')
    ?> 
    </div>
    <div style="margin-top: 125px;">
        <h2>Report New Issue</h2>
    <form action="" method="post">
        <label for="issueDescription">Issue Description:</label>
        <textarea id="issueDescription" name="issueDescription" rows="4" cols="50" required></textarea><br>

        <label for="assetID">Asset ID:</label>
        <input type="text" id="assetID" name="assetID" required><br>
        
        <label for="status">Status:</label>
        <div style="display: flex;align-items: center;">
             <input type="radio" id="open" name="status" value="Raised" required>
             <label for="Raised" style="margin-top: 10px;">Raised</label><br>
        </div>
       <div style="display: flex;align-items: center;">
            <input type="radio" id="inProgress" name="status" value="Pending" required>
            <label for="Pending" style="margin-top: 10px;">Pending</label><br>
       </div>
       <div style="display: flex;align-items: center;">
            <input type="radio" id="closed" name="status" value="Completed" required>
            <label for="Completed" style="margin-top: 10px;">Completed</label><br><br>
       </div>
        
        

        <input type="submit" value="Submit">
    </form> 
    </div>
    
   
</body>
</html>
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
    // Get the form data
    $issueDescription = $_POST['issueDescription'];
    $assetID = $_POST['assetID'];
    $status = $_POST['status'];
    $dateReported = date("Y-m-d"); 

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO repairs (IssueDescription, AssetID, Status,DateReported) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $issueDescription, $assetID, $status,$dateReported);

    // Execute the statement
    if ($stmt->execute()) {
        echo"<script>
        alert('Data created Successfully')
            window.location.href = 'List_of_repairs.php'
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

