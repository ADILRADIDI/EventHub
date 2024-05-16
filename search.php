<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" />
    <style>
        /* here--> */
        .search1 {
            justify-content: center;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .input-search {
            outline: none;
            border-radius: 10px;
            width: 50%;
            height: 50px;
            background-color: grey;
            color: white;
        }

        .input-search:focus {
            border: 2px solid #9BA986;

        }

        .submit-search {
            border-radius: 10px;
            width: 100px;
            height: 50px;
            border: none;
            background-color: black;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .submit-search:hover {
            background-color: grey;
        }
        .links_bold{
        background-color: black;
        border-radius: 20px;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
    }
    .links_bold:hover{
        background-color: transparent;
        color: black;
        transition: 1.5s;
    }
    .container_nav{
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        gap: 30px;
    }
    #resultSearch{
        margin-top: 30px;
    }
    </style>
    <title>search</title>
</head>

<body>
    <nav class="nav_links">
        <div class="container_nav">
            <!-- logo -->
            <div class="tt" id="logo--text">
                <h4>EventHub</h4>
            </div>
            <!-- links -->
            <div class="linkss" id="linkss">
                <a href="main.php" class="links_bold">Home</a>
            </div>
        </div>
        </div>
    </nav>
    <hr class="hr1">

        <form action="search.php" method="get">
            <div class="search1">
                <input class="input-search" type="text" name="q"
                 placeholder="search by Title...">
                <input class="submit-search" type="submit" value="Rechercher">
            </div>
        </form>
        <?php
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "db_eventhub";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET['q'])) {
        $title = $_GET['q'];
        
        $stmt = $conn->prepare("SELECT * FROM events WHERE title = ?");
        
        if (!$stmt) {
            echo "Error preparing statement: " . $conn->error;
        } else {
            $stmt->bind_param("s", $title);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="event" id="resultSearch">
                            <img id="pic_event" src="' . $row['picture'] . '" alt="event1">
                            <div class="event_info">
                                <h2 id="titleEvent">' . $row['title'] . '</h2>
                                <div class="location">
                                    <img id="img_location" src="./picture/location.svg" alt="">
                                    <p>' . $row['city'] . '</p>
                                </div>
                                <div class="price">
                                    <p id="price_text">' . $row['price'] . '$</p>
                                    <a id="btnRead" href="viewEvent.php?eventID=' . $row["eventID"] . '">Read More</a>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo "No results found.";
                }
            } else {
                echo "Error executing statement: " . $stmt->error;
            }
        }
        
        $stmt->close();
    }
}

$conn->close();
?>
    </body>
</html> 
<script src="main.js"></script>
</body>

</html>