<?php require 'function.php';
$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>

    <div class="container-fluid">

        <div class=" bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="fw-bold">Edit Item: <b><?php echo $user['name'] ?></b></h1>
                <div class="row">
                    <div class="col-sm-6">
                        <form class="form-group" action="" method="post" enctype="multipart/form-data">
                            <label>Name of item: </label><input class="form-control" type="text" name="name" id="" value="<?php echo $user['name']; ?>" required> <br>
                            <label>Image of item: </label> <input class="form-control" type="file" name="file" id=""> <br>

                            <label for="location">Location of Item:</label>
                            <select class="form-control" name="location" id="">
                                <option value="1st Floor">1st Floor</option>
                                <option value="2nd Floor">2nd Floor</option>
                                <option value="3rd Floor">3rd Floor</option>
                                <option value="4th Floor">4th Floor</option>
                            </select>
                            <br>
                            <button class="btn btn-primary" type="submit" name="submit" value="edit">Edit</button>
                        </form>

                        <br>

                        <a class="btn btn-danger" href="index.php">Go Back</a>
                    </div>
                    <div class="col-sm-6">
                        <img class="border" src="uploads/<?php echo $user['image'] ?>" width=300 alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>



</script>

</html>