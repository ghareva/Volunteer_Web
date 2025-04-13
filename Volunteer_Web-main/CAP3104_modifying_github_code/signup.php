<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign Up!</h2>
        <form action="includes/signup.inc.php" method="post">
            <div>
                <input type="text" name="firstname" placeholder="First Name">
            </div>
            <div>
                <input type="text" name="lastname" placeholder="Last Name">
            </div>
            <div>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <button type="submit" name="submit">Sign Up</button>
            </div>
        </form>
        <?php
        if (isset($_GET["error"]))
        {
            if ($_GET["error"] == "emptyinput")
            {
                echo "<p>Fill in all the fields!</p>";
            }
            else if ($_GET["error"] == "invalidemail")
            {
                echo "<p>Invalid Email!</p>";
            }
            else if ($_GET["error"] == "emailtaken")
            {
                echo "<p>An account with this email already exists!</p>";
            }
            else if ($_GET["error"] == "none")
            {
                echo "<p>You have signed up!</p>";
            }
        }
        ?>
    </section>

<?php
    include_once 'footer.php';
?>

