<?php
// Database related stuff (queries, etc.)
class Signup extends dbh
{
    protected function checkUser($username, $email)
    {
        $stmt = $this->connect()->prepare('SELECT usersUsername FROM users WHERE usersName = ? OR usersEmail = ?');

        if (!$stmt->execute(array($username, $email)))
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

    protected function setUser($name, $email, $username, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (usersName, usersEmail, usersUsername, usersPassword) VALUES (?, ?, ?, ?)');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($name, $email, $username, $hashedPassword)))
        {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
}