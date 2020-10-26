<?php session_start();
    require_once "db.php";
    if (!isset($_SESSION['login'])){
       header("Location: 404.php");
    }


        if (isset($_GET['id']) && !empty($_GET['id'])){
            $current_course_id = mysqli_real_escape_string($connection, $_GET['id']);

            // $query="SELECT * FROM `courses` (`id`, `title`, `description`, `price`) VALUES ("
            $query="SELECT * FROM `courses` WHERE id=" .$current_course_id;
            $req = mysqli_query($connection, $query);
            
            $course_data = mysqli_fetch_assoc($req);

            if(empty($course_data)){
                header("Location: 404.php");
            }
        }
    
        if(isset($_POST['submit'])) {
            $id = mysqli_real_escape_string($connection, $_GET['id']);
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            $query = "UPDATE courses SET ";
            $query .="title = '{$title}', ";
            $query .="description = '{$description}', ";
            $query .="price = {$price}";
            $query .=" WHERE id = " . $id;

            if (mysqli_query($connection, $query)){
                header("Location: index.php");
            }else{
                die("Error on editing course");
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <a href="index.php">Back to Home page</a>
    <h1>Edit course</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo isset($course_data) ? $course_data['id'] : ""; ?>" method="post">
        <input name="title" type="text" placeholder="title" required value="<?php echo isset($course_data) ? $course_data['title'] : ""; ?>"/>
        <textarea name="description" id="textarea" cols="30" rows="10" placeholder="description" require><?php echo isset($course_data) ? $course_data['description'] : ""; ?></textarea>
        <input name="price" type="text"  placeholder="price" required value="<?php echo isset($course_data) ? $course_data['price'] : ""; ?>"/>
        <input name="submit" type="submit" value="Save" />
    </form>
</body>
</html>