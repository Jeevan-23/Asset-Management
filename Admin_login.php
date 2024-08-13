<?php
$host = 'localhost'; 
$db = 'asset_management'; 
$user = 'root'; 
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent SQL injection
    $Username = $conn->real_escape_string($_POST["username"]);
    $Password = $conn->real_escape_string($_POST["password"]);

    $stmt = $conn->prepare("SELECT ID, Password FROM Admin WHERE name=? AND Password=?");
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        session_start();
        $stmt->bind_result($userID, $hashedPassword);
        $stmt->fetch();
        $_SESSION["UserID"] = $userID;
        // Redirect to assets.php after successful login
        header("Location: Show_all_page.php");
        exit();
    } else {
        $msg = 'Login Failed!<br /> Please make sure that you enter the correct details.';
    }

    $stmt->close();
}

$conn->close();
?>

<?php 
if (isset($msg)) { 
    echo '<div class="statusmsg">'.$msg.'</div>'; 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: white;
}

.login-container {
    background-color: #fff;
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
    text-align: center;
    width: 80%;
    max-width: 400px;
}

h2 {
    margin-bottom: 20px;
    color: #333;
}

.input-group {
    margin-bottom: 15px;
    text-align: left;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    color: #666;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.input-group input:focus {
    border-color: #007BFF;
    outline: none;
    display: flex;
    align-items: center;
}

.btn {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #0056b3;
}
.login_img{
    width: 10%;
}
.register_button{
    font-size: 0.8rem;
    margin-top: 15px;
    text-decoration: none;
    text-align: end;
}
.register_button a{
    text-decoration: none;
}
.register_button a:hover{
    cursor: pointer;
    text-decoration: underline;
}

</style>
<body>
    <div class="login-container">
        <img class="login_img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtScIlYxEgdvb3Ro-v3PE3sNDRlQNfIory4A&s" alt="">
        <h2 style="font-weight: bold;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">LOGIN</h2>
        <form action=" " method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group" id="check_input">
                <label for="">Remember me</label>
                <input type="checkbox" id="" name="" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>








