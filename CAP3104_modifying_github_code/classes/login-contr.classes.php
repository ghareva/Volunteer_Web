<?php
// Make changes inside the database
class LoginContr extends Login
{
    private $username;
    private $password;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser()
    {
        if ($this->emptyInput())
        {
            // echo "Empty input!";
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->username, $this->password);
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->username) || empty($this->password))
        {
            $result = true;
        }
        return $result;
    }

}
