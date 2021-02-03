<?php
session_start();
include "db.php";

function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@\w+\.[a-z]{2,5}/i", $email) ==0)
        return false;

    return true;
}

$errors = [];

if(isset($_POST['register_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if(isset($email) && !empty($email) && isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password) ) {
        if(is_email($email)) {
            if($password === $confirm_password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
                if($mysqli->query($sql)) {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['is_logged_in'] = true;
                    setCookie("user_email", $_SESSION['user_email'], time()+120);
                    setCookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);

                    header("Location: homepage.php");
                } else {
                    $errors[] = "Registration failed!";
                }
            } else {
                $errors[] = "Password and Confirm password doesn't match!";
            }
        } else {
            $errors[] = "Email is not valid!";
        }
    } else {
        $errors [] = "All fields are required!";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>DE Digital Marketing | Login & Register</title>
    <link rel='stylesheet' href='style.css' type='text/css' />
    <!-- <script src="validoformeng2.js"></script> -->
</head>

    <header>
        <div class="container">
            <div id="branding">
                <h1><span class="highlight">DE</span>Digital Marketing</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li class="current"><a href="about.html">ABOUT</a></li>
                    <li><a href="blog.html">BLOG</a></li>
                    <li><a href="sherbimet.html">SHERBIMET</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="loginregister.html">Login/Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="formulari">
        <h1><b>Formulari i Regjistrimit</b></h1>
        <?php
            echo "<ul>";
             if(count($errors)) {
                foreach($errors as $error) {
                    echo "<li>$error</li>";
                 }
             }
             echo "</ul>";
        ?>
    </div>
  <center>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
         <input type="text" name="email" placeholder="Enter your email" />
        <br /><br />
         <input type="password" name="password" placeholder="Enter your password" />
         <br /><br />
         <input type="password" name="confirm_password" placeholder="Enter your password" />
         <br /><br />
         <button name="register_btn" type="submit">Register</button>
        </form>
        <br />
        <hr />
        <br />

<php?
function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@\w+\.[a-z]{2,5}/i", $email) ==0)
        return false;

    return true;
}

$errors = [];

if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($email) && !empty($email) && isset($password) && !empty($password)  ) {
        if(is_email($email)) {
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            if($result = $mysqli->query($sql)) {
                $row = $result->fetch_row();

                print_r($row);
            } else {
                $errors[] = "Login failed!";
            }
        } else {
            $errors[] = "Email is not valid!";
        }
    } else {
        $errors[] = "All fields are required!";
    }
}
?>
            <div id="formulari2">
                <h1><b>Formulari per Login</b></h1>
                <?php
                    echo "<ul>";
                    if(count($errors)) {
                    foreach($errors as $error) {
                    echo "<li>$error</li>";
                 }
             }
             echo "</ul>";
        ?>
            </div>
            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                <input type="text" name="email" placeholder="Enter your email" />
                <br /> <br />
                <input type="password" name="password" placeholder="Enter your password" />
                <br /><br />
                <input type="password" name="confirm_password" placeholder="Enter your password" />
                <br /><br />
                <button name="login_btn" type="submit">Send</button>
            </form>
        </center>
    </div>
    
    <footer>
        <p>DE Digital Marketing, Copyright &copy; 2020/2021</p>
    </footer>
</body>
</html>