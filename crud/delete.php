<?php session_start();
if (!isset($_SESSION['login'])){
    header("Location: 404.php");
}
if(isset($_GET['id']) && !empty($_GET['id'])){
    require_once "db.php";

    $id = mysqli_real_escape_string($connection, $_GET['id']);

    $query ="DELETE FROM courses WHERE id=" .$id;

    if(mysqli_query($connection, $query)){
        header("Location: index.php");
    }else{
        die("Error. Delete course failed");
    }
}
?>