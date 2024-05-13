<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
    <link rel="stylesheet" href="./styles/main.css">

</head>

<body>
    <?php
    // for check php and sql is connect or not.
        $servername = "localhost";
        $username = "root";
        $password = '';
        $dbname = "db_eventhub";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // ---> test .
        // $insert = "insert into events values(10, 'Moroccan Tea Ceremony', 'Experience the traditional Moroccan tea ceremony', 10, 'Fes', '2025-03-15', 'https://cdn.guichet.com/events/zouhair-zair-a-marrakech.jpeg?w=900&h=600&fit=clip&auto=format,compress&q=80')";
        // $q = mysqli_query($conn, $insert);
        // $select_query = "SELECT * FROM events WHERE eventID = 1";
    ?>
    <script src="main.js"></script>
</body>

</html>