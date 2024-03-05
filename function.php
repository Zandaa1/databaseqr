<?php

$conn = mysqli_connect('localhost','root','','zandaa_db');

if(isset($_POST["submit"])){
if($_POST["submit"] == "add") {
    add();
}
else if($_POST["submit"] == "edit") {
    edit();
}
else{
    delete();
}
}

function add() {
    global $conn;
    $name = $_POST["name"];
    $location= $_POST["location"];
    $filename = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];

    $newfilename = uniqid() . "-" . $filename;

    move_uploaded_file($tmpName, "uploads/" . $newfilename);
    $query = "INSERT INTO users VALUES('', '$name','$newfilename', '$location')";
    mysqli_query($conn, $query);

    echo "<script>alert('User Added Successfully!') </script>";

}
    
function edit() {
    global $conn;

    $id = $_GET['id'];
    $name = $_POST["name"];
    $location = $_POST['location'];
    
    if($_FILES['file']['error'] != 4) {
        $filename = $_FILES["file"]["name"];
        $tmpName = $_FILES["file"]["tmp_name"];

        $newfilename = uniqid() . "-" . $filename;

        move_uploaded_file($tmpName, "uploads/" . $newfilename);
        $query = "UPDATE users SET image = '$newfilename' WHERE id = '$id'";
        mysqli_query($conn, $query);
    }
    $query = "UPDATE users SET name = '$name', location = '$location' WHERE id = '$id'";
    mysqli_query($conn, $query);
    echo "<script>alert('Item Updated Successfully!') </script>";
}

function delete(){
    global $conn;

    $id = $_POST["submit"];

    $query = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $query);

    echo "<script>alert('Item Deleted Successfully!') </script>";
}

?>