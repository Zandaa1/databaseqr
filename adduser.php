<?php require 'function.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">

        <nav class="navbar navbar-expand navbar-light bg-light">
            <ul class="nav navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php" aria-current="page">Main Page <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="adduser.php">Add Items</a>
                </li>
            </ul>
        </nav>

        <h1>Create new Item:</h1>
        <div class="form-group d-inline-flex">
            <form class="" action="" method="post" enctype="multipart/form-data">
                <label>Name of item: </label> <input type="text" class="form-control" name="name" id="" required> <br>
                <label>Image of item:</label> <input type="file" class="form-control" accept="image/*" name="file" id="" required> <br>
                <label>Located at: </label>
                <select class="form-control" name="location" id="">
                    <option value="1st Floor">1st Floor</option>
                    <option value="2nd Floor">2nd Floor</option>
                    <option value="3rd Floor">3rd Floor</option>
                    <option value="4th Floor">4th Floor</option>
                </select>
                <br>
                <br>
                <button class="btn btn-primary" type="submit" name="submit" value="add">Add Item</button>
            </form>

        </div>

        <br>

        <a href="index.php" class="btn btn-danger">Go Back</a>

    </div>



</body>

</html>