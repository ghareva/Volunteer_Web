<?php
/*
if (isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once('dbh.inc.php');
    require_once('functions.inc.php');

    if (emptyInputLogin($username, $password) !== false)
    {
        header("location: ../login.php?error=emptyinput");
        exit(); // Stops script from running
    }

    loginUser($conn, $username, $password);
}
else
{
    header("location: ../login.php");
    exit();
}
*/

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Grabbing the data
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, "UTF-8");

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($email, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location:../index.php?error=none");

}