<?php session_start();

require_once "db.php";
$query ="SELECT * FROM `courses`";
$req = mysqli_query($connection, $query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(isset($_SESSION['login']) ) : ?>
        <p>Helo Admin</p>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>

    <h1>Courses</h1>
        <?php 
            if(isset($_SESSION['login']) ) : ?>
            <a href="create.php">Add new course</a>
        <?php endif; ?>

        <?php 
            if($req) : ?>
                <?php while($resp = mysqli_fetch_assoc($req) ): ?>
                    <hr/>
                    <h3><?php echo $resp['title']; ?></h3>
                    <p><?php echo $resp['description']; ?></p>
                    <p><?php echo $resp['price']; ?>$</p>
                    <hr/>
                     <?php 
                        if(isset($_SESSION['login']) ) : ?>
                        <a href="edit.php?id=<?php echo $resp['id']; ?>">Edit course</a>&nbsp;&nbsp;
                        <a href="delete.php?id=<?php echo $resp['id']; ?>">Delete course</a>
                        <?php endif; ?>
                        <hr/>
                <?php endwhile; ?>
            <?php else: ?>
                <p>We don't have courses yet, <p>
            <?php endif; ?>

</body>
</html>