<?php session_start();
    require_once "db.php";
    if (!isset($_SESSION['login'])){
       header("Location: 404.php");
    }

        if (isset($_POST['submit'])){
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];

           // $query="INSERT INTO `courses` (`id`, `title`, `description`, `price`) VALUES ("
            $query="INSERT INTO `courses` (";
            $query .="title, description, price";
            $query .=") VALUES (";
            $query .="'{$title}', '{$description}', {$price}";
            $query .=")";

            if(mysqli_query($connection, $query)){
                header("Location: index.php");
            } else{
                die("Error. Creation of course doesn't work");
            }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <a href="index.php">Back to Home page</a>
    <h1>Create new course</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input name="title" type="text" placeholder="title" required/>
        <textarea name="description" id="textarea" cols="30" rows="10" placeholder="description" require></textarea>
        <input name="price" type="text"  placeholder="price" required/>
        <input name="submit" type="submit" value="Create" />
    </form>
</body>
</html>