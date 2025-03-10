<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h2>Login</h2>
    <form action="includes/login.inc.php" method="post">
        <div>
            <input type="text" name="username" placeholder="Username/Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <button type="submit" name="submit">Log In</button>
        </div>
    </form>
    <?php
    if (isset($_GET["error"]))
    {
        if ($_GET["error"] == "emptyinput")
        {
            echo "<p>Fill in all the fields!</p>";
        }
        else if ($_GET["error"] == "wronglogin")
        {
            echo "<p>Incorrect username or password</p>";
        }
    }
    ?>
    <p><a href = "signup.php" target = _self title = "Signup Page">Don't have an account? Sign up here!</a></p>

</section>

<?php
include_once 'footer.php';
?>

