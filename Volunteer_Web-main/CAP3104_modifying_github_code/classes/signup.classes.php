<?php
// Database related stuff (queries, etc.)
class Signup extends dbh
{
    protected function checkEmail($email)
    {
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ?');

        if (!$stmt->execute(array($email)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $result = false;
        if ($stmt->rowCount() > 0)
        {
            $result = true;
        }

        return $result;
    }

    protected function setUser($firstName, $lastName, $email, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (firstname, lastname, email, password) VALUES (?, ?, ?, ?)');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($firstName, $lastName, $email, $hashedPassword)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getUserId($email)
    {
        $stmt = $this->connect()->prepare("SELECT id FROM users WHERE email = ?");

        if (!$stmt->execute(array($email)))
        {
            $stmt = null;
            header("location: ../User_Profile.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../User_Profile.php?error=profilenotfound");
            exit();
        }

        $stmt = null;
    }
}