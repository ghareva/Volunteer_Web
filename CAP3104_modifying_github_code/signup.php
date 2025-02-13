<?php
    include_once 'header.php';
?>

    <section class="signup-form">
        <h2>Sign Up!</h2>
        <form action="includes/signup.inc.php" method="post">
            <div>
                <input type="text" name="name" placeholder="Full Name">
            </div>
            <div>
                <input type="text" name="email" placeholder="Email">
            </div>
            <div>
                <input type="text" name="username" placeholder="Username">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password">
            </div>
            <div>
                <input type="password" name="passwordRepeat" placeholder="Repeat Password">
            </div>
            <div>
                <button type="submit" name="submit">Sign Up</button>
            </div>
        </form>
    </section>

<?php
    include_once 'footer.php';
?>

