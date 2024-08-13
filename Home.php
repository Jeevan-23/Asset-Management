<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .imagecont img {
        width: 60%;
    }

    .subcontainer {
        margin-left: 60px;
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;

    }

    .imagecont {
        display: flex;
        justify-content: center;

    }

    .contentcont h2 {
        font-size: 2.2rem;
        font-weight: bolder;
        font-family: "Poppins", sans-serif;
    }

    .contentcont span {
        color: blueviolet;
    }

    .contentcont p {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .shadow__btn {
        padding: 10px 20px;
        border: none;
        font-size: 17px;
        color: #fff;
        border-radius: 30px;
    
        font-weight: 700;
        text-transform: uppercase;
        transition: 0.5s;
        transition-property: box-shadow;
    }

    .shadow__btn {
        background: rgb(0, 140, 255);
        box-shadow: 0 0 25px rgb(0, 140, 255);
    }

    .shadow__btn:hover {
        box-shadow: 0 0 5px rgb(0, 140, 255),
            0 0 25px rgb(0, 140, 255),
            0 0 50px rgb(0, 140, 255),
            0 0 100px rgb(0, 140, 255);
    }
    .shadow__btn a{
        text-decoration: none;
        color: white;
    }
</style>

<body>
    <div>
        <?php
        include ('Navbar.html')
            ?>
    </div>

    <div class="maincontainer">
        <div class="subcontainer">
            <div class="contentcont">
                <h2> <span>Assests</span> Management System</h2>
                <p>Where Complaining made easy and effeicinet...</p>
                <button class="shadow__btn"> <a href="Assests.php">Get Started</a></button>
            </div>
            <div class="imagecont">
                <img src="https://digilabmarketingagency.co.ke/wp-content/uploads/2021/01/MAINTENANCE-862x762-1.png"
                    alt="">
            </div>
        </div>
        <div>
            <h3></h3>
        </div>
    </div>
</body>

</html>