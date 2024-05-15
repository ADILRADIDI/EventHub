<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>.links{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    gap: 30px;
}
    #lk{
        background-color: black;
        border-radius: 20px;
        padding: 10px 20px;
        color: white;
    }
    #lK:hover{
        background-color: transparent;
        color: black;
        transition: 1.5s;
    }
</style>
</head>

<body>
    <nav>
        <div class="div3">
            <h1 class="logo_name">EventHub</h1>
        </div>
    </nav>
    <hr>
    <div class="links">
        <a id="lk" href="main.php">Home</a>
    </div>
    <hr>
    <!-- . $row["eventID"]  -->
    <?php
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "db_eventhub";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // if failed connect print this .
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $eventID = $_GET['eventID'];
    $sql = "SELECT * FROM events WHERE eventID = $eventID";
    $result = mysqli_query($conn, $sql);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
    <div class="container">
        <div class="div1">
            <h4>' . $row['title'] . '</h4>
            <marquee behavior="" direction="up">
                <img id="img_view" src="' . $row['picture'] . '" alt="">
            </marquee>
        </div>
        <div class="div2">
            <div class="location">
                        <img id="img_location" src="./picture/location.svg" alt="">
                        <p>
                        ' . $row['city'] . '
                        </p>
                    </div>
                    <div class="location">
                        <img id="img_location" src="./picture/Icon.png" alt="">
                        <p>
                        ' . $row['date'] . '
                        </p>
                    </div>
            <select name="" id="select_price">
                <option value="">BLIND PASS :' . $row['price'] . '.$</option>
                <option value="">BLIND PASS : 90$</option>
                <option value="">BLIND PASS : 110$</option>
            </select>
            <div id="btn_create">
                <a href="#"><button type="button" class="btn btn-primary" 
                data-toggle="modal" data-target="#exampleModal">
                    Add to Card
                </button></a>
                
            </div>
        </div>
    </div>
    <div id="description">
        <div id="header">
            <hr>
            <h4>Description</h4>
            <hr>
        </div>
        <p id="descr">' . $row['description'] . '</p>
    </div>
            ';
        }
    } else {
        echo "null results";
    }
    ?>

    <!-- footer  -->
    <div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#0099ff" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    <!-- modal code -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Entrer you email and full name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="postForm" method="post" action="processMODAL.php">
                    <input id="inpForm" type="text" name="full_name" placeholder="Full name">
                    <br>
                    <input id="inpForm" type="email" name="email" placeholder="Your Email">
                    <br>
                    <input id="linkHero" type="submit" name="send" value="Submit">
                    <br>
                </form>
                

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="main.js">
    </script>
</body>

</html>