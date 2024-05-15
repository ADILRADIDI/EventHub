<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'ADMIN'</title>
    <link rel="stylesheet" href="main.css">
    <!-- <script src="main.js"></script> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .links{
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    gap: 30px;
    }
    #lk,.btn_addevent,#deleteLink,#updateLink{
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
    table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border-radius: 10px;
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.15);

}

td, th {
  border: none;
  text-align: left;
  padding: 12px 16px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #e6e6e6;
}
/* modal 2 */

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
        <!-- <a id="lk">+ ADD Event</a> -->
        <a href='#'><button type="button"
                data-toggle="modal" data-target="#exampleModal" class="btn_addevent">
                + ADD Event
                </button>
        </a>
        <!-- Update link -->
        <a id="updateLink" href="#" data-toggle="modal" 
        data-target="#updateModal">Update</a>
        <!-- Delete link -->
        <a id="deleteLink" href="#" data-toggle="modal" 
        data-target="#deleteModal">Delete</a>
    </div>
    <hr>
    <div>
    <table>
  <tr>
    <th>id</th>
    <th>Title</th>
    <th>Description</th>
    <th>City</th>
    <th>Date</th>
    <th>Price</th>
    <th>Picture</th>
  </tr>
  <?php
            $servername = "localhost";
            $username = "root";
            $password = '';
            $dbname = "db_eventhub";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $select_query = $select_query = "SELECT * FROM events";
            $result = $conn->query($select_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <tr>
    <td>'. $row["eventID"] .'</td>
    <td> ' . $row['title'] . '</td>
    <td> ' . $row['description'] . '</td>
    <td> ' . $row['city'] . '</td>
    <td> ' . $row['date'] . '</td>
    <td> ' . $row['price'] . ' $</td>
    <td> ' . $row['picture'] . '</td>
  </tr>
            ';
                }
            } else {
                echo "0 results";
            }

?>
</table>
</div>

<!-- modal update -->
<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateModalLabel">Update Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateForm" method="post" action="updateEvent.php">
          <input type="text" name="id" id="update-id" placeholder="ID EVENT FOR UPDATE">
          <br>
          <input type="text" name="title" id="update-title" placeholder="Event Name">
          <br>
          <input type="text" name="description" id="update-description" placeholder="Description">
          <br>
          <input type="text" name="price" id="update-price" placeholder="Price">
          <br>
          <input type="text" name="city" id="update-city" placeholder="City">
          <br>
          <input type="text" name="date" id="update-date" placeholder="Date Event">
          <br>
          <input type="text" name="picture" id="update-picture" placeholder="URL Picture">
          <br>
          <input type="submit" class="btn btn-primary" value="Update">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>








<!--  -->

<!-- MODAL CODE delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" 
role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="deleteForm" method="post" action="deleteEvent.php">
          <input type="text" id="id-input" name="id" placeholder="Enter Event ID">
          <br>
          <input type="submit" class="btn btn-danger" value="Delete">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>










<!-- MODAL CODE -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Information for Create Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="postForm" method="post" action="addEvent.php">
    <input type="text" name="title" placeholder="Event Name">
    <br>
    <input type="text" name="description" placeholder="Description">
    <br>
    <input type="text" name="price" placeholder="Price">
    <br>
    <input type="text" name="city" placeholder="City">
    <br>
    <input type="text" name="date" placeholder="Date Event">
    <br>
    <input type="text" name="picture" placeholder="URL Picture">
    <br>
    <input id="linkHero" type="submit" name="Submit" value="Submit">
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
    
    <script src="main.js"></script>



</body>
</html>