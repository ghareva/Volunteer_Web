<?php
// Database related stuff (queries, etc.)
class Login extends dbh
{
    protected function getUser($username, $password)
    {
        // Checking if inputted username or email is inside database
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUsername = ? OR usersEmail = ?');

        if (!$stmt->execute(array($username, $username)))
        {
            $stmt = null;
            header("location: ../login.php?error=stmtfailed");
            exit();
        }

        // Check if user/email exists
        if ($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $user['usersPassword'];

        if (!password_verify($password, $hashedPassword))
        {
            $stmt = null;
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        // Start session
        session_start();
        $_SESSION["usersId"] = $user["usersId"];
        $_SESSION["usersUsername"] = $user["usersUsername"];

        $stmt = null;
    }
}