<?php
// Database related stuff (queries, etc.)
class Login extends dbh
{
    protected function getUser($email, $password)
    {
        // Checking if inputted email is inside database
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ?');

        if (!$stmt->execute(array($email)))
        {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        // Check if email exists
        if ($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $user['password'];

        if (!password_verify($password, $hashedPassword))
        {
            $stmt = null;
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        // Start session
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["firstname"] = $user["firstname"];
        $_SESSION["lastname"] = $user["lastname"];

        $stmt = null;
    }
}