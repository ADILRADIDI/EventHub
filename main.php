<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
    <link rel="stylesheet" href="main.css">
    <style>.links{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    margin: 0 auto;
    gap: 30px;
}
    #lk,.btnSearch{
        background-color: black;
        border-radius: 20px;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
    }
    #lK:hover{
        background-color: transparent;
        color: black;
        transition: 1.5s;
    }
    .btnSearch:hover{
        background-color: transparent;
        color: black;
        transition: 1.5s;
    }
</style>
</head>

<body>
    <!-- nav  -->
    <nav>
        <!-- <div class="menu div3" id="menu_btn">
            <img id="img_menu" src="./picture/menu.svg" alt="">
            <p id="text_menu">Menu</p>
        </div> -->
        <div class="div3">
            <h1 class="logo_name">EventHub</h1>
        </div>
        <!-- search -->
        <form method="post" action="search.php">
            <div id="form1">
                <a class="btnSearch" href="search.php">Search</a>
            </div>
        </form>

    </nav>
    <!-- menu in header -->
    <hr>
    <div class="links">
        <a id="lk" href="#hero">Home</a>
        <a id="lk" href="#events">Events</a>
        <a id="lk" href="#services">Services</a>
        <a id="lk" href="#ContactUs">Contact us</a>
    </div>
    <hr>

    <!-- section home -->
    <section id="hero">
        <!-- <video muted autoplay loop plays-inline src="./picture/videoHero.mp4" class="background-clip">
        </video> -->
        <h1 id="headingHero" class="hero_title">headingOne</h1>
        <marquee behavior="" direction="right">
            <p id="paragraphHero">paragraph Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Saepe, illum.</p>
        </marquee>
        <a id="linkHero" href="#">Lorem.</a>
    </section>
    <section id="events">
        <h1 id="headingevent" class="hero_title">headingOne</h1>
        <div class="events">
            <?php
            // for check php and sql is connect or not.
            $servername = "localhost";
            $username = "root";
            $password = '';
            $dbname = "db_eventhub";
            $conn = new mysqli($servername, $username, $password, $dbname);
            // if failed connect print this .
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // $insert = "insert into events values(10, 'Moroccan Tea Ceremony', 'Experience the traditional Moroccan tea ceremony', 10, 'Fes', '2025-03-15', 'https://cdn.guichet.com/events/zouhair-zair-a-marrakech.jpeg?w=900&h=600&fit=clip&auto=format,compress&q=80')";
            // $q = mysqli_query($conn, $insert);
            $select_query = $select_query = "SELECT * FROM events";
            $result = $conn->query($select_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                
                <div class="event">
                <img id="pic_event" src="' . $row['picture'] . '" alt="event1">
                <div class="event_info">
                    <h2 id="titleEvent">
                        ' . $row['title'] . '
                    </h2>
                    <div class="location">
                        <img id="img_location" src="./picture/location.svg" alt="">
                        <p>
                        ' . $row['city'] . '
                        </p>
                    </div>
                    <div class="price">
                        <p id="price_text">
                        ' . $row['price'] . '$</p>
                        <a id="btnRead"  
                        href="viewEvent.php?eventID=' . $row["eventID"] . '">Read More</a>
                    </div>
                </div>
            </div>
  
            ';
                }
            } else {
                echo "0 results";
            }

            ?>


        </div>
    </section>
    <!-- services -->
    <section id="services">
        <div id="service">
            <img id="img_service" src="./picture/service1.png" alt="">
            <h3>Achetez des tickets</h3>
            <p>Achetez des tickets de qualité pour les meilleurs <br> événements en toute sécurité !</p>
        </div>
        <div id="service">
            <img id="img_service" src="./picture/serv2.png" alt="">
            <h3>Notre garantie 100 %
            </h3>
            <p>Éliminez les risques et assurez-vous une transaction <br> sécurisée et protégée en faisant affaire avec eventhub.com
            </p>
        </div>
        <div id="service">
            <img id="img_service" src="./picture/serv3.png" alt="">
            <h3>Support 24/24H
            </h3>
            <p>+215 6 00 7065 7685 / sav@EVENTHUB.ma

            </p>
        </div>
    </section>
    <!-- footer -->
    <footer id="ContactUs">
        <div class="container_footer">
            <div>
                <h1>Need Help</h1>
                <a href="#">
                    <li>Contact Us</li>
                </a>
                <a href="#">
                    <li>Track Order</li>
                </a>
                <a href="#">
                    <li>Returns & Refunds</li>
                </a>
                <a href="#">
                    <li>Career</li>
                </a>
            </div>
            <div>
                <h1>Company</h1>
                <a href="#">
                    <li>About Us</li>
                </a>
                <a href="#">
                    <li>euphoria Blog</li>
                </a>
                <a href="#">
                    <li>euphoriastan</li>
                </a>
                <a href="#">
                    <li>Collaboration</li>
                </a>
            </div>
            <div>
                <h1>More Info</h1>
                <a href="#">
                    <li>Term and Conditions</li>
                </a>
                <a href="#">
                    <li>Privacy Policy
                    </li>
                </a>
                <a href="#">
                    <li>Shipping Policy
                    </li>
                </a>
                <a href="#">
                    <li>Sitemap</li>
                </a>
            </div>
        </div>
        <!--  -->

        <!--  -->
        <hr class="hr2">
        <p id="fin-TEXT">Copyright © 2025 EVENTHUB created by ADIL RADIDI.</p>
    </footer>
    <script src="main.js"></script>
</body>

</html>