<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $sql = "INSERT INTO Users (Username, Password, Email) VALUES ('$username', '$password', '$email')";

    if ($conn->query($sql) === TRUE) {
         header("Location: Home.php");
         exit;
    } else {
        header("Location: error.php");
        exit;
    }
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

</style>


    <div class="login-container">
        
        <img class="login_img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtScIlYxEgdvb3Ro-v3PE3sNDRlQNfIory4A&s" alt="">
        <h2 style="font-weight: bold;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">REGISTER</h2>
        <form action="" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div> 
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-group">
                <label for="confirm password">confirm password</label>
                <input type="confirm password" id="confirm password" name="confirm password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</body>
</html>





