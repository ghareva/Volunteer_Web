<?php
// If user got here properly by clicking submit on signup.php
if (isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['passwordRepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    // !-- false because anything besides false throw error
    if (emptyInputSignup($name, $email, $username, $password, $passwordRepeat) !== false)
    {
        header("location: ../signup.php?error=emptyinput");
        exit(); // Stops script from running
    }

    if (invalidUsername($username) !== false)
    {
        header("location: ../signup.php?error=invalidusername");
        exit(); // Stops script from running
    }

    if (invalidEmail($email) !== false)
    {
        header("location: ../signup.php?error=invalidemail");
        exit(); // Stops script from running
    }

    if (invalidEmail($email) !== false)
    {
        header("location: ../signup.php?error=invalidemail");
        exit(); // Stops script from running
    }

    if (passwordMatch($password, $passwordRepeat) !== false)
    {
        header("location: ../signup.php?error=passwordmismatch");
        exit(); // Stops script from running
    }

    if (usernameExists($conn, $username, $email) !== false)
    {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $email, $username, $password);
}
else
{
    // Redirects user to signup page
    header("location: ../signup.php");
    exit();
}

