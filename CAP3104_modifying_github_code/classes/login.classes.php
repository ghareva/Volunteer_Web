<?php
// Database related stuff (queries, etc.)
class Login extends dbh
{
    protected function getUser($username, $password)
    {
        // Checking if inputted username or email is inside database
        $stmt = $this->connect()->prepare('SELECT usersPassword FROM users WHERE usersUsername = ? OR usersEmail = ?');

        if (!$stmt->execute(array($username, $password)))
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

        // Compare inputted password with password from database
        $hashedPassword = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $hashedPassword[0]['usersPassword']);


        if (!$checkPassword)
        {
            $stmt = null;
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else
        {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE usersUsername = ? or usersEmail = ? AND usersPassword = ?');

            if (!$stmt->execute(array($username, $username, $password)))
            {
                $stmt = null;
                header("location: ../login.php?error=stmtfailed");
                exit();
            }

            if ($stmt->rowCount() == 0)
            {
                $stmt = null;
                header("location: ../login.php?error=wronglogin");
                exit();
            }

            // Start session
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION["usersId"] = $user[0]["usersId"];
            $_SESSION["usersUsername"] = $user[0]["usersUsername"];

        }

        $stmt = null;
    }
}