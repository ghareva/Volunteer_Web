<?php
function emptyInputSignup($name, $email, $username, $password, $passwordRepeat)
{
    $result = false;
    if(empty($name) || empty($email) || empty($username) || empty($password) || empty($passwordRepeat))
    {
        $result = true;
    }

    return $result;
}

function invalidUsername($username)
{
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
    {
        $result = true;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $result = true;
    }
    return $result;
}

function passwordMatch($password, $passwordRepeat)
{
    $result = false;
    if($password != $passwordRepeat)
    {
        $result = true;
    }
    return $result;
}

function usernameExists($conn, $username, $email)
{
    $result = false;
    // ? forces prepared statement to prevent sql injection
    $sql = "SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn); // Initialize prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($resultData))
    {
        // Returns an associative array from users table w/
        // users name, email, username, and hashed password
        return $row;
    }
    else
    {
        return $result;
    }

}
function createUser($conn, $name, $email, $username, $password)
{
    $sql = "INSERT INTO users (usersName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn); // Initialize prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password)
{
    $result = false;
    if(empty($username) || empty($password))
    {
        $result = true;
    }

    return $result;
}

function loginUser($conn, $username, $password)
{
    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $hashedPassword = $usernameExists["usersPassword"];
    $checkPassword = password_verify($password, $hashedPassword);

    if ($checkPassword === false)
    {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPassword === true)
    {
        session_start();
        $_SESSION["userId"] = $usernameExists["usersId"];
        $_SESSION["userUsername"] = $usernameExists["usersUsername"];
        header("location: ../index.php");
        exit();
    }
}

