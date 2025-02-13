<?php
include_once 'header.php';
?>

<section class="signup-form">
    <h2>Login</h2>
    <form action="includes/login.inc.php" method="post">
        <div>
            <input type="text" name="name" placeholder="Username/Email">
        </div>
        <div>
            <input type="password" name="password" placeholder="Password">
        </div>
        <div>
            <button type="submit" name="submit">Log In</button>
        </div>
    </form>
</section>

<?php
include_once 'footer.php';
?>

