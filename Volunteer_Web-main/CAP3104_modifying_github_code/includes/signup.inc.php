<?php
// If user got here properly by clicking submit on signup.php
/*
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
*/

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $firstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES, "UTF-8");
    $lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");


    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    $signup = new SignupContr($firstname, $lastname, $email, $password);

    // Running error handlers and user signup
    $signup->signupUser();

    $userId = $signup->fetchUserId($email);

    // Instantiate ProfileInfoContr class
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    $profileInfo = new ProfileinfoContr($userId, $email, $firstname, $lastname);
    $profileInfo->defaultProfileInfo();

    // Log user in after signing up
    // Instantiate SignupContr class
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location:../index.php?error=none");

}
