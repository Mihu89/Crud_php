<?php session_start();
    $login="admin";
    $pass="qwerty";

    if (isset($_POST['submit'])){
        $username = $_POST['login'];
        $user_password = $_POST['password'];

        if ($username === $login && $user_password === $pass){
            echo "<p style='color:green;'>Login success<p>";
            $_SESSION['login']=true;
             header("Location: index.php");
        } else{
            echo "<p style='color:red';>Wrong login or password</p>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <a href="index.php">Home page</a>
    <h1>Login</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="login">Login</login>
        <input name="login" type="text" placeholder="username" required/>
        <input name="password" type="password"  placeholder="password" required/>
        <input name="submit" type="submit" value="Login" />
    </form>
</body>
</html>