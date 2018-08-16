<?php

// database server initialization data
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "black_square";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// create new task task
if (isset($_POST['save'])) {
    $title       = $_POST['taskTitle'];
    $descripsion = $_POST['taskDescripsion'];
    $date        = $_POST['taskDate'];
    $status      = $_POST['taskStatus'];
    $group       = $_POST['TaskGroup'];
    
    
    $query = "INSERT INTO `task` (`ID`, `Title`, `Descripsion`, `Date`, `Status`, `Group`) VALUES (NULL, '$title', '$descripsion', '$date', '$status', '$group')";
    mysqli_query($conn, $query);
    header('location: index.php');
}

// delete task
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "DELETE FROM task WHERE ID=$id");
    header('location: index.php');
}

// update  task title
if (isset($_GET['updateTitle'])) {
    $data      = $_GET['updateTitle']; // get all data (id and new title)
    $splitData = explode("$", $data); // split them to array first one id and second one new title
    mysqli_query($conn, "UPDATE `task` SET `Title`='$splitData[1]' WHERE ID = '$splitData[0]'");
    header('location: index.php');
}

// update  task date
if (isset($_GET['updateDate'])) {
    $data      = $_GET['updateDate']; // get all data (id and new date)
    $splitData = explode("$", $data); // split them to array first one id and second one new date
    mysqli_query($conn, "UPDATE `task` SET `Date`='$splitData[1]' WHERE ID = '$splitData[0]'");
    header('location: index.php');
}
// update  task status
if (isset($_GET['updateStatus'])) {
    $data      = $_GET['updateStatus']; // get all data (id and new status)
    $splitData = explode("$", $data); // split them to array first one new status and second on id
    mysqli_query($conn, "UPDATE `task` SET `Status`='$splitData[0]' WHERE ID = '$splitData[1]'");
    header('location: index.php');
}

// update  task group
if (isset($_GET['updateGroup'])) {
    $data      = $_GET['updateGroup']; // get all data (id and new title)
    $splitData = explode("$", $data); // split them to array first one id and second one new title
    mysqli_query($conn, "UPDATE `task` SET `Group`='$splitData[1]' WHERE ID = '$splitData[0]'");
    header('location: index.php');
}

// retrive data    
$results             = mysqli_query($conn, " SELECT  * FROM task");
$_SESSION['results'] = $results;

?>