<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Asset</title>
    <style>
      
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa; 
    color: #333; 
    line-height: 1.6;
}
.topnav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
}
.container2 {
    max-width: 600px;
    margin: 50px auto; 
    padding: 20px; 
    background: #fff; 
    margin-top: 125px;
    border-radius: 8px; 
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
}
.container2 form{
    margin-left: 15px;
}
h2 {
    text-align: center; 
    margin-bottom: 20px; 
    color: #007bff; 
}

label {
    font-weight: bold;
}

input[type="text"],
input[type="date"],
textarea {
    width: 90%; 
    padding: 10px; 
    margin-top: 5px; 
    margin-bottom: 15px; 
    border: 1px solid #ced4da;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #007bff; 
    color: #fff;
    border: none; 
    padding: 10px 15px; 
    border-radius: 4px; 
    cursor: pointer; 
    font-size: 16px; 
}

input[type="submit"]:hover {
    background-color: #0056b3;
   
}

    </style>
</head>
<body>
<div class="topnav">
        <?php
            include('Navbar.html');
        ?>
    </div>
    <div class="container2">
         <h2 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Add New Asset</h2>
    <form action="" method="POST">
        <label for="assetName">Asset Name:</label><br>
        <input type="text" id="assetName" name="assetName" required><br><br>
        
        <label for="assetDescription">Asset Description:</label><br>
        <textarea id="assetDescription" name="assetDescription" rows="4" required></textarea><br><br>
        
        <label for="maintenanceDate">Maintenance Date:</label><br>
        <input type="date" id="maintenanceDate" name="maintenanceDate" required><br><br>
        
        <input type="submit" value="Add Asset">
    </form>
    </div>
   
</body>
</html>
<?php
// Assuming you have a database connection established
ob_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $assetName = $_POST['assetName'];
    $assetDescription = $_POST['assetDescription'];
    $maintenanceDate = $_POST['maintenanceDate'];

    $stmt = $conn->prepare("INSERT INTO assets (AssetName, AssetDescription, MaintenanceDate) VALUES (?, ?, ?)");
    
    $stmt->bind_param("sss", $assetName, $assetDescription, $maintenanceDate);

    if ($stmt->execute()) {
        echo "<script>
        alert('Asset added successfully!');
        window.location.href = 'Assests.php'; 
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
