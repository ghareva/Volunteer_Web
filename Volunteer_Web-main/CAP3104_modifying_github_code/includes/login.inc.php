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

if (isset($_POST['submit']))
{
    // Grabbing the data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";
    $login = new LoginContr($username, $password);

    // Running error handlers and user signup
    $login->loginUser();

    // Going back to front page
    header("location:../index.php?error=none");

}