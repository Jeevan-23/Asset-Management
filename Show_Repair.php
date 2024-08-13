<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display:flex;
            justify-content:center;
            align-items:center;

        }
        .topnav{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
        }
        .List_buttons{
            margin-top: 255px;
            background-color: lightgoldenrodyellow;
            box-shadow: 0px 0px 10px black;
            padding:65px;   
            border-radius:12px;
        }
        .List_buttons button{
            background-color: green;
            border:none;
            color:white;
            padding:20px 20px;
            border-radius: 12px;
        }
        .List_buttons a{
            color:white;
            font-weight: bold;
            font-size: 1rem;
            text-decoration: none;
        }
        .List_buttons button:hover{
            box-shadow: 0px 0px 10px darkgreen;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="topnav">
        <?php
            include('Navbar.html');
        ?>
    </div>
    <div class="List_buttons">
        <button><a href="Add_repair.php">Raise a complaint</a></button>
        <button><a href="List_of_repairs.php">Show History</a></button>
    </div>
</body>
</html>