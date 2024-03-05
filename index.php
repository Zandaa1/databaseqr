<?php require 'function.php'; 

if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $query = "SELECT * FROM `users` WHERE CONCAT(`id`, `name`,`location`) LIKE '%" . $valueToSearch . "%'";
    $search_result = filterTable($query);
} else {
    $query = "SELECT * FROM `users`";
    $search_result = filterTable($query);
}

function filterTable($query)
{
    $connect = mysqli_connect('localhost', 'root', '', 'zandaa_db');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR CODE HTML</title>
</head>

<body>


<div class="container-fluid">

<nav class="navbar navbar-expand navbar-light bg-light sticky-top">
  <ul class="nav navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="index.php" aria-current="page"
        >Main Page <span class="visually-hidden">(current)</span></a
      >
    </li>
    <li class="nav-item">
      <a class="nav-link" href="adduser.php">Add Items</a>
    </li>
  </ul>
</nav>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="qrcodesuccess">
    
              </div>
              <div id="qr-reader" style="width:auto"></div>
    
              <div id="qr-reader-results"></div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Scan QR Code</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="qrcodesuccess">
    
              </div>
              <div id="qr-reader" style="width:auto"></div>
    
              <div id="qr-reader-results"></div>
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>    


<form action="index.php" method="post">

<div class="input-group">
                    <input type="text" id="qroutput" class="form-control" name="valueToSearch" placeholder="Search here"><br><br>
                    <input type="submit" id="searchbox" class="btn btn-primary" name="search" value="Filter">
                    <a class="btn btn-dark bi bi-qr-code-scan" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
        aria-expanded="false" aria-controls="collapseExample"></a>
                    <form action="index.php">
                        <input type="submit" class="btn btn-dark" name="search" value="Reset">
                    </form>
                </div>

</form>

    <br>
    <table style="margin-top:2%;" class="table table-striped table-dark">
        <thead style="position:sticky;top:0;" class="thead-dark">
            <tr>
                <th>Item No.</th>
                <th>Name</th>
                <th>Image</th>
                <th>QR CODE</th>
                <th>Location</th> 
                <th>Action</th>
            </tr>
        </thead>

        <!-- populate table from mysql database -->
        <?php while ($row = mysqli_fetch_array($search_result)) : ?>
            <tbody>

                <tr>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><img src="uploads/<?php echo $row['image']; ?>" width='200'></td>
                    <td>
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $row['id'];?> " alt="">
                    </td>
                    <td><?php echo $row['location'];?></td>
                    <td><a class="btn btn-primary" href="edituser.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <form action="" method="POST">
                        <button class="btn btn-danger" type="submit" name="submit" value="<?php echo $row['id'] ?>">Delete</button>
                    </form>
                    <a class="btn btn-success" href="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo $row['id'];?>">Download QR</a>
                  </td>

                      

                </tr>
            </tbody>
        <?php endwhile; ?>
    </table>




  <!--  <table border='1'>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        <?php
        $users = mysqli_query($conn, "SELECT * FROM users");
        $i = 1;

        foreach ($users as $user) :
        ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><img src="uploads/<?php echo $user['image']; ?>" width='200'></td>
                <td>
                    <a href="edituser.php?id=<?php echo $user['id']; ?>">Edit</a>
                    <form action="" method="POST">
                        <button type="submit" name="submit" value="<?php echo $user['id'] ?>">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
        -->
    <script src="html5-qrcode.min.js"></script>
    <script>
      function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
          || document.readyState === "interactive") {
          // call on next available tick
          setTimeout(fn, 1);
        } else {
          document.addEventListener("DOMContentLoaded", fn);
        }
      }
  
      docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
          if (decodedText !== lastResult) {
            ++countResults;
            lastResult = decodedText;
            // Handle on success condition with the decoded message.
            document.getElementById("qrcodesuccess").innerHTML = ("<div class='alert alert-success'> <p id='qrcode-success'>Processing... Please wait.</p></div>");
            document.getElementById("qroutput");
            qroutput.value += lastResult;
            setTimeout(function() {
              document.getElementById("searchbox").click();
            }, 2000);
          
          }
        }
  
        var html5QrcodeScanner = new Html5QrcodeScanner(
          "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
      });


    </script>

</body>

</html>