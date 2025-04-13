<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION["id"];
    $email = $_SESSION["email"];
    $firstname = $_SESSION["firstname"];
    $lastname = $_SESSION["lastname"];

    $newfirstname = htmlspecialchars($_POST["firstname"], ENT_QUOTES, "UTF-8");
    $newlastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
    $newemail = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $phonenumber = htmlspecialchars($_POST["phonenumber"], ENT_QUOTES, "UTF-8");
    $streetname = htmlspecialchars($_POST["streetname"], ENT_QUOTES, "UTF-8");
    $city = htmlspecialchars($_POST["city"], ENT_QUOTES, "UTF-8");
    $state = htmlspecialchars($_POST["state"], ENT_QUOTES, "UTF-8");
    $zipcode = htmlspecialchars($_POST["zipcode"], ENT_QUOTES, "UTF-8");

    include "../classes/dbh.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";
    $profileInfo = new ProfileInfoContr($id, $email, $firstname, $lastname);

    $profileInfo->updateProfileInfo($newfirstname, $newlastname, $newemail, $streetname, $city, $state, $zipcode, $phonenumber);

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $fileTmp = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExt, $allowed)) {
            $newFileName = "profile_" . $id . "." . $fileExt;
            $destination = "../uploads/" . $newFileName;

            // Move file to uploads folder
            move_uploaded_file($fileTmp, $destination);

            // Save relative path to DB
            $relativePath = "uploads/" . $newFileName;

            $profileInfo->updateProfilePicture($newFileName);

            // Optional: store it in session so you don’t query it every time
            $_SESSION['profile_picture'] = $relativePath;
        }
    }

    $_SESSION["firstname"] = $newfirstname;
    $_SESSION["lastname"] = $newlastname;
    $_SESSION["email"] = $newemail;

    header("Location: ../User_Profile.php?error=none");
}


